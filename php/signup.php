<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$image_path = ''; // Resim dosyasının adını ve yolunu saklamak için boş bir değişken oluşturuyoruz

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email - This email already exist!";
        }else{
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];
                
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);

                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true){
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        $upload_path = "/home/neb7lascomtr/public_html/usersimg/" . $new_img_name;
                        if(move_uploaded_file($tmp_name, $upload_path)){
                            $image_path = $new_img_name; // Veritabanında sadece dosya adını saklıyoruz
                        } else {
                            echo "Resim taşınırken bir hata oluştu";
                        }                                                   
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }else{
                    echo "Please upload an image file - jpeg, png, jpg";
                }
            }
            
            // Şimdi resim dosyasının adını ve yolunu kullanarak veritabanına ekleyebiliriz
            $ran_id = rand(time(), 100000000);
            $status = "Active now";
            $encrypt_pass = md5($password);
            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                            VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$image_path}', '{$status}')");
            if($insert_query){
                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($select_sql2) > 0){
                    $result = mysqli_fetch_assoc($select_sql2);
                    $_SESSION['unique_id'] = $result['unique_id'];
                    echo "success";
                }else{
                    echo "This email address not Exist!";
                }
            }else{
                echo "Something went wrong. Please try again!";
            }
        }
    }else{
        echo "$email is not a valid email!";
    }
}else{
    echo "Tüm giriş alanları zorunludur!";
}
?>

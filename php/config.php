<?php
  // Geliştirme ortamı için hata raporlamayı etkinleştirin
  error_reporting(E_ALL); 
  ini_set('display_errors', 1);

  // Veritabanı bağlantı bilgileri
  $hostname = "localhost"; // Bu genellikle localhost olur, ancak hosting sağlayıcınız farklı bir değer belirlemiş olabilir
  $username = "neb7lascomtr"; // CPanel üzerinden oluşturduğunuz kullanıcı adı
  $password = "a17af-1a77ae"; // CPanel üzerinden oluşturduğunuz kullanıcı şifresi
  $dbname = "neb7lascomtr_chatapp"; // CPanel üzerinden oluşturduğunuz veritabanı adı

  // Veritabanı bağlantısını oluştur
  $conn = mysqli_connect($hostname, $username, $password, $dbname);

  // Bağlantı hatasını kontrol et
  if(!$conn){
    die("Database connection error: " . mysqli_connect_error());
  }
?>

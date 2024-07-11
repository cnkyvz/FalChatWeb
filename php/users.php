<?php
session_start();
include_once "config.php";

// Oturum kontrolü
if (!isset($_SESSION['unique_id']) || !isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}

$outgoing_id = $_SESSION['unique_id'];
$outgoing_id = mysqli_real_escape_string($conn, $outgoing_id); // SQL enjeksiyon koruması

// Kullanıcının rolüne göre SQL sorgusu oluşturma
if ($_SESSION['rol'] == 'yonetici') {
    // Yönetici ise tüm kullanıcıları getir
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
} else {
    // Kullanıcı ise sadece yönetici rolündeki kullanıcıları getir
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND rol = 'yonetici' ORDER BY user_id DESC";
}

$query = mysqli_query($conn, $sql);

if (!$query) {
    die("Veritabanı sorgu hatası: " . mysqli_error($conn));
}

$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} else {
    include_once "data.php";
}

echo $output;
?>

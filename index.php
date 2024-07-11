<?php 
  error_reporting(E_ALL); 
  ini_set('display_errors', 1);
  
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Application</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="header.css">
</head>
<body>
<video autoplay muted loop id="video-bg">
    <source src="GokDoc/FalResim/falvideo.mp4" type="video/mp4">  
    Your browser does not support the video tag.
</video>
<div class="wrapper">
  <section class="form signup">
    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="error-text"></div>
      <div class="name-details">
        <div class="field input">
          <label>Ad</label>
          <input type="text" name="fname" placeholder="Adınızı giriniz" required>
        </div>
        <div class="field input">
          <label>Soyad</label>
          <input type="text" name="lname" placeholder="Soyadınızı giriniz" required>
        </div>
      </div>
      <div class="field input">
        <label>Email</label>
        <input type="text" name="email" placeholder="Email giriniz" required>
      </div>
      <div class="field input">
        <label>Şifre</label>
        <input type="password" name="password" placeholder="Şifre giriniz" required>
        <i class="fas fa-eye"></i>
      </div>
      <div class="field image">
        <label>Fotoğraf Seç</label>
        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
      </div>
      <div class="field button">
        <input type="submit" name="submit" value="Kayıt Ol">
      </div>
    </form>
    <div class="link">Zaten kayıtlı mısın? <a href="login.php">Şimdi giriş yap</a></div>
  </section>
</div>
<header class="asil-header">
  <nav class="nav-main">
    <a href="GokDoc/anasayfa.html">Anasayfa</a>
    <a href="GokDoc/kahvefal.html">Fal</a>
    <a href="GokDoc/hediye.html">Hediye</a>
    <img src="GokDoc/FalResim/nebulasorglogo.png" alt="Logo">
    <a href="GokDoc/astroloji.html">Astroloji</a>
    <a href="index.php">Kayıt Ol</a>
    <a href="login.php">Giriş Yap</a>
  </nav>
</header>

<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/signup.js"></script>

</body>
</html>

<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
    exit(); // Bu satırı ekleyerek PHP kodunun burada sonlanmasını sağlıyoruz
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
    <section class="form login">
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="Email Giriniz" required>
        </div>
        <div class="field input">
          <label>Şifre</label>
          <input type="password" name="password" placeholder="Şifre Giriniz" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Giriş Yap">
        </div>
      </form>
      <div class="link">Henüz kayıt olmadın mı? <a href="index.php">Kayıt Ol</a></div>
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
  <script src="javascript/login.js"></script>

</body>
</html>

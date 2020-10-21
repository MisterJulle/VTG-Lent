<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['login'])){
  login();
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['register'])){
  register();
}
?>
<!DOCTYPE html>
<html>
<head>
  <script src="scripts/slider.js"></script>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main.css">
  <link rel="stylesheet" href="style/login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="content">
    <div class="login" id="login">
      <form method="POST" autocomplete="off">
        <h1>Login</h1>
        <br>
        <input type="text" name="loginbrugernavn" placeholder="Brugernavn" maxlength="30" required="required">
        <br>
        <input type="password" name="loginkode" placeholder="Kode" maxlength="30" required="required">
        <br>
        <input type="submit" name="login" value="Login">
      </form>
    </div>
    <div class="register" id="register">
      <form method="POST" autocomplete="off" enctype="multipart/form-data">
        <h1>Opret Profil</h1>
        <br>
        <input type="text" name="fornavn" placeholder="Fornavn" maxlength="30" required="required" value="<?php echo $fornavn ?>">
        <br>
        <input type="text" name="efternavn" placeholder="Efternavn" maxlength="60" required="required" value="<?php echo $efternavn; ?>">
        <br>
        <input type="text" name="registerbrugernavn" placeholder="Brugernavn" maxlength="30" required="required" value="<?php echo $brugernavn; ?>">
        <br>
        <input type="password" name="registerkode" placeholder="Kode" maxlength="50" required="required">
        <br>
        <input type="email" name="email" placeholder="Email" maxlength="50" required="required" value="<?php echo $email; ?>">
        <br>
        <input type="file" name="uploadedimage">
        <br>
        <div class="klasse">
          <p>Klasse:</p>
          <select name="klasse">
            <option></option>
            <option value="3K">3K</option>
            <option value="3Y">3Y</option>
            <option value="3U">3U</option>
            <option value="3I">3I</option>
            <option value="2M">2M</option>
            <option value="2U">2U</option>
            <option value="2V">2V</option>
            <option value="2Y">2Y</option>
          </select>
        </div>
        <br>
        <input type="submit" name="register" value="Opret">
      </form>
    </div>
    <div class="slider" id="slider">
      <div class="image">
        <img src="images/logo/logo.png">
      </div>
      <br>
      <h1 id="sliderheader">Velkommen tilbage!</h1>
      <br>
      <p id="sliderparagraph">Login og lån VTG udstyr</p>
      <br>
      <button id="sliderbutton" onclick="slide()">Register</button>
    </div>
  </div>
</body>
</html>

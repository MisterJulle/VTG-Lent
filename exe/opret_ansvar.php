<?php
session_start();
if (empty($_SESSION['brugernavn'])) {
  header("Refresh:0; ?id=");
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['minus'])){
  minus();
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['plus'])){
  plus();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="style/main.css">
  <link rel="stylesheet" href="style/opret_ansvar.css">
  <link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1' type='text/css' media='all' />
  <meta charset="utf-8">
</head>
<body>
  <?php
    require_once 'exe/navbar.php';
  ?>
<div class="tables">
  <?php getbrugere(); ?>
</div>
</body>
</html>

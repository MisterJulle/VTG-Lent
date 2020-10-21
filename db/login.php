<?php
function login(){
  $brugernavn = $_POST["loginbrugernavn"];
  $kode = $_POST["loginkode"];
  $_POST = array();
  //
  $conn = open();
  $stmt = $conn->prepare("SELECT kode FROM vtglent_brugere WHERE brugernavn=?");
  $stmt->bind_param("s", $brugernavn);
  $stmt->execute();
  $stmt->bind_result($dbkode);
  while($stmt->fetch()){
    if(decrypting($kode, $dbkode)){
      $conn = open();
      $sql = "SELECT * FROM vtglent_brugere WHERE brugernavn='$brugernavn'";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()){
        session_start();
        $_SESSION["brugernavn"] = $row["brugernavn"];
        $_SESSION["fornavn"] = $row["fornavn"];
        $_SESSION["efternavn"] = $row["efternavn"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["profilbillede"] = $row["profilbillede"];
        $_SESSION["klasse"] = $row["klasse"];
        $_SESSION["status"] = $row["status"];
        $_SESSION["id"] = $row["id"];
        $stmt->free_result();
        $stmt->close();
        $conn->close();
        header("Refresh:0; url=?id=forside");
      }
    }
    else{
      echo '<script>';
      echo 'alert("Forkert brugernavn eller kodeord")';
      echo '</script>';
    }
  }
}


function register(){
  $fornavn = $_POST["fornavn"];
  $efternavn = $_POST["efternavn"];
  $brugernavn = $_POST["registerbrugernavn"];
  $kode = $_POST["registerkode"];
  $cryptedkode = crypting($kode);
  $email = $_POST["email"];
  $klasse = $_POST["klasse"];
  $status = 1;
  //
  $_POST = array();
  //
  $conn = open();
  $stmt = $conn->prepare("SELECT email FROM vtglent_brugere WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $conn->close();
  //
  if($stmt->num_rows == 1){
    echo '<script>';
    echo 'alert("Denne email findes allerede")';
    echo '</script>';
  }
  else{
    $conn = open();
    $stmt = $conn->prepare("SELECT brugernavn FROM vtglent_brugere WHERE brugernavn=?");
    $stmt->bind_param("s", $brugernavn);
    $stmt->execute();
    $conn->close();
    //
    if($stmt->num_rows == 1){
      echo '<script>';
      echo 'alert("Dette brugernavn findes allerede")';
      echo '</script>';
    }
    else{
      if ($_FILES) {
        $temp = $_FILES["uploadedimage"]["tmp_name"];
        $ext = fileext();
        $_FILES = array();
        mkdir("images/users/".$brugernavn."/");
        $path = "images/users/".$brugernavn."/".$brugernavn.".".$ext;
        move_uploaded_file($temp, $path);
      }
      //
      $conn = open();
      $stmt = $conn->prepare("INSERT INTO vtglent_brugere (fornavn, efternavn, brugernavn, kode, email, profilbillede, klasse, dato, status) VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?)");
      $stmt->bind_param("sssssssi", $fornavn, $efternavn, $brugernavn, $cryptedkode, $email, $path, $klasse, $status);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      $_POST["loginkode"] = $kode;
      $_POST["loginbrugernavn"] = $brugernavn;
      login();
    }
  }
}
?>

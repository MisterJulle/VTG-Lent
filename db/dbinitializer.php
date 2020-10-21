<?php
function open(){
  $servername = "localhost";
  $username = "jjuli854i.elev.v";
  $password = "9fb0nhqc";
  $dbname = "jjuli854i_elev_vtg_dk";

  $conn =  new mysqli($servername, $username, $password, $dbname);
  return($conn);
}

function initialize(){
  $conn = open();
  $sql = "CREATE TABLE vtglent_brugere (
    id INT(5) AUTO_INCREMENT PRIMARY KEY,
    fornavn VARCHAR(30) NOT NULL,
    efternavn VARCHAR(60) NOT NULL,
    brugernavn VARCHAR(30) NOT NULL,
    kode VARCHAR(300) NOT NULL,
    email VARCHAR(100) NOT NULL,
    profilbillede VARCHAR(100),
    klasse VARCHAR(2) NOT NULL,
    dato DATE,
    status INT(1) NOT NULL)";
    $conn->query($sql);

    $sql = "CREATE TABLE vtglent_udstyr (
      id INT(3) AUTO_INCREMENT PRIMARY KEY,
      titel VARCHAR(50) NOT NULL,
      beskrivelse text NOT NULL,
      billede VARCHAR(100),
      ansvarlig INT(5),
      elev INT(5))";
      $conn->query($sql);
}
?>

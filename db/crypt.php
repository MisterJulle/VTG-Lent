<?php
function crypting($kode){
  $salt = 'aerg987d23yrdf239rh239grh923gecf23e9';
  $crypted = password_hash($salt.$kode, PASSWORD_DEFAULT);
  return($crypted);
}
function decrypting($kode, $dbkode){
  $salt = 'aerg987d23yrdf239rh239grh923gecf23e9';
  if(password_verify($salt.$kode, $dbkode)){
    return true;
  }
}
 ?>

<?php
function fileext(){
  $type=$_FILES["uploadedimage"]["type"];
  switch($type){
    case 'image/bmp': return 'bmp';
    case 'image/gif': return 'gif';
    case 'image/jpeg': return 'jpg';
    case 'image/png': return 'png';
    default: return false;
  }
}
 ?>

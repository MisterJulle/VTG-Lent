<?php
switch ($_SESSION['status']) {
  case '2':
    $status = 2;
    break;

    case '3':
      $status = 3;
      break;

  default:
    $status = 1;
    break;
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout'])){
  session_unset();
  session_destroy();
  header("Refresh:0; url=?id=");
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <link rel="stylesheet" href="style/navbar.css">
   </head>
   <body>
     <div class="navbar">
       <a id="first" href="?id=forside">Forside</a>
       <a href="?id=profil">Profil</a>
       <?php
       if ($status == 2) {
         echo "<div class='laerer'>
         <a href='?id=ansvar'>Ansvarsområde</a>
         </div>";
       }elseif ($status == 3) {
         echo "<div class='kontor'>
         <a href='?id=opret_ansvar'>Opret Lærer</a>
         <a href='?id=opret_udstyr'>Opret Udstyr</a>
         </div>";
       }
        ?>
        <form method="post">
          <input type="submit" name="logout" class="logout" value="Log ud">
        </form>
     </div>
   </body>
 </html>

<?php
session_start();
if (empty($_SESSION['brugernavn'])) {
  header("Refresh:0; ?id=");
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['opret_udstyr'])){
  opret_udstyr();
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <script src="scripts/textarea.js"></script>
     <script src="scripts/showpic.js"></script>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style/main.css">
     <link rel="stylesheet" href="style/opret_udstyr.css">
     <link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1' type='text/css' media='all' />
     <title></title>
   </head>
   <body>
     <?php
     require_once 'exe/navbar.php';
      ?>
     <div class="opret_udstyr">
       <h1>Opret udstyr</h1>
       <img id="output">
       <form method="post" enctype="multipart/form-data">
         <label for="inputfile" class="file-upload">
           <i class="fas fa-cloud-upload-alt"></i> Vælg Billede
           <input name="uploadedimage" onchange="loadFile(event)" id="inputfile" class="inputfile" type="file">
          </label><br>
         <div class="input">
           <input type="text" name="titel" required>
           <span>Titel</span>
         </div><br>
         <div class="input">
           <textarea id="textarea" oninput="textfloat()" name="beskrivelse" rows="5" cols="40"></textarea>
           <span id="label">Beskrivelse...</span>
         </div><br>
         <div class="input">
           <p>Lærer</p>
           <select name="ansvarlig" required>
             <?php getteacherids(); ?>
           </select>
         </div><br>
         <input type="submit" class="opret" name="opret_udstyr" value="Opret">
       </form>
     </div>
     <?php getteacherlist();  ?>
   </body>
 </html>

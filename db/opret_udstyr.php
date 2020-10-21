<?php
function opret_udstyr(){
  $titel = $_POST["titel"];
  $beskrivelse = $_POST["beskrivelse"];
  $ansvarlig = $_POST["ansvarlig"];
  //
  $_POST = array();
  //
  $conn = open();
  $stmt = $conn->prepare("INSERT INTO vtglent_udstyr (titel, beskrivelse, ansvarlig) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $titel, $beskrivelse, $ansvarlig);
  $stmt->execute();
  $stmt->close();
  $conn->close();
  //
  $conn = open();
  $sql = "SELECT id FROM vtglent_udstyr ORDER BY id DESC LIMIT 1;";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $udstyr_id = $row["id"];

    //
    if (fileext()) {
      $temp = $_FILES["uploadedimage"]["tmp_name"];
      $ext = fileext();
      $_FILES = array();
      mkdir("images/udstyr/".$udstyr_id."/");
      $path = "images/udstyr/".$udstyr_id."/".$udstyr_id.".".$ext;
      $_SESSION['path'] = $path;
      move_uploaded_file($temp, $path);
    }

    $conn = open();
    $stmt = $conn->prepare("UPDATE vtglent_udstyr SET billede=? WHERE id=?");
    $stmt->bind_param("si", $path, $udstyr_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
  }
}

function getteacherlist(){
  $conn = open();
  $sql = "SELECT * FROM vtglent_brugere WHERE status=2";
  $result = $conn->query($sql);
  $conn->close();
  echo "<h1>Lærere</h1><table>";
  echo"<tr>";
  echo"<td>Navn:</td>";
  echo"</tr>";
  while($row = $result->fetch_assoc()){
    $brugernavn=$row['brugernavn'];
    echo"<tr>";
    echo"<td>";
    echo $row['fornavn']." ".$row['efternavn'];
    echo"</td>";
    echo"</tr>";
  }
  echo"</table><br>";
}

function getteacherids(){
  $conn = open();
  $sql = "SELECT * FROM vtglent_brugere WHERE status=2";
  $result = $conn->query($sql);
  $conn->close();
  while($row = $result->fetch_assoc()){
    $id = $row['id'];
    echo"<option value='$id'>";
    echo $row['fornavn']." ".$row['efternavn'];
    echo"</option>";
  }
}
?>

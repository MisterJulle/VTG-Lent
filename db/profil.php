<?php
function getlont(){
  $bruger_id = $_SESSION['id'];
  $conn = open();
  $sql = "SELECT * FROM vtglent_udstyr WHERE elev = $bruger_id";
  $result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);
  if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $elev = $row['elev'];
      echo "<div class='udstyr-box'>
      <table>
      <td><img src=".$row['billede']."></td>
      <td><h3>".$row['titel']."</h3>
      <p>".$row['beskrivelse']."</p>
      <p>".$row['ansvarlig']."</p>
      <form method='POST'><input type='submit' name='unlon' value='Stop med at Låne'><input type='hidden' name='id' value='".$row['id']."'></form>
      </td></table>
      </div>";
    }
  }
}

function unlon(){
  $udstyrid = $_POST["id"];
  $conn = open();
  $sql = "UPDATE vtglent_udstyr SET elev=0 WHERE id=$udstyrid";
  $result = mysqli_query($conn, $sql);
}
 ?>

<?php
function search_result(){
  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit-search'])){
    $conn = open();
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM vtglent_udstyr WHERE titel LIKE '%$search%' OR beskrivelse LIKE '%$search%' OR ansvarlig LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='udstyr-box'>
        <table>
        <td><img src=".$row['billede']."></td>
        <td><h3>".$row['titel']."</h3>
        <p>".$row['beskrivelse']."</p>
        <p>".$row['ansvarlig']."</p>
        </td></table>
        </div>";
      }
    }else{
      echo "Intet resultat";
    }
  }else{
    $conn = open();
    $sql = "SELECT * FROM vtglent_udstyr";
    $resultudstyr = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($resultudstyr);
    if ($queryResult > 0) {
      while ($rowudstyr = mysqli_fetch_assoc($resultudstyr)) {
        $elev = $rowudstyr['elev'];
        $ansvarlig = $rowudstyr['ansvarlig'];
        $conn = open();
        $sql = "SELECT * FROM vtglent_brugere WHERE id=$ansvarlig";
        $resultbrugere = mysqli_query($conn, $sql);
        while ($rowbrugere = mysqli_fetch_assoc($resultbrugere)) {
          echo "<div class='udstyr-box'>
          <table>
          <td><img src=".$rowudstyr['billede']."></td>
          <td><h3>".$rowudstyr['titel']."</h3>
          <p>".$rowudstyr['beskrivelse']."</p>
          <p>".$rowbrugere['fornavn']." ".$rowbrugere['efternavn']."</p>";
          if(empty($elev)) {
            echo"<form method='POST'><input type='submit' name='lon' value='Lån'><input type='hidden' name='id' value='".$row['id']."'></form>";
          }
          else{
            echo"Lånt ud!";
          }
          echo"</td></table>
          </div>";
        }
      }
    }
  }
}

function lon(){
  $udstyr_id = $_POST["id"];
  $bruger_id = $_SESSION["id"];
  $conn = open();
  $sql = "UPDATE vtglent_udstyr SET elev=$bruger_id WHERE id=$udstyr_id";
  $result = mysqli_query($conn, $sql);
}
?>

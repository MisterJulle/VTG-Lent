<?php
function getbrugere(){
//admin
$conn = open();
$sql = "SELECT * FROM vtglent_brugere WHERE status=3";
$result = $conn->query($sql);
$conn->close();
echo "<h1>Admins</h1><table>";
echo"<tr>";
echo"<td>Navn:</td>";
echo"<td>Brugernavn:</td>";
echo"<td>Email:</td>";
echo"<td>Dato for oprettelse:</td>";
echo"<td>Status:</td>";
echo"</tr>";
while($row = $result->fetch_assoc()){
  $brugernavn=$row['brugernavn'];
  echo"<tr>";
  echo"<td>";
    echo $row['fornavn']." ".$row['efternavn'];
  echo"</td>";
  echo"<td>";
    echo $brugernavn;
  echo"</td>";
  echo"<td>";
    echo $row['email'];
  echo"</td>";
  echo"<td>";
    echo $row['dato'];
  echo"</td>";
  echo"<td><form method='POST'>";
  echo"<input type='hidden' name='hidden' value='$brugernavn'> ";
  echo"<input type='submit' name='minus' value='-'> ";
    echo $row['status'];
  echo" <input type='submit' name='plus' value='+'>";
  echo"</form></td>";
  echo"</tr>";
}
echo"</table><br>";


//lærere
$conn = open();
$sql = "SELECT * FROM vtglent_brugere WHERE status=2";
$result = $conn->query($sql);
$conn->close();
echo "<h1>Lærere</h1><table>";
echo"<tr>";
echo"<td>Navn:</td>";
echo"<td>Brugernavn:</td>";
echo"<td>Email:</td>";
echo"<td>Dato for oprettelse:</td>";
echo"<td>Status:</td>";
echo"</tr>";
while($row = $result->fetch_assoc()){
  $brugernavn=$row['brugernavn'];
  echo"<tr>";
  echo"<td>";
    echo $row['fornavn']." ".$row['efternavn'];
  echo"</td>";
  echo"<td>";
    echo $brugernavn;
  echo"</td>";
  echo"<td>";
    echo $row['email'];
  echo"</td>";
  echo"<td>";
    echo $row['dato'];
  echo"</td>";
  echo"<td><form method='POST'>";
  echo"<input type='hidden' name='hidden' value='$brugernavn'> ";
  echo"<input type='submit' name='minus' value='-'> ";
    echo $row['status'];
  echo" <input type='submit' name='plus' value='+'>";
  echo"</form></td>";
  echo"</tr>";
}
echo"</table><br>";



//elever
$conn = open();
$sql = "SELECT * FROM vtglent_brugere WHERE status=1";
$result = $conn->query($sql);
$conn->close();
echo "<h1>Elever</h1><table>";
echo"<tr>";
echo"<td>Navn:</td>";
echo"<td>Brugernavn:</td>";
echo"<td>Email:</td>";
echo"<td>Dato for oprettelse:</td>";
echo"<td>Status:</td>";
echo"</tr>";
while($row = $result->fetch_assoc()){
  $brugernavn=$row['brugernavn'];
  echo"<tr>";
  echo"<td>";
    echo $row['fornavn']." ".$row['efternavn'];
  echo"</td>";
  echo"<td>";
    echo $brugernavn;
  echo"</td>";
  echo"<td>";
    echo $row['email'];
  echo"</td>";
  echo"<td>";
    echo $row['dato'];
  echo"</td>";
  echo"<td><form method='POST'>";
  echo"<input type='hidden' name='hidden' value='$brugernavn'> ";
  echo"<input type='submit' name='minus' value='-'> ";
    echo $row['status'];
  echo" <input type='submit' name='plus' value='+'>";
  echo"</form></td>";
  echo"</tr>";
}
echo"</table>";
}

function minus(){
  $brugernavn = $_POST["hidden"];
  $conn = open();
  $sql = "SELECT status FROM vtglent_brugere WHERE brugernavn='$brugernavn'";
  $result = $conn->query($sql);
  $conn->close();

  while ($row = $result->fetch_assoc()) {
    $status = $row["status"];
    if($status <= 1) {
      header("Refresh:0; url=?id=opret_ansvar");
    }
    else{
      $conn = open();
      $sql = "UPDATE vtglent_brugere SET status=$status-1 WHERE brugernavn='$brugernavn'";
      $conn->query($sql);
      $conn->close();
      header("Refresh:0; url=?id=opret_ansvar");
    }
  }
}


function plus(){
  $brugernavn = $_POST["hidden"];
  $conn = open();
  $sql = "SELECT status FROM vtglent_brugere WHERE brugernavn='$brugernavn'";
  $result = $conn->query($sql);
  $conn->close();

  while ($row = $result->fetch_assoc()) {
    $status = $row["status"];
    if($status >= 3) {
      header("Refresh:0; url=?id=opret_ansvar");
    }
    else{
      $conn = open();
      $sql = "UPDATE vtglent_brugere SET status=$status+1 WHERE brugernavn='$brugernavn'";
      $conn->query($sql);
      $conn->close();
      header("Refresh:0; url=?id=opret_ansvar");
    }
  }
}
?>

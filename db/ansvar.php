<?php
function getansvar(){
//admin
$id = $_SESSION['id'];
$conn = open();
$sql = "SELECT * FROM vtglent_udstyr WHERE ansvarlig=$id";
$resultudstyr = $conn->query($sql);
$conn->close();
echo "<h1>Ansvarsområde</h1>";
echo "<table>
<tr>
<td>Billede:</td>
<td>Titel:</td>
<td>Beskrivelse:</td>
<td>Status:</td>
</tr>";
while($rowudstyr = $resultudstyr->fetch_assoc()){
  $elevid = $rowudstyr['elev'];
  $udstyrid = $rowudstyr['id'];
  $conn = open();
  $sql = "SELECT * FROM vtglent_brugere WHERE id=$elevid";
  $resultbruger = $conn->query($sql);
  $conn->close();
  echo "<tr>
  <td><img src=".$rowudstyr['billede']."></td>
  <td><h3>".$rowudstyr['titel']."</h3></td>
  <td><p>".$rowudstyr['beskrivelse']."</p></td>";
  if(empty($elevid)) {
    echo"<td>";
    echo"Ikke udlånt";
    echo"</td>";
  }
  else{
  while($rowbruger = $resultbruger->fetch_assoc()){
    echo"<td>";
    echo"Lånt ud til ";
    echo $rowbruger['fornavn']." ".$rowbruger['efternavn'];
    echo"<form method='POST'>";
    echo"<input type='submit' name='stop' value='Stop udlån!'>";
    echo"<input type='hidden' name='id' value='$udstyrid'>";
    echo"</form></td>";
  }
}
echo"</tr>";
}
echo "</table>";
}
 ?>

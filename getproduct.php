<?php
$mysqli = new mysqli("localhost", "example_user", "password", "database");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT prod_id, name, image FROM products WHERE prod_id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($pid, $name, $image);
$stmt->fetch();
$stmt->close();

echo "<table class='ex' cellspacing='0' width='100%'>";
echo "<tr>";
echo "<td><img width='300' height='300' src='" . $image . "' /></td>";
echo "</tr>";
echo "<tr>";
echo "<td>(" . $pid . ") " . $name . "</td>";
echo "</tr>";
echo "</table>";
?>
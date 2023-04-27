<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "example_user";
$password = "password";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT prod_id, name, image, description FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Image</th><th>Description</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["prod_id"]. "</td><td>" . $row["name"]. "</td><td><img width='300' height='300' src='" . $row["image"]. "' /></td>";
	if($row["description"] != NULL) echo "<td>" . $row["description"]. "</td>";
	echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>

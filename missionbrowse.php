<title>Missions</title>
<?php include 'includes/header.php';  ?>

<h1>Browse Missions</h1>

<?php

#Login
require_once 'includes/login1.php';  

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM game_missions";

$result = $conn->query($query);
if (!$result) die ("Database access failed:" . $conn->error);
$rows = $result->num_rows;

#print_r ($result);

echo "<table><tr><th>Title</th></tr>";

while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>"."<a href=\"viewmission2.php?Mission_id=".$row["Mission_id"]."\">".$row["Mission_Title"]."</td>";
	echo '</tr>';
	}
echo "</table>";

?>
<?php  include 'includes/footer.php'; ?>

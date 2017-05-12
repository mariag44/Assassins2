<title>Collectibles</title>
    <?php include 'includes/header.php'; ?>
    <h1>Browse Collectibles</h1>
    
<?php

#Login
require_once 'includes/login1.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM game_collectibles";

$result = $conn->query($query);
if (!$result) die ("Database access failed:" . $conn->error);
$rows = $result->num_rows;

#print_r ($result);

echo "<table><tr><th>Name</th></tr>";
    
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>"."<a href=\"viewcollectible.php?collectible_id=".$row["collectible_id"]."\">".$row["collectible_name"]."</td>";		
	echo '</tr>';
	}
echo "</table>";


?>
<?php include 'includes/footer.php'; ?>


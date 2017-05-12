<head>
    <?php
    include 'includes/header.php';
    ?>
<title>DLC</title>
    <h1>Browse Downloadable Content</h1>
</head>

<?php

#Login
require_once 'includes/login1.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM game_dlc Natural Join game_locations";

$result = $conn->query($query);
if (!$result) die ("Database access failed:" . $conn->error);
$rows = $result->num_rows;

#print_r ($result);

echo "<table><tr><th>Name</th></tr>";
    
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>"."<a href=\"viewdlc.php?dlc_id=".$row["dlc_id"]."\">".$row["dlc_title"]."</td>";			
	echo '</tr>';
	}
echo "</table>";

?>
<?php include "includes/footer.php";	?>





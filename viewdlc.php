    <title>Downloadable Content</title>
<?php
include 'includes/header.php';
require_once 'includes/login1.php';
include 'includes/Sanitize.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['dlc_id'])) {
	$id = sanitizeMySQL($conn, $_GET['dlc_id']);
	
    $query = "SELECT * FROM game_dlc WHERE dlc_id= $id";
    
    #print $query;
	$result = $conn->query($query);
	if (!$result) die ("Invalid DLC.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Content Found <br>";
	} else {
		while ($row = $result->fetch_assoc()) {
			echo '<h2>DLC Info</h2>';
            echo "<table>";
        echo "<tr><th>DLC Title</th><th>Description</th><th>Release Date</th></tr>";
			echo "<td>".$row["dlc_title"]."</td><td>".$row["dlc_description"]."</td><td>".$row["dlc_release"]."</td>";
        #echo "<img src=\Images/"".$row["dphoto_url"]."\" width=\"200\" height=\"250\">";
	echo '</tr>';			
		}
    }}
	
?>
   <?php include "includes/footer.php";	?>

<title>Character</title>
<?php
include 'includes/header.php'; 
require_once 'includes/login1.php';
include 'includes/Sanitize.php';
    
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['CID'])) {
	$id = sanitizeMySQL($conn, $_GET['CID']);
	$query = "SELECT * FROM game_character WHERE CID=" .$id;
    
    #print $query;
	$result = $conn->query($query);
	if (!$result) die ("Invalid Character.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Character found <br>";
	} else {
		while ($row = $result->fetch_assoc()) {
			echo '<h1>Character Bio</h1>';
            echo "<table>";
        echo "<tr><th>Name</th><th>Description</th></tr>";
			echo "<td>".$row["CName"]."</td><td>".$row["CDes"]."</td>";
			# was planning on it :( echo "<img src=images/".$row["photo_url"]."\" width=\"200\" height=\"450\">";
	echo '</tr>';			
		}
    }}



?>
<?php include "includes/footer.php";	?>



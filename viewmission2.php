    <title>Missions</title>
   
<?php
include 'includes/header.php';
require_once 'includes/login1.php';
include 'includes/Sanitize.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['Mission_id'])) {
	$id = sanitizeMySQL($conn, $_GET['Mission_id']);
	
    $query = "SELECT * FROM game_missions Natural Join game_locations WHERE Mission_id=" .$id;
    
    #print $query;
	$result = $conn->query($query);
	if (!$result) die ("Invalid Character.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Content Found <br>";
	} else {
		while ($row = $result->fetch_assoc()) {
			echo '<h2>Mission Info</h2>';
            echo "<table>";
        echo "<tr><th>Mission Title</th><th>Description</th><th>Game Location</th></tr>";
			echo "<td>".$row["Mission_Title"]."</td><td>".$row["Mission_Description"]."</td>";
			echo "<td>"."<a href=\"viewloc.php?locations_id=".$row["locations_id"]."\">".$row["location_name"]."</td>"; 
        #echo "<img src=\Images/"".$row["dphoto_url"]."\" width=\"200\" height=\"250\">";
	echo '</tr>';			
		}
    }}
	
	$query2 = "Select * From game_character"; 
        
        $result = $conn->query($query2);
	if (!$result) die ("Invalid Request.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Results <br>";
	} else
    {
		while ($row = $result->fetch_assoc()) {
			echo "<table><tr><th>Character In the Mission</th></tr>";
			echo "<td>"."<a href=\"viewch1.php?CID=".$row["CID"]."\">".$row["CName"]."</td>";
        echo '</table>';			
        }}
        

?>
<?php include 'includes/footer.php'; ?>   
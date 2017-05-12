    <title>Search Locations</title> 
      <?php include 'includes/header.php'; ?>
     <h3>Search  Locations</h3> 
    <p>Please Enter a Keyword</p> 
	    <form  method="GET" action=""> 
	      <input type="text" name="name"> 
	      <input type="submit" name="submit" value="Search"> 
	    </form> 
<?php
include 'includes/Sanitize.php';
require_once 'includes/login1.php';

if (isset($_GET['name'])) { 

	if (empty($_GET['name'])) {
		echo "<p>Please Enter a Keyword!</p>";
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$id = sanitizeMySQL($conn, $_GET['name']);
		
		$query = "SELECT * FROM game_locations WHERE location_name like '%".$id."%' or location_description like '%".$id."%'"; 
		
    
    $result = $conn->query($query);
	if (!$result) die ("Invalid Input.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Locations found<br>";
	} else 
    
     {
		while ($row = $result->fetch_assoc()) {
			echo "<table>";
        echo "<tr><th>Location Name</th></tr>";
            echo "<br>";
            echo "<tr>";
			#echo "<td>"."<a href=\"viewloc.php?locations_id=".$row["locations_id"]."\">".$row["location_name"]."</td>";
			echo "<td>"."<a href=\"viewloc.php?locations_id=".$row["locations_id"]."\">".$row["location_name"]."</td>";
            echo "</tr>";
            echo "</table>";
			 }}}}
			 			 
			  include 'includes/footer.php';
?>
     
    
    <title>Search Missions</title> 
      <?php include 'includes/header.php'; ?>
     <h3>Search  Missions</h3> 
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
		
		$query = "Select * From game_missions Where Mission_Title like '%".$id."%' or Mission_Description like '%".$id."%'"; 
		
		 $result = $conn->query($query);
	if (!$result) die ("Invalid Input.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Missions Found<br>";
	} else {
				while ($row = $result->fetch_assoc()) {
		
        echo "<table><tr><th>Name</th></tr>";
            echo "<tr>";
			echo "<td>"."<a href=\"viewmission2.php?Mission_id=".$row["Mission_id"]."\">".$row["Mission_Title"]."</td>";
            echo "</tr>";
            echo "</table>";
			
		}}}}

?>
<?php include "includes/footer.php"; ?>


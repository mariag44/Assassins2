
<title>Characters</title>
    <title>Search Charachters</title> 
      <?php include 'includes/header.php'; ?>
     <h3>Search  Characters</h3> 
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
		
		$query = "Select * From game_character Where CName like '%".$id."%' or CDes like '%".$id."%'"; 
		
		#$query = "SELECT * FROM game_character WHERE CName LIKE '%Ezio%'";
		#$query = "SELECT * FROM game_character WHERE CName like '%".$id."%'";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " .$conn->error);
		} else {
			$rows = $result->num_rows;
			if ($rows) {
				#echo "<h1>Results</h1><table><tr><th>Id</th><th>Name</th><th>Age</th><th>Sex</th><th>Species</th></tr>";
				while ($row = $result->fetch_assoc()) {
		echo "<table>";
        echo "<tr><th>Name</th></tr>";
            echo "<br>";
            echo "<td>";
			echo "<table>"."<a href=\"viewch1.php?CID=".$row["CID"]."\">".$row["CName"]."</table>";
            echo "</td>";
          echo "</table>";
			
		}}}}}
		
				
include "includes/footer.php";
?>

      <?php
      include 'includes/header.php';
      ?>
<title>Collectibles</title>
     <h3>Search  Collectibles</h3> 
    <p>Please Enter Keyword</p> 
	    <form  method="GET" action=""> 
	      <input  type="text" name="name"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> 
  </head> 
 <body>
     
<?php 
require_once 'includes/login1.php';
include 'includes/Sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
if (isset($_GET["submit"])) {
	$id = sanitizeMySQL($conn, $_GET['name']);
	
    $query = "SELECT * FROM game_collectibles Where collectible_name like '%".$id."%' or collectible_description like '%".$id."%'";
    
    $result = $conn->query($query);
	if (!$result) die ("Invalid Input.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Collectibles found<br>";
	} else 
    
    
     {
		while ($row = $result->fetch_assoc()) {
			echo "<table>";
        echo "<tr><th>Collectibles</th></tr>";
            echo "<br>";
            echo "<tr>";
			echo "<td>"."<a href=\"viewcollectible.php?collectible_id=".$row["collectible_id"]."\">".$row["collectible_name"]."</td>";
            echo "</tr>";
            echo "</table>";
			 }}}

include 'includes/footer.php';
?>
    
    

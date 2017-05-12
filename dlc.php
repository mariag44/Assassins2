<?php
      include 'includes/header.php';
      ?>
<title>DLC</title>
     <h3>Search  Downloadable Content</h3> 
    <p>Please Enter Keyword</p> 
	    <form  method="GET" action=""> 
	      <input  type="text" name="keyword"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> 

<?php 
require_once 'includes/login1.php';
include 'includes/Sanitize.php';
       
     
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
if (isset($_GET["submit"])) {
	$id = sanitizeMySQL($conn, $_GET['keyword']);
	
    $query = "SELECT * FROM game_dlc Where dlc_title like '%".$id."%' or dlc_description like '%".$id."%'";
    
    $result = $conn->query($query);
	if (!$result) die ("Invalid Input.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No DLCs found<br>";
	} else 
    
    
     {
		while ($row = $result->fetch_assoc()) {
			echo "<table>";
        echo "<tr><th>Downloadable Content</th></tr>";
            echo "<br>";
            echo "<tr>";
			echo "<td>"."<a href=\"viewdlc.php?dlc_id=".$row["dlc_id"]."\">".$row["dlc_title"]."</td>";
            echo "</tr>";
            echo "</table>";
			 }}}

?>
<?php include "includes/footer.php";	?>    

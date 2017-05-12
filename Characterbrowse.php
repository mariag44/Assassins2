
<title>Characters</title>
    
    <?php include 'includes/header.php'; ?> 
    
 <h1>Browse Characters </h1>
<?php 
#Login
require_once 'includes/login1.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM game_character";

$result = $conn->query($query);
if (!$result) die ("Database access failed:" . $conn->error);
$rows = $result->num_rows;

#print_r ($result);
echo "Here are Some of the Characters"; 
echo "<table><tr><th>Character Names</th></tr>";

while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>"."<a href=\"viewch1.php?CID=".$row["CID"]."\">".$row["CName"]."</td>";		
	echo '</tr>';

	}
echo "</table>";


?>

<?php include 'includes/footer.php'; ?>

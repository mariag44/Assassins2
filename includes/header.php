<!DOCTYPE html>
<html>
<body>
<?php
     include 'stylesheet.css'; 
?> 
<ul>
  <li><a href="index.php">Home</a></li>
    <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Search...</a>
    <div class="dropdown-content">
      <a href="ch1.php">Characters</a>
      <a href="ms1.php">Missions</a>
        <a href="col.php">Collectibles</a>
        <a href="loc.php">Locations</a>
        <a href="dlc.php">Downloadable Content</a>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Browse</a>
    <div class="dropdown-content">
      <a href="Characterbrowse.php">Characters</a>
      <a href="missionbrowse.php">Missions</a>
        <a href="Collectiblebrowse.php">Collectibles</a>
        <a href="browselocations.php">Locations</a>
        <a href="browsedlc.php">Downloadable Content</a>
    </div>
  </li>
</ul>

</body>
</html>

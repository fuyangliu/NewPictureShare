<!DOCTYPE html>
<html>

<head>
<title>PictureSharre</title>
<link href="css/site.css" rel="stylesheet">
</head>

<body>

<nav id="nav01"></nav>

<div id="main">
  <h1>PictureShare</h1> 
  <h2>Beyond what you can see:</h2>



<?php include "connectdb.php";


if(isset($_SESSION["user_name"])){
	if ($stmt2 = $mysqli->prepare("SELECT distinct b_id, b_name FROM Board WHERE  u_id = ?"))
	{
				
		$stmt2->bind_param("i", $_SESSION["u_id"]);
		$stmt2->execute();
		$stmt2->bind_result($bid,$bname);
?>

<form action="repin.php" method="post">
<select name="repinbid">
<?php
		
		while ($stmt2->fetch()){
			
			echo "<option value=\"".$bid."\">".$bname."</option>";
		}


	$stmt2->close();
	}
?>
</select>
	
<input type="submit" name="submit" value="submit" />
</form>

<?php
}else{
	echo "Please login first";
}
?>
 

<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 
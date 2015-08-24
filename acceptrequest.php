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

$friendid = $_GET["yesid"];
//echo $friendid;

if(isset($_SESSION["user_name"])){
	if ($stmt = $mysqli->prepare("UPDATE `NewPictureShare`.`Friend` SET `yes` = '1' WHERE `friend`.`from_user` = ? AND `friend`.`to_user` = ?"))
	{
		$stmt->bind_param("ii", $friendid,$_SESSION["u_id"]);
		$stmt->execute();
		//$stmt->bind_result();
		
		//if(!$stmt->fetch()){ echo "noting fetched";}
		echo "You are now friends with ";
		echo $friendid;
		echo "<break>";
		
		$stmt->close();
		
		header( "refresh: 1; friend.php");
	}else{
		echo "query failed";
	}
}
 

?>

<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 
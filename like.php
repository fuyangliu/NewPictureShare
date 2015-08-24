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

$likepid = $_GET["pid"];
//echo $friendid;

if(isset($_SESSION["user_name"])){
	if ($stmt1 = $mysqli->prepare("SELECT * FROM LikePicture WHERE u_id = ? AND p_id = ?"))
	{
		$stmt1->bind_param("ii", $_SESSION["u_id"],$likepid);
		$stmt1->execute();
		$stmt1->bind_result($a,$b);
		
		if(!$stmt1->fetch()){ 
		
	
	if ($stmt = $mysqli->prepare("INSERT INTO `NewPictureShare`.`LikePicture` (`u_id`, `p_id`) VALUES (?, ?)"))
	{
		$stmt->bind_param("ii", $_SESSION["u_id"],$likepid);
		$stmt->execute();
		//$stmt->bind_result();
		
		//if(!$stmt->fetch()){ echo "noting fetched";}
		echo "You liked this picture";
		echo "<br>";
		
		$stmt->close();
		
		//header( "refresh: 1; index.php");
	}else{
		echo "query failed";
	}
	
	}else{
		echo "You already liked the picture";
	}
		$stmt1->close();
	}
	}
 

?>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>

<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 

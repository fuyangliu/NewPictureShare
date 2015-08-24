<?php include "connectdb.php";?>
<!DOCTYPE html>
<html>

<head>
<title>MyBoard</title>
<link href="css/site.css" rel="stylesheet">
</head>

<body>

<nav id="nav01"></nav>

<div id="main">
  <h1>PictureShare</h1> 
  <h2>Beyond what you can see:</h2>
<a href = "create_board.php">create board</a>
<p>my board</p>
<br>
<?php 
$b_name = 0;
if ($stmt = $mysqli->prepare("select b_id,b_name from Board where u_id = ?"))
{
	$stmt->bind_param("i", $_SESSION["u_id"]);
	$stmt->execute();
	$stmt->bind_result($b_id,$b_name);
	while($stmt->fetch())
	{
		echo '<a href="myboard_view.php?b_id='.htmlspecialchars($b_id)."\" target=_blank>$b_name</a>  ";	
	}
}
echo "<br>";
echo "this is your following <br>";

if ($stmt = $mysqli->prepare("select Board.b_id,Board.b_name from Board,Follow where Board.b_id = Follow.b_id and Follow.u_id = ?"))
{
	//echo "here";
	$stmt->bind_param("i", $_SESSION["u_id"]);
	$stmt->execute();
	$stmt->bind_result($b_id,$b_name);
	while($stmt->fetch())
	{
		//echo "here";
		//echo $b_id;	
		echo '<a href="myboard_view.php?b_id='.htmlspecialchars($b_id)."\" target=_blank>$b_name</a>  ";	
	}
}
?>

<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 
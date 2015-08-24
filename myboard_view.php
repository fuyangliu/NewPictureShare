<?php include "connectdb.php" ?>
<?php
	if(isset($_GET["b_id"]))
		$_SESSION["b_id"]=$_GET["b_id"];
		//echo $_SESSION["b_id"];
?>
<!DOCTYPE html>
<html>

<head>
<title>Board <?php echo $_SESSION["b_id"] ?></title>
<link href="css/site.css" rel="stylesheet">
</head>

<body>

<nav id="nav01"></nav>

<div id="main">
	<div >
       <h1>please select picture</h1>
	</div>
     <form action="upload_picture.php" method="post" enctype="multipart/form-data">
                 <div >
                 <input name="upload_file" type="file" size="200">
                 <input name="Submit" type="submit" value="submit">
                 </div>
     </form>


<p>display photos in the board</p>
<?php 
$p_name = $url ="";
$i = 0;

//echo "session".$_SESSION["b_id"];
if ($stmt = $mysqli->prepare("select p_id, p_name,url from Picture where b_id = ?"))
{
	$stmt->bind_param("i",$_SESSION["b_id"]);
	$stmt->execute();
	$stmt->bind_result($p_id,$p_name,$url);
	while($stmt->fetch())
	{
		$i=$i+1;
		echo "<a href=\"picture_view.php?p_id=".$p_id."\" target=_blank><img class = \"resize\" src=\"".$url."\"></a>";
		echo "<br>";
		echo $p_name;
		echo "<br>";
	}
	if($i==0)
		echo "you have no picture right now.";
	
}
?>
<p>display photos repined in the board</p>
<?php
$p_name = $url ="";
$p_id = $b_id = 0;
//echo "here";
if ($stmt = $mysqli->prepare("select Picture.p_id, Picture.p_name, Picture.url from Picture, Repin 
											where Repin.p_id = Picture.p_id and Repin.b_id = ? "))
{
	//echo "here1";
	$stmt->bind_param("i",$_SESSION["b_id"]);
	$stmt->execute();
	$stmt->bind_result($p_id,$p_name,$url);
	while($stmt->fetch())
	{
		//echo "here";	
		$i=$i+1;
		echo "<a href=\"picture_view.php?p_id=".$p_id."\" target=_blank><img class = \"resize\" src=\"".$url."\"></a>";		echo "<br>";
		echo $p_name;
		echo "<br>";
	}
	if($i==0)
		echo "you have no picture pinned right now.";
	
}






?>

<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 

















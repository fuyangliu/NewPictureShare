<!DOCTYPE html>
<html>

<head>
<title>Search</title>
<link href="css/site.css" rel="stylesheet">
</head>

<body>

<nav id="nav01"></nav>

<div id="main">
  <h1>PictureShare</h1> 
  <h2>Beyond what you can see:</h2>	

<?php include "connectdb.php";


if($stmt = $mysqli->prepare("select Picture.p_id,p_name,url from Picture, Tag where tag = ? and Picture.p_id = Tag.p_id Order by stamp"))
	{
		if($stmt->bind_param("s",$_POST["keyword"]))
		{
			//echo " success1";
		};
		if($stmt->execute())
		{
			//echo "success2";
		};
		if($stmt->bind_result($p_id,$p_name,$url))
		{
			//echo "success3";
		};
		
		while($stmt->fetch())
		{
		echo "<a href=\"picture_view.php?p_id=".$p_id."\" target=_blank><img class = \"resize\" src=\"".$url."\"></a>";
		echo "<br>";
		echo $p_name;
		echo "<br>";
		}

		}
	
?>

		<form action = "searchtag.php" method = "post">
			<input type = "text" name = "keyword" value = "NBA">
			<input type = "submit" name = "submit" value = "submit">
		</form>

  
<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 

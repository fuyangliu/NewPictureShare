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
$u_id = 0;
$user_name = "";
if($stmt = $mysqli->prepare("select u_id,user_name from User where user_name like ?"))
	{
		if($stmt->bind_param("s",$_POST["keyword"]))
		{
			//echo " success1";
		};
		if($stmt->execute())
		{
			//echo "success2";
		};
		if($stmt->bind_result($u_id,$user_name))
		{
			//echo "success3";
		};
		while($stmt->fetch())
		{
			echo '<br />';
			echo '<a href="friend_profile.php?u_id=';
			echo htmlspecialchars($u_id);
			echo "\" target=_blank>$user_name</a>";
		}
	}
	
?>



	
		<form action = "search.php" method = "post">
			<input type = "text" name = "keyword" value = "lao">
			<input type = "submit" name = "submit" value = "submit">
		</form>

  
<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 
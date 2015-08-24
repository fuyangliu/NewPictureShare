<!DOCTYPE html>
<html>
	
<head>
<title>Picture </title>
<link href="css/site.css" rel="stylesheet">
</head>

<body>

<nav id="nav01"></nav>

<div id="main">
  <h1>PictureShare</h1> 
  <h2>Beyond what you can see:</h2>

<?php include "connectdb.php";
if(isset($_GET["p_id"])){
$pid = $_GET["p_id"];
$_SESSION["p_id"] = $pid;}


if(isset($_SESSION["user_name"])){
	if ($stmt = $mysqli->prepare("SELECT User.u_id, Board.b_id, url, user_name, b_name FROM User, Picture, Board 
								  WHERE Picture.p_id = ? AND Picture.b_id = Board.b_id AND User.u_id = Board.u_id "))
	{
		$stmt->bind_param("i", $pid);
		$stmt->execute();
		$stmt->bind_result($uid,$bid,$url,$user_name,$b_name);
		if($stmt->fetch()){
			//echo $url;
			//echo "<br>";
?>
	<br>
	<a href="like.php/?pid=<?php echo $pid; ?>">Like</a>
	<a href="follow.php/?bid=<?php echo $bid; ?>">follow  <?php echo $b_name; ?></a>
	<a href="makefriend.php/?uid=<?php echo $uid; ?>">make friends with <?php echo $user_name; ?></a>
	<a href="selectboard.php?pid=<?php echo $pid; ?>">repin</a>

	<br>
	<img class="resize" src="<?php echo $url; ?>"  alt=""></a>
	<br>
	<?php include 'likedisplay.php'; ?>
	<?php include 'tagdisplay.php'; ?>
	<br>
	<form action = "newcomment.php" method = "post">
	<p>comment</p>
	<input type = "text" name = "content" value = "good">
	<input type = "submit" name = "submit" value = "submit">
	</form>
		
			
<?php
	
	include 'commentdisplay.php';		
		}
		
	}else{
		echo "query failed";
	}
}else{
	echo "Please log in first";
}
   
?>
	


  


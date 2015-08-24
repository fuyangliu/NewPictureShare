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
	if ($stmt = $mysqli->prepare("(select u_id,user_name from User, Friend where from_user = ? and u_id = to_user and yes = 1)union
								(select u_id,user_name from User, Friend where from_user = u_id and to_user = ? and yes = 1)"))
	{
		$stmt->bind_param("ii", $_SESSION["u_id"],$_SESSION["u_id"]);
		$stmt->execute();
		$stmt->bind_result($u_id,$user_name);
		
		//if(!$stmt->fetch()){ echo "noting fetched";}
		echo "Friend list: <br>";
		while ($stmt->fetch())
		{
			echo $u_id." ".$user_name;
			echo '					<a href="unfriend.php?noid=';
			echo $u_id;
			echo '">Unfriend</a>';
			echo "<br>";
			
		}
		$stmt->close();
	}else{
		echo "query failed";
	}
	
	if ($stmt = $mysqli->prepare("select u_id,user_name from User, Friend where to_user = ? and u_id = from_user and yes = 0"))
	{
		$stmt->bind_param("i", $_SESSION["u_id"]);
		$stmt->execute();
		$stmt->bind_result($u_id,$user_name);
		
		//if(!$stmt->fetch()){ echo "noting fetched";}
		echo "Friend request: <br>";
		while ($stmt->fetch())
		{
			echo $u_id." ".$user_name;
			echo '					<a href="acceptrequest.php?yesid=';
			echo $u_id;
			echo '">Accept</a>';
			echo "<br>";
			
		}
		$stmt->close();
	}else{
		echo "query failed";
	}
	
	
	
	if ($stmt = $mysqli->prepare("(select u_id,user_name from User, Friend where from_user = ? and u_id = to_user and yes = 1)union
								(select u_id,user_name from User, Friend where from_user = u_id and to_user = ? and yes = 1)"))
	{
		$stmt->bind_param("ii", $_SESSION["u_id"],$_SESSION["u_id"]);
		$stmt->execute();
		$stmt->bind_result($u_id,$user_name);
		
		//if(!$stmt->fetch()){ echo "noting fetched";}
		echo "People you may know: <br>";
		while ($stmt->fetch())
		{
			if ($stmt2 = $mysqli->prepare("(select u_id,user_name from User, Friend where from_user = ? and u_id = to_user and yes = 1)union
								(select u_id,user_name from User, Friend where from_user = u_id and to_user = ? and yes = 1)"))
	 	 {
	 		echo "here";
			$stmt2->bind_param("ii", $u_id, $u_id);
			$stmt2->execute();
			$stmt2->bind_result($u_id,$user_name);
			
			while ($stmt2->fetch()) {
				echo $u_id." ".$user_name;
				echo '					<a href="makefriend.php?uid=';
				echo $u_id;
				echo '">Send Request</a>';
				echo "<br>";				
			}
			$stmt2->close();
		}
			
		}
		$stmt->close();
	}else{
		echo "query failed";
	}
	
}else{
	echo 'Please log first. Click <a href = "loginpage.php">here</a><br>';
	
}

?>

<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 



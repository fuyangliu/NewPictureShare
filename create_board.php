<?php include "connectdb.php";?>
<!DOCTYPE html>
<html>

<head>
<title>CreateBoard</title>
<link href="css/site.css" rel="stylesheet">
</head>

<body>

<nav id="nav01"></nav>

<div id="main">
  <h1>PictureShare</h1> 
  <h2>Beyond what you can see:</h2>

<?php
include "function.php";
$u_id = $b_name = $visibility = "";
$b_name_error = "";
$iserr = 0;
 if(empty($_POST["b_name"]))
 {
 	$iserr = 1;
 	$b_name_error = "board name is empty";
 }
else
{
	$b_name = test_input($_POST["b_name"]);
}
if($iserr == 0 && isset($_POST["b_name"]))
{
	if ($stmt = $mysqli->prepare( "select b_name from Board where b_name = ? and u_id = ?"))
	{
		$stmt->bind_param("ss", $_POST["b_name"],$_SESSION["u_id"]);
		$stmt->execute();
		$stmt->bind_result($b_name);
		if($stmt->fetch())
		{
			echo "The board name has exist in your account , please choose another name.<br>";
			echo " you will be redirected in 1 seconds or click <a href = \"create_board.php\">here</a>. <br>";
			header("refresh:1; create_board.php");
			$stmt->close();
		}
		else
		{
			$stmt->close();
			if($stmt = $mysqli->prepare("insert into Board(b_name,u_id,visibility) value(?,?,?)"))
			{
				$stmt->bind_param("sis",$_POST["b_name"],$_SESSION["u_id"],$_POST["visibility"]);
				$stmt->execute();
				echo "you have successully created a board named".$b_name."<br>";
				echo "you will be redirected in 1 second or click <a href = \"myboard.php\">here</a>";
				header("refresh:1; myboard.php");

			}
		}
	}

}
?>
<form method = "post" action = "create_board.php">
<p>Board Name</p>
<input type = "text" name = "b_name" value = "country">
<br>
<p>Visibility</p>
<input type = "text" name = "visibility" value = "all">
<br>
<input type = "submit" name = "submit" value = "create board">
</form>







<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 
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

$user_name = $password = $Email = "";
$isErr = 0;

if ($stmt = $mysqli->prepare("select user_name, password, Email from User where u_id=?")){
	$stmt->bind_param("i", $_SESSION["u_id"]);
	$stmt->execute();
	$stmt->bind_result($user_name,$password,$Email);
	if ($stmt->fetch())
	{
	}
	$stmt->close();
}
?>

<html>
<body>
<p> NAME     <?php echo $user_name;?> </p>
<p> EMAIL      <?php echo $Email;?> </p>
<form method="post" action="edit_profile.php?u_id=<?php echo $_GET["u_id"] ?>">
        <input type="submit" name="edit_profile" value="edit_profile" style="bold;font-size:20px;">
 </form>
</body>
</html>


<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html>
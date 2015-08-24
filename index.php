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
  
  
  <p>Weclome   <?php include "connectdb.php"; if(isset($_SESSION["user_name"])) { echo $_SESSION["user_name"];} ?></p> 
  <p>See the world at PictureShare</p>
  <?php include 'allpic.php';?>
  
    
  
<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 
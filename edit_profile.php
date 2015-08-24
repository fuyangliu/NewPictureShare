<?php include "connectdb.php";?>

<!DOCTYPE html>
<html>

<head>
<title>Edit profile</title>
<link href="css/site.css" rel="stylesheet">
</head>

<body>

<nav id="nav01"></nav>

<div id="main">
  <h1>PictureShare</h1> 
  <h2>Beyond what you can see:</h2>
<?php
include "function.php";
$user_name=$password=$Email="";
$user_name_error=$password_error="";
$iserr=0;
//echo "here";

  if(count($_POST)!=0)
    {
        if(empty($_POST["user_name"]))
        {
            $user_name_error="user name is required.";
            $iserr=1;
        }
       
        else
        {
            $user_name = test_input($_POST["user_name"]);
        }
         //echo "here1";
        if(empty($_POST["password"]))
        {
            $password_error="passwod is required.";
            $iserr=1;
        }
        else
        {
            $password = test_input($_POST["password"]);
        }
        if(empty($_POST["Email"]))
        {
            $Email="";
        }
        else
        {
            $Email = test_input($_POST["Email"]);
        }
    }
   if($iserr==0 && isset($_POST["user_name"]) && isset($_POST["password"])){
    //check if username already exists in database
    //echo "here2";
    if ($stmt = $mysqli->prepare("update User set user_name=?, password=?,Email=? where u_id=?")){
        echo "here3";
    $stmt->bind_param("sssi", $_POST["user_name"],$_POST["password"],$_POST["Email"],$_SESSION['u_id']);                    
    $stmt->execute();
    $stmt->close();
    header("refresh: 1; my_profile.php");
    }

  
}
?>
<p>please type your information</p>
<form method="post" action="edit_profile.php">
USER NAME:<input type="text" name = "user_name"  >
          <span >* <?php echo $user_name_error;?></span>
PASSWORD:<input type = "text" name = "password" >
          <span >* <?php echo $password_error;?></span>
EMAIL:<input type = "text" name = "Email" >
      <input type = "submit" name = "submit" value = "submit">
</form>


<footer id="foot01"></footer>
</div>

<script src="script.js"></script>

</body>
</html> 



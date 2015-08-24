 <?php include "connectdb.php";?>
 <html>
 <?php

$dir = "upload/"; //create一个new folder 叫 upload, 但必须与photo.php, photo.html 同级

$tmp_name = $_FILES['upload_file']['tmp_name'];
$actual_name = $_FILES['upload_file']['name']; 
$size =     $_FILES['upload_file']['size']; 
$type =     $_FILES['upload_file']['type']; 
$root = getcwd();
move_uploaded_file($tmp_name,$dir.$actual_name); //把上传的照片存到 upload folder 里

//show uploaded photo
$url = $dir.$actual_name;
echo $url;
// echo $_SESSION["b_id"];
echo "<img src=\"".$url."\">"; //显示上传了的照片。
if($stmt = $mysqli->prepare("select p_name from Picture where p_name = ? and b_id = ?"))
{
	$stmt->bind_param("si",$actual_name,$_SESSION["b_id"]);
	echo $_SESSION["b_id"];
	$stmt->execute();
	if($stmt->fetch())
	{
		echo "please change to another picture , the picture have already exists.";
		echo "<br>"."you will be redirected in 1 seconds or click <a href = \"myboard_view.php\">here<a>";
	}
	else
	{
			if($stmt = $mysqli->prepare("insert into Picture(p_name,url,b_id) value(?,?,?)"))
		{

			$stmt->bind_param("ssi",$actual_name,$url,$_SESSION["b_id"]);
			$stmt->execute();
			// echo $url;
			// echo $_SESSION["b_id"];
			echo "you have succussfully uploaded the picture.";
			echo "<a href = \"myboard_view.php\">back</a>";
		}
	}
	
}

?>


</html>
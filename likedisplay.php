<?php include "connectdb.php";
$likeflag = 0;
if(isset($_SESSION["user_name"])){
	if ($stmt = $mysqli->prepare("select u_id from LikePicture where p_id = ?")){
		$stmt->bind_param("i", $_SESSION["p_id"]);
		$stmt->execute();
		$stmt->bind_result($u_id);
		
		while($stmt->fetch()){
			if ($u_id == $_SESSION["u_id"]){
				$likeflag = 1;
			}
		}
		//echo "here";
		if ($likeflag == 1){
			//echo "here";
			echo '<img src=http://globe-views.com/dcim/dreams/heart/heart-02.jpg class="resize3">';
		}
		$stmt->close();
	}
}
?>

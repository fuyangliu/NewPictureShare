<?php include "connectdb.php";
$tag = "none";
if(isset($_SESSION["user_name"])){
	//echo "here";
	if ($stmt = $mysqli->prepare("select tag from Tag where p_id = ?")){
		//echo "here";
		$stmt->bind_param("i", $_SESSION["p_id"]);
		$stmt->execute();
		$stmt->bind_result($tag);
		
		while($stmt->fetch()){
			
			echo '<a href="">'.$tag.'</a>';
		}
		//echo "here";
		$stmt->close();
	}
}
?>
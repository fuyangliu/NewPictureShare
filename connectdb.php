<?php if (session_status()!= PHP_SESSION_ACTIVE) session_start() ?>
<?php 
	$mysqli = new mysqli("localhost","root","","NewPictureShare");

	//if($mysqli) echo "connection success <br>";
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }

    if(isset($SESSION["REMOTE_ADDR"]) && $SESSION["REMOTE_ADDR"] != $SERVER["REMOTE_ADDR"]) {
		session_destroy();
		session_start();
	}

?>

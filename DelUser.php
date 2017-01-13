<?php
	$username = $_GET["username"];
	$command = "sudo deluser ".$username;
	$result1 = "";
	exec($command." 2<&1",$result1);

	echo $result1[0];
?>

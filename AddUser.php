<?php
	$username = $_GET["username"];
	$password = $_GET["password"];
	$command = "sudo useradd -m ".$username;
	$result1 = "";
	exec($command." 2<&1",$result1);
	$commandPass = "echo ".$username.":".$password." | sudo chpasswd";
	exec($commandPass);

	echo $result1[0];
?>

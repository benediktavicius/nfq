<?php
	$connect = mysqli_connect("localhost", "root", "", "nfq");
	if(mysqli_connect_errno())
	{
		echo "Connection failed!".mysqli_connect_error();
		exit;
	}
?>
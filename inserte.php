<?php
	$con = mysqli_connect('localhost','root','');
	if(!$con)
	{
		echo 'not connected';
	}
	if(!mysqli_select_db($con,'event'))
	{
		echo 'not selected';
	}
	$uid=$_POST['uid'];
	$etype=$_POST['etype'];
	$eaddress=$_POST['eaddress'];
	$sql = "INSERT INTO events (uid,etype,eaddress) VALUES ('$uid','$etype','$eaddress')";
	if(!mysqli_query($con,$sql))
	{
		echo "<script>alert('404...!!!')</script>";
	}
	else
	{
		 echo "<script>alert('inserted')</script>";
	}
	header("refresh:1; url=user.php");
?>
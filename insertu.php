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
	$uphone=$_POST['uphone'];
	$uaddress=$_POST['uaddress'];
	$sql = "INSERT INTO user (uid,uphone,uaddress) VALUES ('$uid','$uphone','$uaddress')";
	if(!mysqli_query($con,$sql))
	{
		echo "<script>alert('404...!!!')</script>";
	}
	else
	{
		echo "<script>alert('inserted')</script>";
	}
	header("refresh:2; url=user.php");
?>
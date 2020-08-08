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
	$uname=$_POST['uname'];
	$dte=$_POST['dte'];
	$noofpr=$_POST['noofpr'];
	$amount=1000*$noofpr;
	$sql = "INSERT INTO booking (uid,uname,dte,noofpr,amount) VALUES ('$uid','$uname','$dte','$noofpr','$amount')";
	if(mysqli_query($con,$sql))
	{
		
		echo "<script>alert('inserted')</script>";
	}
	else
	{
		echo "<script>alert('404.....!!!')</script>";

	}
	header("refresh:2; url=user.php");
?>
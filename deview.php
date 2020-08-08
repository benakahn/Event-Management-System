<?php
		$conn = mysqli_connect("localhost", "root", "", "event");
		if($conn-> connect_error)
		{
			die("Connection failed : " .$conn-> connect_error);
		}
		$bid=$_POST['bid'];
		$sql = "DELETE from booking where booking.bid ='$bid'" ;
		$result = $conn-> query($sql);
		if($result)
		{
			echo "<script>alert('Deleted')</script>";
			header("refresh:1; url:checkin.html");
		}
		
		else
		{
			echo "<script>alert('Invalid')</script>";
		}
		$conn-> close();
?>
<table border="1">
	<style>
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php
		$conn = mysqli_connect("localhost", "root", "", "event");
		if($conn-> connect_error)
		{
			die("Connection failed : " .$conn-> connect_error);
		}
		$uid=$_POST['uid'];
		$password=$_POST['password'];
		$sql = "SELECT userlog.uid,evid,userlog.uname,uphone,uaddress,etype,dte,eaddress,amount,gst FROM booking,events,user,userlog,gst WHERE userlog.uid = '$uid' AND booking.uid=userlog.uid AND events.uid=userlog.uid AND user.uid=userlog.uid AND userlog.password = '$password' and userlog.uid=gst.uid";
		$result = $conn-> query($sql);
		if($result-> num_rows > 0)
		{
			while ($row = $result-> fetch_assoc())
			{

				echo "<tr><th>UID</th><th>E-id</th><th>Uname</th><th>Uphone</th><th>Uaddress</th><th>Etype</th><th>Date</th><th>EADDRESS</th><th>AMOUNT</th><th>With GST</th></tr><tr><td>".$row["uid"] ."</td><td>".$row["evid"] ."</td><td>".$row["uname"] ."</td><td>".$row["uphone"] ."</td><td>".$row["uaddress"] ."</td><td>".$row["etype"] ."</td><td>".$row["dte"] ."</td><td>".$row["eaddress"] ."</td><td>".$row["amount"] ."</td><td>".$row["gst"] ."</td</tr>";
				ECHO "<script>alert('SUCCESS')</script>";
			}
			
		}
		else
		{echo "<script>alert('Invalid login')</script>";
					}
		$conn-> close();
		?>
</table>
<table border="0">
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
		$dte=$_POST['dte'];
		$sql = "SELECT dte,count(etype) FROM booking,events where booking.uid=events.uid and dte = '$dte'";
		$result = $conn-> query($sql);
		if($result-> num_rows > 0)
		{
			while ($row = $result-> fetch_assoc())
			{
				echo "<tr><th>DATE </th><th>Count </th></tr><tr><td> ".$row["dte"] ."</td><td>" .$row["count(etype)"] ."</td></tr>";
			}
		}
		$conn-> close();
?>
</table>
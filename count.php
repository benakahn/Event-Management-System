<table border="0">
	<style>
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd) {
  background-color: grey;
}
</style>
<?php
		$conn = mysqli_connect("localhost", "root", "", "event");
		if($conn-> connect_error)
		{
			die("Connection failed : " .$conn-> connect_error);
		}
		
		$sql = "CALL `Event_Count`()";
		$result = $conn-> query($sql);
		if($result-> num_rows > 0 )
		{
			while ($row = $result-> fetch_assoc())
			{
				echo "<tr><th>Total User Count in Userlog table </th></tr><tr><td>" .$row["count(*)"] ."</td></tr>";
			}
		}
		$conn-> close();
?>
</table>
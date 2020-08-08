<?php
?><!DOCTYPE html>
<html>
<head>
	<title>EVENT MANAGEMENT</title>
	<style type="text/css">
		body
		{
			background-image: url("6.png");
        	background-repeat:no-repeat;
        	background-size:100%;
        }
     .btn
{
  width: 150px;
  height: 40px;
   background-color: #4CAF50;
  border-radius: 5px;
  border: 2px solid #4CAF50;
  color: white;
  text-align: center;
  vertical-align: middle !important;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  cursor: pointer;
  text-align: center;
}
.text {
border-radius: 3px;
border: 1px solid grey;
padding-left: 5px;
width: 250px;
height: 25px;
}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script> 
</head>
<body>
 <div align="center" ng-app>
<p style="padding-top: 260px; font-family: Times New Roman, Helvetica; font-size: 25px; line-height: 29px; text-align: center; color: #000001; font-weight: bold;">DATA ENTRY</p>

       <button class="btn" ng-click="page='first'" title="Booking">Booking</button>
       <button class="btn" ng-click="page='temp'" title="Event">Event</button>
 <button class="btn" ng-click="page='second'" title="Users">Users</button><br><br>
 <form action="InsDet.html">
<button class="btn" title="Back">Back</button> 
</form>
<hr>
    
<div ng-show="page === 'first'">
       <form action="insertb.php" method="post" align="center">
<p style="font-family: Times New Roman, Helvetica; font-size: 25px; line-height: 29px; text-align: center; color: #000001; font-weight: bold;">Booking</p>

User-ID<br><input class="text" type="text" name="uid" placeholder="UID"><br><br>
User Name<br><input class="text" type="text" name="uname" placeholder="Username"><br><br>
Date<br><input class="text" type="date" name="dte" min="<?php echo date('Y-m-d'); ?>"><br><br>
No of People<br><input class="text" type="text" name="noofpr" placeholder="No of People"><br><br>
<button type="submit" class="btn">SUBMIT</button>
</form>
 </div>   
          <div ng-show="page === 'temp'">
          <form action="inserte.php" method="post" align="center">
<p style="font-family: Times New Roman, Helvetica; font-size: 25px; line-height: 29px; text-align: center; color: #000001; font-weight: bold;">Event</p>

User-ID<br><input class="text" type="text" name="uid" placeholder="UID"><br><br>
Event Type<br><input class="text" type="text" name="etype" placeholder="Event type"><br><br>
Address <br><input class="text" type="text" name="eaddress" placeholder="Address"><br><br>
<button type="submit" class="btn">SUBMIT</button>
</form>
            </div>
 <div ng-show="page === 'second'">
          <form action="insertu.php" method="post" align="center">
<p style="font-family: Times New Roman, Helvetica; font-size: 25px; line-height: 29px; text-align: center; color: #000001; font-weight: bold;">Users</p>

User-ID<br><input class="text" type="text" name="uid" placeholder="UID"><br><br>
User Contact<br><input class="text" type="text" name="uphone" placeholder="Contact" ><br><br>
Address<br><input class="text" type="text" name="uaddress" placeholder="Address"><br>
<br><button type="submit" class="btn">SUBMIT</button>
</form>
            </div>

            
         </div>
</body>
</html>
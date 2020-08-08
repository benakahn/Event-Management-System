<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}
body
    {
      background-image: url("6.png");
          background-repeat:no-repeat;
          background-size:100%;
      
        }

.container {
  padding: 16px;
}
.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto;
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
  padding-top: 60px;
}
.modal-content {
  background-color: #fff;
  margin: 5% auto 15% auto;
  border: 0px solid #888;
  width: 50%;
}

.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: black;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
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


@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  
}

.error {color: #FF0000;}
</style>
</head>
<body align="center">
<?php
$formName = $psw  = $uname  = $pswError = "";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $formName = test_input($_POST["formName"]);
  if ($formName == "Login"){
    $uname = test_input($_POST["uname"]);
    $psw = test_input($_POST["psw"]);
    
    $sql = "SELECT * FROM adminlog WHERE adminname = '$uname' AND password = '$psw'";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
  
    $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)){
      echo "<script>alert('Login Sucessfull')</script>";
      header("Location: checkin.html");
          die();
    }
    else{
      echo "Check Admin name and Password";
    
    }

    mysqli_close($conn);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p style="padding-top: 320px; font-family: Times New Roman, Helvetica; font-size: 25px; line-height: 29px; text-align: center; color: #000001; font-weight: bold;">Event Management</p>
<button onclick="document.getElementById('id').style.display='block'" class="btn" title="Login">Login</button>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
</form>
<div id="id" class="modal">
  <form class="modal-content animate" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <div class="container" style="padding-bottom: 50px;">
    <p style=" font-family: Times New Roman, Helvetica; font-size: 25px; line-height: 29px; text-align: center; color: #000001; font-weight: bold;">Login</p>
    <input type="hidden" name="formName" value="Login">
      <label for="uname"><b>Admin Name</b></label>
      <input class="text" type="text" placeholder="Admin Name" name="uname" required></br></br>
      <label for="psw"><b>Password</b></label>
      <input class="text" type="password" placeholder="Password" name="psw" required></br></br>
     <button type="button" onclick="document.getElementById('id').style.display='none'" class="btn" title="Cancel">Cancel</button>  
      <button class="btn" type="submit" title="Login">Login</button>
    </div>
  </form>
</div>
</div>
<script>
var modal = document.getElementById('id');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
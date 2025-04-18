</html>
<head><title>Hospital Booking</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
   <div class="subbody">
   <form method="post">   <br>
<div class="para">Username</div> <input type="text" name="username" required><br>
<div class="para">Password</div> <input type="password" name="password" required><br>
<input type="submit" name="submit" value="SIGN IN">
<input type="submit" name="create" value="SIGN UP">
</form>


<?php

$con=new mysqli("localhost","root","","hospital_booking");
$error="";
if($con->connect_error)
die("Not Connected");
if($_SERVER["REQUEST_METHOD"]=="POST"){
$username=$_POST["username"];
$password=$_POST["password"];

$sql="select * from admin_details where username='" . $username . "' and password='" . $password . "'";

$result=$con -> query($sql);

if($result -> num_rows < 1)
{
   echo "Invalid Credentials";
}
else{

   while($row=$result -> fetch_assoc()){
     
      session_start();
      $_SESSION['my_value'] = $row['username'];
      header("Location: admin_profile.php");
      exit;
      
}
  }
}
?>
</div>
</body>
</html>
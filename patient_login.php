<form method="post">   
Username <input type="text" name="username" required>
Password <input type="password" name="password" required>
<input type="submit" name="submit" value="SUBMIT">
<input type="submit" name="create" value="Create new Account">
</form>

<?php

$con=new mysqli("localhost","root","","hospital_booking");
$error="";
if($con->connect_error)
die("Not Connected");

if(isset($_POST["create"])){
   header("Location: patient_insert.php");
   exit;

}

if(isset($_POST["submit"])){
$username=$_POST["username"];
$password=$_POST["password"];

$sql="select * from patient_details where username='" . $username . "' and password='" . $password . "'";

$result=$con -> query($sql);

if($result -> num_rows < 1)
{
   echo "Invalid Credentials";
}
else{
  
   while($row=$result -> fetch_assoc()){

session_start();
$_SESSION['my_value'] = $row['patid'];
header("Location: patient_profile.php");
exit;

}
  }
}
?>
</html>
<head><title>Hospital Booking</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
   <div class="subbody">
    <div class="head">UPDATE ACCOUNT</div>
<?php
session_start();
$id=$_SESSION['my_value'];
$con=new mysqli("localhost","root","","hospital_booking");

if($con->connect_error)
die("Not Connected");

$sql="select * from patient_details where patid=" . $id ;
$result=$con -> query($sql);

while($row=$result -> fetch_assoc()){
    $fname=$row['patfname'];
    $sname=$row['patsname'];
    $dob=$row['patdob'];
    $mob=$row['patmob'];
    $email=$row['patemail'];
    $address=$row["pataddress"];
    $username=$row['username'];
    $password=$row["password"];

}

if($_SERVER["REQUEST_METHOD"]=="POST"){

if($_POST["password"] == $_POST["con_password"]) {
  $fname=$_POST["fname"];
  $sname=$_POST["sname"];
  $dob=$_POST["dob"];
  $mob=$_POST["mob"];
  $email=$_POST["email"];
  $address=$_POST["address"];
  $username=$_POST["username"];
  $password=$_POST["password"];
  

  $sqlp="update patient_details set patfname ='".$fname."' ,patsname='".$sname."',patdob='".$dob."',patmob='".$mob."',patemail='".$email."',pataddress='".$address."',username='".$username."',password='".$password."' where patid=". $id."";

if($con->query($sqlp) == FALSE)
die ("Unable to Update");
else
echo "<script> alert('Successfully Updated') </script>";
header("Location: patient_profile.php");
exit;
}
else {
    echo "<script> alert('Password missmatch') </script>";
}
}

?>
<form method="post">   
  <table>
<tr><td>First Name</td><td><input type="text" name="fname" value="<?php echo $fname; ?>" required></td></tr>
<tr><td>Second Name</td><td><input type="text" name="sname" value="<?php echo $sname; ?>" required></td></tr>
<tr><td>DOB </td><td><input type="date" name="dob" value="<?php echo $dob; ?>" required></td></tr>
<tr><td>Address </td><td><input type="text" name="address" value="<?php echo $address; ?>" required></td></tr>
<tr><td>Mobile Number</td><td><input type="text" name="mob" value="<?php echo $mob; ?>" required></td></tr>
<tr><td>Email </td><td><input type="text" name="email" value="<?php echo $email; ?>" required></td></tr>
<tr><td>Username </td><td><input type="text" name="username" value="<?php echo $username; ?>" required></td></tr>
<tr><td>Password </td><td><input type="password" name="password" value="<?php echo $password; ?>" required></td></tr>
<tr><td>Confirm Password </td><td><input type="password" name="con_password" value="<?php echo $password; ?>" required></td></tr>
</table><input type="submit" value="SUBMIT">
</form>
</div>
</body>
</html>
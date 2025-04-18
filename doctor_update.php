<?php
echo "<link rel='stylesheet' type='text/css' href='style.css'>"; 
session_start();
$id=$_SESSION['my_value'];
$con=new mysqli("localhost","root","","hospital_booking");

if($con->connect_error)
die("Not Connected");

$sql="select * from doctor_details where docid=" . $id ;

$result=$con -> query($sql);

while($row=$result -> fetch_assoc()){
    $fname=$row['docfname'];
    $sname=$row['docsname'];
    $doj=$row['docdoj'];
    $special=$row['special'];
    $mob=$row['docmob'];
    $email=$row['docemail'];
    $address=$row["docaddress"];
    $username=$row['username'];
    $password=$row["password"];

}

echo "<h1>Update</h1>";

if($_SERVER["REQUEST_METHOD"]=="POST"){

if($_POST["password"] == $_POST["con_password"]) {
  $fname=$_POST["fname"];
  $sname=$_POST["sname"];
  $doj=$_POST["doj"];
  $mob=$_POST["mob"];
  $special=$row['special'];
  $email=$_POST["email"];
  $address=$_POST["address"];
  $username=$_POST["username"];
  $password=$_POST["password"];
  

  $sqlp="update doctor_details set special='".$special."',docfname ='".$fname."' ,docsname='".$sname."',docdoj='".$doj."',docmob='".$mob."',docemail='".$email."',docaddress='".$address."',username='".$username."',password='".$password."' where docid=". $id."";

if($con->query($sqlp) == FALSE)
die ("Unable to Update");
else
echo "<script> alert('Successfully Updated') </script>";
header("Location: doctor_profile.php");
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
<tr><td>Date Of Joining </td><td><input type="date" name="doj" value="<?php echo $doj; ?>" required></td></tr>
<tr><td>Address </td><td><input type="text" name="address" value="<?php echo $address; ?>" required></td></tr>
<tr><td>Specialization </td><td><input type="text" name="special" value="<?php echo $special; ?>" required></td></tr>
<tr><td>Mobile Number</td><td><input type="text" name="mob" value="<?php echo $mob; ?>" required></td></tr>
<tr><td>Email </td><td><input type="text" name="email" value="<?php echo $email; ?>" required></td></tr>
<tr><td>Username </td><td><input type="text" name="username" value="<?php echo $username; ?>" required></td></tr>
<tr><td>Password </td><td><input type="password" name="password" value="<?php echo $password; ?>" required></td></tr>
<tr><td>Confirm Password </td><td><input type="password" name="con_password" value="<?php echo $password; ?>" required></td></tr>
<tr><td><input type="submit" value="SUBMIT"></td><td></td></tr>
</table>
</form>
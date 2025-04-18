
<?php
session_start();
if($_SESSION['my_value']==null)
{
   header("Location: first_page.php");
   exit;
}
$id=$_SESSION['my_value'];
$error="";
$CON=new mysqli("localhost","root","","hospital_booking");

if($CON-> connect_error)
die ("Not Connected");

if($_SERVER["REQUEST_METHOD"]=="POST"){

if($_POST["password"] == $_POST["con_password"]) {
  $fname=$_POST["fname"];
  $sname=$_POST["sname"];
  $doj=$_POST["doj"];
  $mob=$_POST["mob"];
  $email=$_POST["email"];
  $special=$_POST["special"];
  $address=$_POST["address"];
  $username=$_POST["username"];
  $password=$_POST["password"];
  

  $sql="insert into doctor_details (docfname,docsname,docdoj,docmob,docemail,docaddress,username,password,special)values('" . $fname . "','" . $sname . "','" . $doj ."'," . $mob .",'" . $email ."','" . $address ."','" . $username . "','" . $password. "','" . $special. "')";

if($CON->query($sql) == FALSE)
die ("Unable to insert");
else
echo "<script> alert('Successfully Inserted') </script>";
header("Location: admin_profile.php");
exit;
}
else {
    $error="Password missmatch";
}
}

?>
<form method="post">   
  <table>
<tr><td>First Name</td><td><input type="text" name="fname" required></td></tr>
<tr><td>Second Name</td><td><input type="text" name="sname" required></td></tr>
<tr><td>Date of joining </td><td><input type="date" name="doj" required></td></tr>
<tr><td>Address </td><td><input type="text" name="address" required></td></tr>
<tr><td>Specialization </td><td><input type="text" name="special" required></td></tr>
<tr><td>Mobile Number</td><td><input type="text" name="mob" required></td></tr>
<tr><td>Email </td><td><input type="text" name="email" required></td></tr>
<tr><td>Username </td><td><input type="text" name="username" required></td></tr>
<tr><td>Password </td><td><input type="password" name="password" required></td></tr>
<tr><td>Confirm Password </td><td><input type="password" name="con_password" required><?php echo $error; ?></td></tr>
<tr><td><input type="submit" value="SUBMIT"></td><td></td></tr>
</table>
</form>
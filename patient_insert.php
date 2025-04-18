</html>
<head><title>Hospital Booking</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
   <div class="subbody">
   <div class="head">Enter your Details</div>
<?php
$error="";
$CON=new mysqli("localhost","root","","hospital_booking");

if($CON-> connect_error)
die ("Not Connected");

if($_SERVER["REQUEST_METHOD"]=="POST"){

if($_POST["password"] == $_POST["con_password"]) {
  $fname=$_POST["fname"];
  $sname=$_POST["sname"];
  $dob=$_POST["dob"];
  $gender=$_POST["gender"];
  $mob=$_POST["mob"];
  $email=$_POST["email"];
  $address=$_POST["address"];
  $username=$_POST["username"];
  $password=$_POST["password"];
  

  $sql="insert into patient_details (patfname,patsname,patdob,patmob,patemail,pataddress,username,password,gender)values('" . $fname . "','" . $sname . "','" . $dob ."'," . $mob .",'" . $email ."','" . $address ."','" . $username . "','" . $password. "','" . $gender. "')";

if($CON->query($sql) == FALSE)
die ("Unable to insert");
else
echo "<script> alert('Successfully Inserted') </script>";
header("Location: patient_login.php");
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
<tr><td>DOB </td><td><input type="date" name="dob" required></td></tr>
<tr><td>Gender </td><td><input type='radio' name='gender' value='Male' checked>Male  <input type='radio' name='gender' value='Female'> Female</td></tr>
<tr><td>Address </td><td><input type="text" name="address" required></td></tr>
<tr><td>Mobile Number</td><td><input type="text" name="mob" required></td></tr>
<tr><td>Email </td><td><input type="text" name="email" required></td></tr>
<tr><td>Username </td><td><input type="text" name="username" required></td></tr>
<tr><td>Password </td><td><input type="password" name="password" required></td></tr>
<tr><td>Confirm Password </td><td><input type="password" name="con_password" required><?php echo $error; ?></td></tr>
</table>
<input type="submit" value="SUBMIT">
</form>

</div>
</body>
</html>
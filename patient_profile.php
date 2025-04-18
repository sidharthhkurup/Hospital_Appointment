<html>
<head><title>Hospital Booking</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
   <div class="subbody">
<?php
session_start();
if($_SESSION['my_value']==null)
{
   header("Location: patient_login.php");
   exit;
}
$id=$_SESSION['my_value'];
$con=new mysqli("localhost","root","","hospital_booking");
date_default_timezone_set('Asia/Kolkata');

if($con->connect_error)
die("Not Connected");

$sql="select * from patient_details where patid=" . $id . "";

$result=$con -> query($sql);

if($result -> num_rows < 1)
{
   echo "Invalid Credentials";
}
else{
   echo "<form method='post'>";
   echo "<table border='1'>" ;
   while($row=$result -> fetch_assoc()){
      echo "<div class='head'> Hey ". $row['patfname'] .",</div> " ;
echo "<tr><td>First Name</td><td>". $row['patfname'] . "</td></tr>";
echo "<tr><td>Second Name</td><td>". $row['patsname'] . "</td></tr>";
echo "<tr><td>DOB </td><td>". $row['patdob'] . "</td></tr>";
echo "<tr><td>Gender </td><td>". $row['gender'] . "</td></tr>";
echo "<tr><td>Address </td><td>". $row['patemail'] . "</td></tr>";
echo "<tr><td>Mobile Number</td><td>". $row['pataddress'] . "</td></tr>";
echo "<tr><td>Email </td><td>". $row['patmob'] . "</td></tr>";
echo "<tr><td>Username </td><td>". $row['username'] . "</td></tr>";
echo "<tr><td>Password </td><td>". $row['password'] . "</td></tr>";
echo "</table>";
echo "<input type='submit' name='appoint' value='BOOK APPOINTMENT'>";
echo "<input type='submit' name='edit' value='EDIT DETAILS'>";
echo "<input type='submit' name='delete' value='DELETE'>";
echo "<input type='submit' name='logout' value='LOGOUT'>";
 echo "</form>";


 if(isset($_POST['delete'])){
      $sqld="delete from patient_details where patid = " . $id ;
      $con -> query($sqld);
      $sqld="delete from appointment_details where patid = " . $id ;
      $con -> query($sqld);
      session_destroy();
      echo "<script> alert('Account Deleted') </script>";
      header("Location: patient_login.php");
      exit;
   }
}


echo "<div class='head'>Appointment Details</div>";
$sqla="SELECT b.docfname,b.docsname,b.docmob, a.apdate, a.slot FROM appointment_details AS a JOIN doctor_details AS b ON b.docid = a.docid WHERE a.patid=".$id." and (a.apdate > date(".date('Y-m-d')."))";

$result=$con->query($sqla);

if($result -> num_rows < 1)
echo "<div class='para'>No Appointments Available</div>";
else
{

   echo "<table border='1'>" ;
   echo "<tr><th>Dotor Name</th><th>Mobile Number</th><th>Date of Appointment</th><th>Slot</th></tr>";
   while($row=$result -> fetch_assoc()){

$name=$row['docfname'] . " ". $row['docsname'];
$date=$row['apdate'];
$mob=$row['docmob'];
$slot=$row['slot'];

echo "<tr><td> Dr. ". $name . "</td>";
echo "<td>". $mob . "</td>";
echo "<td>". $date . "</td>";
echo "<td>". $slot . "</td></tr>";
}
  echo "</table>";

}

if(isset($_POST['logout'])){
   session_destroy();
   header("Location: first_page.php");
   exit;
}


if (isset($_POST['edit'])) {
   header("Location: patient_update.php");
   exit;
}
if (isset($_POST['appoint'])) {
   header("Location: book_appointement.php");
   exit;
}

}
?>

</div>
</body>
</html>
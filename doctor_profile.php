<?php

echo "<link rel='stylesheet' type='text/css' href='style.css'>"; 

session_start();
if($_SESSION['my_value']==null)
{
   header("Location: doctor_login.php");
   exit;
}
$id=$_SESSION['my_value'];
$con=new mysqli("localhost","root","","hospital_booking");

if($con->connect_error)
die("Not Connected");

$sql="select * from doctor_details where docid=" . $id . "";

$result=$con -> query($sql);

date_default_timezone_set('Asia/Kolkata');


if($result -> num_rows < 1)
{
   echo "Invalid Credentials";
}
else{
   echo "<form method='post'>";
   echo "<table border='1'>" ;
   while($row=$result -> fetch_assoc()){
      echo "<h2> Hey ". $row['docfname'] .",</h2> " ;
echo "<tr><td>First Name</td><td>". $row['docfname'] . "</td></tr>";
echo "<tr><td>Second Name</td><td>". $row['docsname'] . "</td></tr>";
echo "<tr><td>Specialization </td><td>". $row['special'] . "</td></tr>";
echo "<tr><td>doj </td><td>". $row['docdoj'] . "</td></tr>";
echo "<tr><td>Address </td><td>". $row['docemail'] . "</td></tr>";
echo "<tr><td>Mobile Number</td><td>". $row['docaddress'] . "</td></tr>";
echo "<tr><td>Email </td><td>". $row['docmob'] . "</td></tr>";
echo "<tr><td>Username </td><td>". $row['username'] . "</td></tr>";
echo "<tr><td>Password </td><td>". $row['password'] . "</td></tr>";
echo "</table>";
echo "<input type='submit' name='edit' value='EDIT DETAILS'><br>";
echo "<input type='submit' name='logout' value='LOGOUT'>";
 echo "</form>";

}


echo "<h3>Hey Doctor, Please find your appointment details below</h3>";
$sqla="SELECT b.patfname,b.patsname,b.patmob, a.apdate, a.slot FROM appointment_details AS a JOIN patient_details AS b ON b.patid = a.patid WHERE (a.docid=".$id.") and (a.apdate > date(".date('Y-m-d')."))";

$result=$con->query($sqla);

if($result -> num_rows < 1)
echo "No Appointments Available";
else
{

   echo "<table border='1'>" ;
   echo "<tr><th>Patient Name</th><th>Mobile Number</th><th>Date of Appointment</th><th>Slot</th></tr>";
   while($row=$result -> fetch_assoc()){

$name=$row['patfname'] . " ". $row['patsname'];
$date=$row['apdate'];
$mob=$row['patmob'];
$slot=$row['slot'];

echo "<tr><td>". $name . "</td>";
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
   header("Location: docient_update.php");
   exit;
}


}
?>
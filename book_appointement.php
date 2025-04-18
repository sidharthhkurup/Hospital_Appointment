
<?php
session_start();
if($_SESSION['my_value']==null)
{
   header("Location: patient_login.php");
   exit;
}
$id=$_SESSION['my_value'];
$con=new mysqli("localhost","root","","hospital_booking");
if($con->connect_error)
die("Not Connected");

//$sqlp="select * from patient_details";

$sqld="select * from doctor_details";
$slot="";
  $result=$con -> query($sqld);
  echo "<h4>Doctor Details</h4>";
  if($result -> num_rows < 1)
  {
     echo "No Data Available";
  }
  else{
   
     echo "<table border='1'>" ;
     echo "<tr><th>Name</th><th>Specialization</th><th>Mobile Number</th></tr>";
     while($row=$result -> fetch_assoc()){
  
  echo "<tr><td> Dr. ". $row['docfname'] ." ". $row['docsname']."</td>";
  echo "<td>". $row['special'] . "</td>";
  echo "<td>". $row['docmob'] . "</td>";

  echo "<td><form method='post'><input type='hidden' name='docfname' value='". $row['docfname'] ."'><input type='hidden' name='docid' value='". $row['docid'] ."'><select name='date' id='date'><option value='2025-11-10'>2025-11-10</option> <option value='2025-11-12'>2025-11-12</option>    <option value='2025-11-11'>2025-11-11</option></select><select name='slot' id='slot'><option value='Morning' default>Morning</option>    <option value='Afternoon'>Afternoon</option></select><input type='submit' name='book' value='BOOK NOW'></form></td></tr>";
     }
    echo "</table>";
     
    
    if(isset($_POST['book']) && isset($_POST['docfname']) ){
      

      $sqlp="insert into appointment_details(docid,patid,apdate,slot)values(".$_POST['docid'].",".$id.",'".$_POST['date']."','".$_POST['slot']."');";
      $con->query($sqlp);
      $bookedDoc = htmlspecialchars($_POST['docfname']);
      echo "<script> alert(Appointment Booked with Dr. '".$bookedDoc.") </script>";        
      header("Location: patient_profile.php");
      exit;
    }
  }
?>
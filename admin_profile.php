</html>
<head><title>Hospital Booking</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
   <div class="subbody">
<?php
echo ""; 
$con=new mysqli("localhost","root","","hospital_booking");

session_start();
if($_SESSION['my_value']==null)
{
   header("Location: first_page.php");
   exit;
}
$id=$_SESSION['my_value'];

if($con->connect_error)
die("Not Connected");

$sqlp="select * from patient_details";

$result=$con -> query($sqlp);
echo "<div class='head'>Patient Details</div>";
if($result -> num_rows < 1)
{
   echo "No Data Available";
}
else{
  
   echo "<table>" ;
   echo "<tr><th>First Name</th><th>Second Name</th><th>Date of Birth</th><th>Gender</th><th>Address<th>Mobile Number</th><th>Email </th> <th>Username </th><th>Password </th><th>Edit</th><th>Delete</th></tr>";
   while($row=$result -> fetch_assoc()){

echo "<tr><td>". $row['patfname'] . "</td>";
echo "<td>". $row['patsname'] . "</td>";
echo "<td>". $row['patdob'] . "</td>";
echo "<td>". $row['gender'] . "</td>";
echo "<td>". $row['pataddress'] . "</td>";
echo "<td>". $row['patmob'] . "</td>";
echo "<td>". $row['patemail'] . "</td>";
echo "<td>". $row['username'] . "</td>";
echo "<td>". $row['password'] . "</td>";
echo "<td ><form method='post'><input type='hidden' name='patid' value='". $row['patid'] ."'><input type='submit' name='patedit' value='EDIT'></form></td>";
echo "<td><form method='post'><input type='hidden' name='patid' value='". $row['patid'] ."'><input type='submit' name='patdelete' value='DELETE'></form></td></tr>";
}
  echo "</table><br>";
  }

  $sqld="select * from doctor_details";

  $result=$con -> query($sqld);
  echo "<div class='head'>Doctor Details</div>";
  if($result -> num_rows < 1)
  {
     echo "No Data Available";
  }
  else{
    
     echo "<table>" ;
     echo "<tr><th>First Name</th><th>Second Name</th><th>Date of Joining </th><th>Specialization</th><th>Gender</th><th>Address<th>Mobile Number</th><th>Email </th> <th>Username </th><th>Password </th> <th>Edit</th><th>Delete</th></tr>";
     while($row=$result -> fetch_assoc()){
  
  echo "<tr ><td>". $row['docfname'] . "</td>";
  echo "<td>". $row['docsname'] . "</td>";
  echo "<td>". $row['docdoj'] . "</td>";
  echo "<td>". $row['special'] . "</td>";
  echo "<td>". $row['gender'] . "</td>";
  echo "<td>". $row['docaddress'] . "</td>";
  echo "<td>". $row['docmob'] . "</td>";
  echo "<td>". $row['docemail'] . "</td>";
  echo "<td>". $row['username'] . "</td>";
  echo "<td>". $row['password'] . "</td>";
  echo "<td ><form method='post'><input type='hidden' name='docid' value='". $row['docid'] ."'><input type='submit' name='docedit' value='EDIT'></td>";
  echo "<td><form method='post'><input type='hidden' name='docid' value='". $row['docid'] ."'><input type='submit' name='docdelete' value='DELETE'></form></td></tr>";
  }
    echo "</table><br>";
    }
    
    
    echo "<form method='post'><input type='submit' name='create' value='Create Doctor Account'></form><br>";
    echo "<div class='head'>Appointment Details</div><br>";
    $sqla="SELECT p.patfname,p.patsname,d.docfname,d.docsname, a.apdate, a.slot FROM appointment_details AS a JOIN patient_details AS p ON a.patid = p.patid JOIN doctor_details AS d ON a.docid = d.docid";
    
    $result=$con->query($sqla);
    
    if($result -> num_rows < 1)
    echo "No Appointments Available<br><br>";
    else
    {
    
       echo "<table>" ;
       echo "<tr><th>Doctor Name</th><th>Patient Name</th><th>Date of Appointment</th><th>Slot</th></tr>";
       while($row=$result -> fetch_assoc()){
    $dname=$row['docfname'] . " ". $row['docsname'];
    $pname=$row['patfname'] . " ". $row['patsname'];
    $date=$row['apdate'];
    $slot=$row['slot'];
    
    echo "<tr><td>Dr. ". $dname . "</td>";
    echo "<td>". $pname . "</td>";
    echo "<td>". $date . "</td>";
    
    echo "<td>". $slot . "</td></tr>";
    }
      echo "</table><br><br>";
    
    }
    
    echo "<br><form method='post'><input type='submit' name='logout' value='LOGOUT'></form><br>";

    if(isset($_POST['logout'])){
      session_destroy();
      header("Location: first_page.php");
      exit;
   }

   if(isset($_POST['docdelete']) && isset($_POST['docid']) ){
      

      $sqld="delete from doctor_details where docid = " . $_POST['docid'] ;
      $con -> query($sqld);
      $sqld="delete from appointment_details where docid = " . $_POST['docid'] ;
      $con -> query($sqld);
      echo "<script> alert('Account deleted') </script>";      
      header("Location: admin_profile.php");
      exit;
    }

    if(isset($_POST['patdelete']) && isset($_POST['patid']) ){
      

      $sqld="delete from patient_details where patid = " . $_POST['patid'] ;
      $con -> query($sqld);
      $sqld="delete from appointment_details where patid = " . $_POST['patid'] ;
      $con -> query($sqld);
      echo "<script> alert('Account deleted') </script>";      
      header("Location: admin_profile.php");
      exit;
    }

    if(isset($_POST['patedit']) && isset($_POST['patid']) ){
      $_SESSION['pat_id'] = $_POST['patid'];
      header("Location: patient_update_by_admin.php");
      exit;
    }

    if(isset($_POST['docedit']) && isset($_POST['docid']) ){
      $_SESSION['doc_id'] = $_POST['docid'];
      header("Location: doctor_update_by_admin.php");
      exit;
    }    

    if(isset($_POST["create"])){
      header("Location: doctor_insert.php");
      exit;
   
   }
?>
</div>
</body>
</html>
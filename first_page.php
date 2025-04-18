<link rel='stylesheet' type='text/css' href='style.css'>
<body>
</div class="subbody">
<form method="post">
<input type="submit" name="patient" value="Patient"><br>
<input type="submit" name="doctor" value="Doctor"><br>
<input type="submit" name="admin" value="Admin">
</form>


<?php

if(isset($_POST['patient'])){
    header("Location: patient_login.php");
    exit;
}

if(isset($_POST['doctor'])){
    header("Location: doctor_login.php");
    exit;
}

if(isset($_POST['admin'])){
    header("Location: admin_login.php");
    exit;
}

?>
</div>
</body>
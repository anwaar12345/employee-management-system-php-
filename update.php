<?php require_once('functions.php'); ?>
<?php require_once('db.php'); ?>
<?php confirm_login(); ?>

<?php

if(isset($_POST['done'])){

  $id = $_GET['id'];
 
  $name = htmlentities($_POST['name']);
  $ssn = htmlentities($_POST['ssn']);
  $dept = htmlentities($_POST['dept']);
  $salary = htmlentities($_POST['salary']);
  $contact = htmlentities($_POST['contact']);
  $adress = htmlentities($_POST['address']);
  
  
  if(!isset($name) || $name == '' || !isset($ssn) || $ssn == '' || !isset($dept) || $dept == '' || !isset($contact) || $contact == '' || !isset($adress) || $adress == ''){
    
      $error = "please fill out all fields";
       
      header("location: update.php?id=$id".urlencode($error));
      exit();
  }
  
  else{
  
 $qu = " UPDATE emp_record SET id=$id, ename='$name', ssn='$ssn', dept='$dept', salary='$salary', phone='$contact', emaddress='$adress' WHERE id=$id ";
    $query = mysqli_query($con,$qu);
    $u="Record Has Been Updated";
  header("location: index.php?=".urlencode($u));
  exit();
  }
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Employee Record Management System</title>
</head>
<body>
<div class="container">
<h2>Employee Record Management System</h2>
  <form action="update.php" method="POST">

    <div class="form-group">
      <label for="name">Name:</label>
       <br>      
      <input type="text" class="form-control" placeholder="Enter Employee Name"  name="name">

    </div>
    <div class="form-group">
      <label for="ssn">Social Security Number:</label>
      <input type="text" class="form-control"  placeholder="Enter SSN Number" name="ssn">
    </div>
    
    <div class="form-group">
      <label for="dept">Department:</label>
      <input type="text" class="form-control"  placeholder="Enter Department" name="dept">
    </div>
    
    <div class="form-group">
      <label for="monsalary">Monthly Salary:</label>
      <input type="text" class="form-control"  placeholder="Enter Salary" name="salary">
    </div>
    
    <div class="form-group">
      <label for="phone">Contact Number:</label>
      <input type="text" class="form-control"  placeholder="Enter Contact Number" name="contact">
    </div>
    
    <div class="form-group">
      <label for="address">Employee Address:</label>
      <input type="text" class="form-control"  placeholder="Enter Employee Address" name="address">
    </div>

    <hr>
    <input class="btn btn-primary" type="submit" value="Update" name="done">
  </form>
</div>
</body>
</html>

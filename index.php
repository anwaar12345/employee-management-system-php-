<?php require_once('functions.php'); ?>
<?php require_once('db.php'); ?>
<?php confirm_login(); ?>
<?php
$err = "";
$s="";
if(isset($_POST['submit']))
{

$name = htmlentities($_POST['name']);
$ssn = htmlentities($_POST['ssn']);
$dept = htmlentities($_POST['dept']);
$salary = htmlentities($_POST['salary']);
$contact = htmlentities($_POST['contact']);
$address = htmlentities($_POST['address']);
 

if(!empty($name) && !empty($ssn) && !empty($dept) && !empty($salary) && !empty($contact) && !empty($address)){
    $q  = "INSERT INTO emp_record(ename,ssn,dept,salary,phone,emaddress) VALUES ('$name','$ssn','$dept','$salary','$contact','$address')";
    $e =  mysqli_query($con,$q);
    if($e){
        $s = "Inserted !!!";
    }else{
        echo "failed";
    }
}else{
    $err = "fill out the form Completely !!!";
}

}
//delete code 
if(isset($_GET['id'])){
    $v = $_GET['id'];
    $qd = " DELETE from emp_record WHERE id = '$v' ";
    if(mysqli_query($con,$qd)){
      $error = "Record has Been Deleted";
       header("location: index.php?=".urlencode($error));
      exit();
  
    }else{
        echo "failed";
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
<div style="margin-top:100px;">

</div>
<div class="row">
<div class="col-sm-2">

<a href="logout.php" class="btn btn-primary">Logout!</a>

</div>

<div class="col-sm-10">
<h2>Employee Record Management System</h2>
  
<a href="search.php" class="btn btn-primary">Search Record!</a>
  <form action="index.php" method="POST">
  <h3 style="color:red;"> <?php echo $err; ?> </h3>
  <h1 style="color:lightseagreen;"> <?php echo $s; ?> </h1>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control"  placeholder="Enter Name" name="name">
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
    <input class="btn btn-primary" type="submit" value="submit" name="submit">
  </form>

</div>
<br>
<br>
<br>
<div class="row">
<div class="col-sm-12">
<hr>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Employee ID</th>
        <th>Employee Name</th>
        <th>Social Security Number</th>
        <th>Department</th>
        <th>Monthly Salary</th>
        <th>Contact Number</th>
        <th>Employee Address</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $vq="SELECT * FROM  emp_record";
    $eq=mysqli_query($con,$vq);
    while( $row= mysqli_fetch_array($eq) ){
    ?>
      <tr>
        <td> <?php echo $row['id']; ?></td>
        <td> <?php echo $row['ename']; ?></td>
        <td> <?php echo $row['ssn']; ?></td>
        <td> <?php echo $row['dept']; ?></td>
        <td> <?php echo $row['salary']; ?></td>
        <td> <?php echo $row['phone']; ?></td>
        <td> <?php echo $row['emaddress']; ?></td>
        <td> <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">update</a></td>
        <td> <a href="index.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>

</div>
</body>
</html>
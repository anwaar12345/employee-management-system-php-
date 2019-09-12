<?php require_once('functions.php'); ?>
<?php require_once('db.php'); ?>
<?php confirm_login(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>    
  <title>Search Page</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">
<br>
<br>
<br>
<a href="index.php" class="btn btn-primary">Redirect To Home !!!</a>
<br>
<br>
<br> 
<Form method="GET" action="search.php">
<div class="form-group">
      <label for="name">Search: </label>
      <input type="text" class="form-control"  placeholder="Enter SSN to search" name="sea">
      <br>
      <input class="btn btn-primary" type="submit"  value="submit" name="submit">
    </div>
</Form>

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
    if(isset($_GET['submit'])){
     $s = htmlentities($_GET['sea']);
    $vq="SELECT * FROM emp_record WHERE ssn='$s' OR ename='$s' ";
    $result=mysqli_query($con,$vq);
    while( $row= mysqli_fetch_array($result) ){
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
        <td> <a href="index.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a> </td>
      </tr>
    <?php }
}
?>
    </tbody>
  </table>

</div>
</div>
  </div>
</body>
</html>

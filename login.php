<?php include_once("db.php"); ?>
<?php include_once("functions.php"); ?>

<?php

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $pass = $_POST['password'];
    if(!empty($name) && !empty($pass)){
   
  $found_account = login_attempt($name,$pass); 
if($found_account){
    $_SESSION['u_id'] = $found_account['id'];
    header('location:index.php?'.$_SESSION['u_id']);
}else{
    echo "failed";
    header('location:login.php');

}    
}
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>    <title>LoginIn Page</title>
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-sm-offset-4 col-sm-4">
    <Form method="POST" action="login.php" name="myForm" onsubmit="return validateForm();">
   
<div class="form-group">
      <label for="name">Admin: </label>
      <input type="text" class="form-control"  placeholder="Enter User Name" name="name">
      
    </div>
    <div class="form-group">
      <label for="name">Password: </label>
      <input type="password" class="form-control"  placeholder="Enter Password" name="password">
      
    </div>
    <input class="btn btn-primary" type="submit"  value="login" name="submit">
</Form>

    </div>
    </div>
    
    </div>

    <script>
function validateForm() {
  var x = document.forms["myForm"]["name"].value;
  var y = document.forms["myForm"]["password"].value;
  if (x == "" && y == "") {
    alert("Form must be filled out");
    return false;
  }
}
</script>
</body>

</html>
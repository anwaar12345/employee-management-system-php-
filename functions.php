<?php session_start(); ?>

<?php

function login_attempt($name,$pass)
{
    $con = mysqli_connect("localhost","root","","emprecord");
    $q = "SELECT * FROM users WHERE name ='$name' AND password='$pass'";
    $e = mysqli_query($con,$q);
    if($admin = mysqli_fetch_assoc($e)){
        return $admin;
    }else{
        return null;
    }
}

function login()
{
if(isset($_SESSION['u_id']))
{
    return true;
}

}
function confirm_login()
{
if(!login()){
    header('location:login.php');
}
}
?>
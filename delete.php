<?php

session_start();
if(!isset($_SESSION['data'])){
    header('location:login.php');
}else{
    $hostname = 'localhost';
    $user = 'root';
    $password = '';
    $db_name  = 'cms';

    $conn=mysqli_connect($hostname,$user,$password,$db_name);
    
    if(!$conn){
            die("connection failed:".mysqli_connect_error());
    }else{
        mysqli_select_db($conn,"cms");
    }
    $query="DELETE FROM users where id =".$_GET['id'];
    
    $result=mysqli_query($conn,$query);
    
    header('Location:registration.php');
}
?>


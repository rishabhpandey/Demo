<?php
 
session_start();
if(!isset($_SESSION['data'])){
    header('location:login.php');
}
?>
<html>
    <head>
        <title>View</title>
    </head>   
    <body>
        <h3>Hello</h3>
        <p>You are logged in successfully!!</p>
        <a href="logout.php">Logout</a>
    </body>
</html>

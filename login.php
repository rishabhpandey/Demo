<?php
if((isset($_POST['username'])) &&(isset($_POST['password']))){
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db_name  = 'cms';
    
    $conn = mysqli_connect($hostname,$username,$password,$db_name);
    
    $query = mysqli_query($conn,
            'SELECT * FROM users where username = "'.$_POST['username'].'" and password = "'.$_POST['password'].'" LIMIT 1');
    
    if($data = mysqli_fetch_assoc($query)){
        session_start();
        $_SESSION['data'] = $data;
        header('location:view.php');
    }else{
        echo('Incorrect username or password');
    }
}
?>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="login.php" method="POST">
            Username:<input type="text" name="username"/><br>
            Password:<input type="password" name="password"/><br>
            <input type="submit"/>
        </form>
    </body>
</html>
<?php
if((isset($_POST['username'])) &&(isset($_POST['password']))){
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db_name  = 'cms';
    
    $conn = mysqli_connect($hostname,$username,$password,$db_name);
    
    $query = mysqli_query($conn,
            'SELECT * FROM users where username = "'.$_POST['username'].'" and password = "'.$_POST['password'].'" LIMIT 1');
    
    if($username = mysqli_fetch_assoc($query)){
        session_start();
        $_SESSION['data'] = $username;
        $_SESSION['data'] = $password;
        header('location:registration.php');
    }
}
?>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form name="login"  action="#" method="POST" onsubmit="return validateform()">
            Username:<input type="text" name="username" id="username"/><br>
            Password:<input type="password" name="password" id="password"/><br>
            <input type="submit"/>
            
        </form>
    </body>
    <script src="validation.js" type="text/javascript"></script>
</html>
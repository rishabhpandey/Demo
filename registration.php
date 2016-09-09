<?php

session_start();
if(!isset($_SESSION['data'])){
    header('location:login.php');
}else{
    if((isset($_POST['username'])) &&(isset($_POST['password']))){
        $hostname = 'localhost';
        $user = 'root';
        $password = '';
        $db_name  = 'cms';

        $conn = mysqli_connect($hostname,$user,$password,$db_name);
        
        $query = "INSERT INTO users(`Name`,`Age`,`Phone`,`Email`,`Username`,`Password`) "
                ."VALUES ('{$_POST['name']}','{$_POST['age']}','{$_POST['phone']}','{$_POST['email']}','{$_POST['username']}','{$_POST['password']}')";
       
        if (! mysqli_query($conn, $query)) {
            var_dump(mysqli_error($conn));
        }else{
            $_SESSION['data'] = $user;
            header('location:view.php');
        }
    
    }
}
?>
<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <form name="regisration" action="registration.php" method="post">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" id="name" name="name" placeholder="Name"></td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td><input type="number" id="age" name="age" placeholder="Age"></td>
                </tr>
                <tr>
                    <td>Contact Details</td>
                    <td><input type="text" id="phone" name="phone" pattern="[0-9]{1}[0-9]{9}" placeholder="Contact Number"></td>
                </tr>
                <tr>
                    <td>Email Id</td>
                    <td><input type="email" id="email" name="email" placeholder="Email Id"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" id="username" name="username" placeholder="Username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" id="password" name="password" placeholder="Password"></td>
                </tr>
            </table>
            <button type="submit" href="view.php">Submit</button>
        </form>
    </body>
</html>
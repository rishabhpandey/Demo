<?php
session_start();

if(!isset($_SESSION['data'])){
    header('location:login.php');
}else{
        $hostname = 'localhost';
        $user = 'root';
        $password = '';
        $db_name  = 'cms';

        $conn = mysqli_connect($hostname,$user,$password,$db_name);
        if(isset($_POST) && !empty($_POST))
        { 
            $sql = "UPDATE `users` SET `name`='{$_POST['name']}',`Age`='{$_POST['age']}',`Phone`='{$_POST['phone']}',`Email`='{$_POST['email']}',`Username`='{$_POST['username']}',
                   `Password`='{$_POST['password']}' WHERE`id`='{$_GET['id']}'";
            var_dump($sql);
            if (! mysqli_query($conn, $query)) {
                var_dump(mysqli_error($conn));
            }else{
                $_SESSION['data'] = $user;
                header('location:view.php');
            }
        }else{
            $sql="SELECT * FROM users WHERE ID = '{$_GET['id']}'";
            $query = mysqli_query($conn,$sql);
            $result = $query->fetch_assoc();
            var_dump($result);
        }
    
}
?>
<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <form name="regisration" action="profile.php" method="post">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" id="name" name="name" placeholder="Name" value="<?php echo $result['name'] ;?>"></td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td><input type="number" id="age" name="age" placeholder="Age" value="<?php echo $result['age'] ;?>"></td>
                </tr>
                <tr>
                    <td>Contact Details</td>
                    <td><input type="text" id="phone" name="phone" pattern="[0-9]{1}[0-9]{9}" placeholder="Contact Number" value="<?php echo $result['phone'] ;?>"></td>
                </tr>
                <tr>
                    <td>Email Id</td>
                    <td><input type="email" id="email" name="email" placeholder="Email Id" value="<?php echo $result['email'] ;?>"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" id="username" name="username" placeholder="Username" value="<?php echo $result['username'] ;?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" id="password" name="password" placeholder="Password" value="<?php echo $result['password'] ;?>"></td>
                </tr>
            </table>
            <button type="submit" href="view.php">Submit</button>
        </form>
    </body>
</html>
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
    
    $query="SELECT * FROM users";
    
    $result=mysqli_query($conn,$query);
}
?>
<html>
    <head>
        <title>List</title>
    </head>
    <body>
        <form name="view" action="view.php" method="post">
        <div>
            <h3>
                <u>View Users</u>
            </h3>
        </div>
        <?php
         if(isset($_SESSION['registration']))
         {
          header("location:profile.php");
         }
        ?>
        <table border=3>
            <tr>
                <td><u><b>Id</b></u></td>	
                <td><u><b>Name</b></u></td>	 
                <td><u><b>Age</b></u></td>
                <td><u><b>Contact Details</b></u></td>
                <td><u><b><center>Email Id</center></b></u></td>
                <td><u><b>Username</b></u></td>
                <td><u><b>Password</b></u></td>
                <td><u><b><center>Options</center></b></u></td>
            </tr>	
            <?php 
                while($get=$result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $get['id']?></td>
                <td><?php echo $get['name']?></td>
                <td><?php echo $get['age']?></td>
                <td><?php echo $get['phone']?></td>
                <td><?php echo $get['email']?></td>
                <td><?php echo $get['username']?></td>
                <td><?php echo $get['password']?></td>

                <td>
                    <a href="profile.php?id=<?php echo $get['id'];?>">VIEW</a>
                    <a href="delete.php?id=<?php echo $get['id'];?>">DELETE</a>
                </td>
            </tr>

            <?php 
            }
            mysqli_close($conn);
            ?>
        </table>
        <br/>
        <br/>
        <a href="registration.php?id=<?php echo $get['id'];?>"><b>New Registration</b></a>
        </form>
    </body>
</html>
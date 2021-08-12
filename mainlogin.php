<?php
require 'dbconfig.php';
if(isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: ".mysqli_connect_errno();
        }
        else{
            $query = "SELECT * FROM creatorlogin WHERE username='$username'";

            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);
            $dbpassword = $row['password'];


            if($dbpassword !== $password)
            {
                header("Location: ./createquiz.html?error=passwordnotmatch");
                //exit();
            }
            else{
                session_start();
                $_SESSION['regno']=$username;
                header("Location: ./setid.php?login=success");
                exit();
            }
            mysqli_close($conn);
        }
      } 
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel = "icon" href="./img/logo.JPG" type = "image/x-icon">
    <style type="text/css">
        #body_bg
{ 
background-image: url('img/bg1.jpg');
             background-color: rgba(255, 255, 255, 0.25);
            background-blend-mode: overlay; 
}

#login-form{ 

background:#A9D0F5; 
border: 3 px solid #eeeee;
padding:50px 50px;
 width:700px; 
 border-radius:5px; 
}
td{
    font-size: 30px;
    padding: 40px;
}
button,.btn{
    font-size: 30px;
    color: white;
    background-color: black;
}
button,.btn:hover
{
    color: black;
    background-color: white;
}

    </style>
</head>
<body>
    <body id="body_bg">
<div <div align="center">

<h1>Creator login (individual)</h1>
    <form id="login-form" method="post" action="mainlogin.php" >
        <table border="0.5">
            <tr>
                <td id="content"><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" style="height: 40px;width: 400px;"></input></td>
            </tr>
            
            <tr>
                
                <td><div><a href="setid.php"><input type="submit" value="Login" class="btn"></a></div>
                <td><div><a href="mainlogin.php"><input type="reset" value="Reset" class="btn"></a></div>
                
            </tr>
        </table>
    </form>
        </div>
</body>
</html>
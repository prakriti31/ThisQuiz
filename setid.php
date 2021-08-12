<?php
require 'dbconfig.php';
if(isset($_POST['qid']))
   {
                session_start();
            $qid=$_POST['qid'];
                $_SESSION['qid']=$qid;
                header("Location: ./createquiz.php?login=success");
                exit();
            mysqli_close($con);
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

<h1>Set Quiz ID</h1>
    <form id="login-form" method="post" action="setid.php" >
        <table border="0.5">
            <tr>
                <td id="content"><label for="qid">Quiz ID</label></td>
                <td><input type="text" name="qid" id="qid" style="height: 40px;width: 400px;"></td>
            </tr>
            
            <tr>
                
                <td><div><a href="createquiz.php"><input type="submit" value="Set" class="btn"></a></div>
                <td><div><a href="setid.php"><input type="reset" value="Reset" class="btn"></a></div>
                
            </tr>
        </table>
    </form>
        </div>
</body>
</html>
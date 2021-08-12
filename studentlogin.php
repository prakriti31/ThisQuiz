<?php
require 'dbconfig.php';
if(isset($_POST['rollno']))
    {
        $rollno = $_POST['rollno'];
        $name = $_POST['name'];
        $email=$_POST['email'];
        $qid=$_POST['qid'];
            $query = "INSERT INTO studentuser(stuid,name,email,qid)VALUES('$rollno', '$name','$email','$qid')";
            $result = mysqli_query($con,$query);
                session_start();
                $_SESSION['stuid']=$rollno;
                $_SESSION['name']=$name;
                $_SESSION['quizid']=$qid;
                header("Location:./mainquiz.php");
               mysqli_close($con);
        }    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Login | This Quiz</title>
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

<h1>Student Login</h1>
    <form id="login-form" method="post" action="studentlogin.php" >
        <table border="0.5">
            <tr>
                <td id="content"><label for="rollno">Roll No.</label></td>
                <td><input type="text" name="rollno" id="rollno" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="name" name="name" id="name" style="height: 40px;width: 400px;"></input></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email" style="height: 40px;width: 400px;"></input></td>
            </tr>
            <tr>
                <td><label for="qid">Quiz ID</label></td>
                <td><input type="qid" name="qid" id="qid" style="height: 40px;width: 400px;"></input></td>
            </tr>
			
            <tr>
				
                <td><div><a href="mainquiz.php"><input type="submit" value="Login" class="btn"></a></div>
                <td><div><a href="studentlogin.php"><input type="reset" value="Reset" class="btn"></a></div>
				
            </tr>
        </table>
    </form>
		</div>
</body>
</html>
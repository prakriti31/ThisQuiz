<?php
 require 'dbconfig.php';
session_start();
	if(isset($_POST['sid'])){
$sid=$_POST['sid'];
$regno=$_POST['regno'];
 $name=$_POST['name'];
 $board=$_POST['board'];
 $city=$_POST['city'];
 $mail=$_POST['email'];
 $password=$_POST['password'];
 $query="INSERT INTO school(sid,regno,scname,board,city,mail, password)VALUES('$sid','$regno', '$name','$board','$city','$mail', '$password')";
 if(mysqli_query($con,$query))
 { 
 echo "Regitered successfully";
 header("Location: ./loginschool.php?login=success");
 }else{
  $e=mysqli_error($con);
  echo "Not"; 
 }
}
?>
<html>
<head>
	<title>Enroll your School</title>
    <link rel = "icon" href="./img/logo.JPG" type = "image/x-icon">
	<style type="text/css">
		#body_bg
{ 
background-image: url('img/bg1.jpg');
			 background-color: rgba(255, 255, 255, 0.486);
			background-blend-mode: overlay; 
}

#login-form{ 

background:#A9D0F5; 
border: 3 px solid #eeeee; 
padding:50px 50px;
 width:900px; 
 border-radius:5px; 
}
td{
	font-size: 30px;
	padding: 40px;
}
.btn{
	font-size: 30px;
	color: black;
	background-color: yellow;
}
.btn:hover
{
	color: yellow;
	background-color: black;
}

	</style>
</head>
<body>
	<body id="body_bg">
<div <div align="center">

<h1>Enroll your School</h1>
    <form id="login-form" method="post" action="schoolhome.php" >
        <table border="0.5">
            <tr>
                <td id="content"><label for="sid">School Id</label></td>
                <td><input type="text" name="sid" id="sid" style="height: 40px;width: 400px;"></td>
            </tr>
             <tr>
                <td id="content"><label for="name">School Name</label></td>
                <td><input type="text" name="name" id="name" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="board">School Board</label></td>
                <td><input type="text" name="board" id="board" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="regno">School Registration Number</label></td>
                <td><input type="text" name="regno" id="regno" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="city">City</label></td>
                <td><input type="text" name="city" id="city" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="email">School Mail</label></td>
                <td><input type="text" name="email" id="email" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" style="height: 40px;width: 400px;"></input></td>
            </tr>
			
            <tr>
				
                <td><div><a href="loginschool.php"><input type="submit" value="Enroll" class="btn"></a></div>
                <td><div><a href="schoolhome.php"><input type="reset" value="Reset" class="btn"></a></div>
				
            </tr>
        </table>
    </form>
		</div>
</body>
</html>
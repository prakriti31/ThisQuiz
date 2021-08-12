<?php
 require 'dbconfig.php';
session_start();
	if(isset($_POST['name'])){
$regno=$_SESSION['regno'];
 $name=$_POST['name'];
 $username=$_POST['username'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $query="INSERT INTO creatorlogin(regno,name,username,email, password)VALUES('$regno', '$name','$username','$email', '$password')";
 if(mysqli_query($con,$query))
 { 
 echo "Regitered successfully";
 header("Location: ./createquiz.php?login=success");
 }else{
  $e=mysqli_error($con);
  echo "Not"; 
 }
}
?>
<html>
<head>
	<title>Add new Quiz creators</title>
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

<h1>Add New Quiz Creator</h1>
    <form id="login-form" method="post" action="makecreator.php" >
        <table border="0.5">
            <tr>
                <td id="content"><label for="name">Name</label></td>
                <td><input type="text" name="name" id="name" style="height: 40px;width: 400px;"></td>
            </tr>
             <tr>
                <td id="content"><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="email">Email</label></td>
                <td><input type="text" name="email" id="email" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" style="height: 40px;width: 400px;"></input></td>
            </tr>
			
            <tr>
				
                <td><div><a href="schoolcreatorlogin.php"><input type="submit" value="Make Quiz creator" class="btn" name="create"></a></div>
                <td><input type="reset" value="Reset" class="btn">
				
            </tr>
        </table>
    </form>
		</div>
</body>
</html>
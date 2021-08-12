<?php
$con = mysqli_connect('localhost', 'root', '','SCOPE');

if (!$con){
    die("Database Selection Failed" . mysqli_error($con));
}
 
session_start();
	if(isset($_POST['regno'])){
		$regno=$_POST['regno'];
		$result = mysqli_query($con,"SELECT * FROM user WHERE regno='$regno'");
$num_rows = mysqli_num_rows($result);
if ($num_rows) {
 echo "Reg no already exist";; 
}else {
 $name=$_POST['name'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 if(mysqli_query($con,"INSERT INTO newuser(regno,name,email, password)VALUES('$regno', '$name','$email', '$password')")&&mysqli_query($con,"INSERT INTO user(regno, password)VALUES('$regno', '$password')"))
 { 
 echo "Regitered successfully";
 }else{
  $e=mysqli_error($con);
  echo "Not"; 
 }
}
}
?>
<html>
<head>
	<title>Independent Quiz Creator Sign Up | This Quiz</title>
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
 width:700px; 
 border-radius:5px; 
}
td{
	font-size: 30px;
	padding: 40px;
}
.btn{
	font-size: 30px;
	color: white;
	background-color: black;
}
.btn:hover
{
	color: black;
	background-color: white;
}

	</style>
</head>
<body>
	<body id="body_bg">
<div <div align="center">

<h1>Independent Quiz Creator Sign Up</h1>
    <form id="login-form" method="post" action="signupuser.php" >
        <table border="0.5">
            <tr>
                <td id="content"><label for="regno">Reg No</label></td>
                <td><input type="text" name="regno" id="regno" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="name">Name</label></td>
                <td><input type="text" name="name" id="name" style="height: 40px;width: 400px;"></td>
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
                <td id="content"><label for="cpass">Confirm Password</label></td>
                <td><input type="password" name="cpass" id="cpass" style="height: 40px;width: 400px;"></td>
            </tr>
			
            <tr>
				
                <td><a href="profile.php"><input type="submit" value="Create Login" class="btn" name="create"></a>
                <td><input type="reset" value="Reset" class="btn">
				
            </tr>
        </table>
    </form>
		</div>
</body>
</html>
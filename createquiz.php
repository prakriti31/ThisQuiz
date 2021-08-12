<?php
 require 'dbconfig.php';
session_start();
	if(isset($_POST['qno'])){
$qid=$_SESSION['qid'];
 $qno=$_POST['qno'];
 $question=$_POST['question'];
 $op1=$_POST['op1'];
 $op2=$_POST['op2'];
 $op3=$_POST['op3'];
 $op4=$_POST['op4'];
 $ans=$_POST['ans'];
 $query="INSERT INTO question(quizid,qno,question,op1,op2,op3,op4,ans)VALUES('$qid','$qno','$question','$op1','$op2','$op3','$op4','$ans')";
 if(mysqli_query($con,$query))
 { 
 echo "Question added";
 if(isset($_POST['add']))
     header("Location:./createquiz.php");
 if(isset($_POST['create']))
     header("Location:./aftercreate.php");
 }else{
  $e=mysqli_error($con);
  echo "Error detected"; 
 }
}
?>
<html>
<head>
	<title>Add Questions</title>
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

<h1>Add Questions</h1>
    <form id="login-form" method="post" action="createquiz.php" >
        <table border="0.5">
            <tr>
                <td id="content"><label for="name">Question Number</label></td>
                <td><input type="text" name="name" id="name" style="height: 40px;width: 400px;"></td>
            </tr>
             <tr>
                <td id="content"><label for="question">Question</label></td>
                <td><input type="text" name="question" id="question" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="op1">Op 1</label></td>
                <td><input type="text" name="op1" id="op1" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="op2">Op 2</label></td>
                <td><input type="text" name="op2" id="op2" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="op3">Op 1</label></td>
                <td><input type="text" name="op3" id="op3" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td id="content"><label for="op4">Op 4</label></td>
                <td><input type="text" name="op4" id="op4" style="height: 40px;width: 400px;"></td>
            </tr>
            <tr>
                <td><label for="ans">Answer code (op1/op2...)</label></td>
                <td><input type="text" name="ans" id="ans" style="height: 40px;width: 400px;"></input></td>
            </tr>
			
            <tr>
				
                <td><div><a href="addques.php"><input type="submit" id ="add" value="Add" class="btn" name="create"></a></div>
                <td><div><a href="aftercreate.php"><input type="submit" id="create" value="Create Quiz" class="btn"></a></div>
				
            </tr>
        </table>
    </form>
		</div>
</body>
</html>
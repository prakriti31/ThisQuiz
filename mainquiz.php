<!DOCTYPE>
<html>
<?php 
require 'dbconfig.php';
session_start(); 
?>
<head>
<title>Quiz</title>
<link rel = "icon" href="./img/logo.JPG" type = "image/x-icon">
<script type="text/javascript">
  <script>
// Set the date we're counting down to
var countDownDate = new Date("Oct 20, 2020 10:30:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</script>
<style>
body {
    background: url("bg1.jpg");
	background-size:100%;
	background-repeat: no-repeat;
	position: relative;
	background-attachment: fixed;
}
/* button */
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
 
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
 
.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
 
.button:hover span {
  padding-right: 25px;
}
 
.button:hover span:after {
  opacity: 1;
  right: 0;
}
.title{
	background-color: #ccc11e;
	font-size: 28px;
  padding: 20px;
	
}
.button3 {
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f4e542;
}
 
.button3:hover {
    background-color: #f4e542;
    color: Black;
}
p {
  float: right;
  font-size: 10px;
  margin-top: 0px;
}
</style>
</head>
<body><center>
<div class="title">This Quiz</div>
<?php 															
																if (isset($_POST['click']) || isset($_GET['start'])) {
																@$_SESSION['clicks'] += 1 ;
																$c = $_SESSION['clicks'];
                                $qid=$_SESSION['quizid'];
                                $rollno=$_SESSION['stuid'];
                                $name=$_SESSION['name'];
																if(isset($_POST['userans'])) { $userselected = $_POST['userans'];
																
																$fetchqry2 = "UPDATE question SET `userans`='$userselected' WHERE qno=$c-1"; 
																$result2 = mysqli_query($con,$fetchqry2);
																}
		  
																	
 																} else {
																	$_SESSION['clicks'] = 0;
																}
																
																//echo($_SESSION['clicks']);
																?>
<div class="bump"><br><form><?php if($_SESSION['clicks']==0){ ?> <button class="button" name="start" float="left"><span>START QUIZ</span></button> <?php } ?></form></div>
<form action="" method="post">  
<p id="demo"></p>				
<table>
  <?php if(isset($c)) { 
  $fetchqry = "SELECT * FROM question where quizid='$qid' and qno='$c'"; 
				$result=mysqli_query($con,$fetchqry);
				$num=mysqli_num_rows($result);
        @$_SESSION['num']==$num;
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC); }
		  ?>
<tr><td><h3><br><?php echo @$row['question'];?></h3></td></tr> <?php if($_SESSION['clicks']>0 && $_SESSION['clicks']<6){?>
  <tr><td><input required type="radio" name="userans" value="op1">&nbsp;<?php echo $row['op1']; ?></td></tr><br>
  <tr><td><input required type="radio" name="userans" value="op2">&nbsp;<?php echo $row['op2']; ?></td></tr><br>

  <tr><td><input required type="radio" name="userans" value="op3">&nbsp;<?php echo $row['op3']; ?></td></tr><br>
   
  <tr><td><input required type="radio" name="userans" value="op4">&nbsp;<?php echo $row['op4']; ?></td></tr><br>
  
  <tr><td><button class="button3" name="click" >Next</button></td></tr> <?php } ?>
  <form>
 <?php if($_SESSION['clicks']>5){ 
	$qry3 = "SELECT `ans`, `userans` FROM `question` where quizid='$qid';";
  $que=0;
	$result3 = mysqli_query($con,$qry3);
	$storeArray = Array();
	while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
     if($row3['ans']==$row3['userans']){
		 $que += 1 ;
	 }
}
@$_SESSION['score']=$que;
$marks=@$_SESSION['score'] * 2;
$qry4 = "INSERT INTO student (stuid,name,totalques,marks) VALUES ('$rollno',$name,'$que','$marks')";
$result4 = mysqli_query($con,$qry4);
 
 ?> 
 
 
 <h2>Result</h2>
 <span>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score'];  ?></span><br>
 <span>Your Score:&nbsp<?php echo $no*2; ?></span><br><br>
 <button class="button" name="end" float="left"><span><a href="index.php"> EXIT</span></button>
<?php } ?>
 
</center>
</body>
</html>
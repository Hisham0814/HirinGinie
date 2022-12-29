<?php
//include 'employeeprofile.php';
$user='root';
$pass='darknight@1601';
$servername = 'localhost';
$dbname='project';
$db=new mysqli($servername,$user,$pass,$dbname) or die ("unable to connect");

session_start();
$a=$_POST["prochoice"];
$b=$_POST["bid_amt"];
$c=$_POST["time"];
$f=$_SESSION['email_id'];
$e=$_SESSION['name'];

//$project_table = "CREATE TABLE if not exists bid(proj_id int, employee_email varchar(30),employee_name varchar(20),bid_amount int,submit_time datetime,employer_email varchar(30))";
//$db->query($project_table);
$d= "SELECT employer_email FROM project_details WHERE project_id='$a'";
$res = mysqli_query($db, $d);
$row = mysqli_fetch_assoc($res);
$z=$row['employer_email'];
$qwe = "INSERT INTO bid (proj_id, employee_email,employee_name,bid_amount,submit_time,employer_email) 
VALUES('$a','$f','$e','$b','$c','$z')";

if ($db->query($qwe)===TRUE)
{header('location: thanks2.html');}
else
{echo "Error connecting to DATABASE".$db->error;}
$db->close();
?>

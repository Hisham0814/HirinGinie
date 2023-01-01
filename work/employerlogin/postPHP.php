<?php
$user='root';
$pass='password';
$servername = 'localhost';
$dbname='project';

$db=new mysqli($servername,$user,$pass,$dbname) or die ("unable to connect");

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);

session_start();
$a=$_POST["proname"];
$b=$_POST["description"];
$c=$_POST["maxbid"];
$d=$_POST["timesubmit"];
$f=$_SESSION['email_id'];
$e=$_SESSION['name'];
$project_table = "CREATE TABLE if not exists project_details(project_id int,project_name varchar(20),project_description varchar(100),max_bid int,timesubmit datetime,employer_name varchar(20),employer_email varchar(30))";

$sql = "INSERT INTO project_details(project_name,project_description,max_bid,timesubmit,employer_name,employer_email)
VALUES('$a','$b','$c','$d','$e','$f')";

if ($db->query($sql)===TRUE)
{header('location: thanks2.html');}
else
{echo "Error connecting to DATABASE".$db->error;}
$db->close();
?>

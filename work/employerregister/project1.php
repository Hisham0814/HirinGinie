<?php
$user='root';
$pass='darknight@1601';
$servername = 'localhost';
$dbname='project';

$db=new mysqli($servername,$user,$pass,$dbname) or die ("unable to connect");

$employer = "CREATE DATABASE IF NOT EXISTS project";
if ($db->query($employer) === TRUE) {
  echo "Database created successfully with the name project";
} else {
  echo "Error creating database: " . $db->error;
}

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);

$a=$_POST["email"];
$b=$_POST["name"];
$c=$_POST["country"];
$d=$_POST["password"];
$employer_table = "CREATE TABLE if not exists employer_details(email_id varchar(30),name varchar(20),country varchar(20),password varchar(10))";
//$conn->exec($employee_table);
$db->query($employer_table);


$query="SELECT * FROM employer_details WHERE email_id='$a'";
$result = $db->query($query);

if ($result)
{
  if(mysqli_num_rows($result) > 0){
    header("location:alreadyexist.html");
  }
  else{
    $sql = "INSERT INTO employer_details
    VALUES('$a','$b','$c','$d')";
    if ($db->query($sql)===TRUE)
      {header('location: thanks.html');}
    else
      {echo "Error connecting to DATABASE".$db->error;}
  }
}
else
{
  echo 'Error: ' . mysqli_error($mysql);
}
$db->close();
?>

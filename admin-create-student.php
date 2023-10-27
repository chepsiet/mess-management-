<?php

include('session-admin.php');

if(!isset($login_session)){
header('Location: index.php'); 
}
require_once("connection.php");
if (isset($_POST['submit'])) {
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "db_name";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_errno) {
echo "<p>MySQL error no {$conn->connect_errno} : {$conn->connect_error}</p>";
exit();
}

# prepare data for insertion
$name = $_POST['name'];
$regNumber = $_POST['regNumber'];
$school = $_POST['school'];
$photo = $_POST['photo'];
$email = $_POST['email'];
$year_of_study = $_POST['year_of_study'];
$department = $_POST['department'];
$place_of_residence = $_POST['place_of_residence'];
$phone_number = $_POST['phone_number'];
$username = $_POST['username'];
$password = $_POST['password'];

// # insert data into mysql database
$sql = "INSERT  INTO `student` (`id`, `name`, `regNumber`, `school`,  `email`, `year_of_study`, `department`, `place_of_residence`, `phone_number`, `username`, `password`) 
VALUES (NULL, '{$name}', '{$regNumber}', '{$school}',  '{$email}', '{$year_of_study}', '{$department}', '{$place_of_residence}', '{$phone_number}', '{$username}', '{$password}')";
 
if ($conn->query($sql)) {
	header("location:admin-create-student.html");
} else {
echo "<p>MySQL error no {$conn->errno} : {$conn->error}</p>";
exit();
}
}

?> 
</body>
</html>
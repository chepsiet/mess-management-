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
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
exit();
}

# prepare data for insertion
$title = $_POST['title'];
$body = $_POST['body'];
$sql = "INSERT  INTO `posts` (`post-id`, `title`, `body`) 
VALUES (NULL, '{$title}', '{$body}')";
 
if ($conn->query($sql)) {
	header("location:admin-create-posts.html");

} else {
echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
exit();
}
}

?> 

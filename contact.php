<?php 
require("functions.php");
require_once("db-const.php");
?>

<?php
if (isset($_POST['submit'])) {
## connect mysql server
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
# check connection
if ($mysqli->connect_errno) {
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
exit();
}
## query database
# prepare data for insertion
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
 
# insert data into mysql database
$sql = "INSERT  INTO `contact` (`contact-id`, `name`, `email`,`phone`, `message`) 
VALUES (NULL, '{$name}', '{$email}', '{$phone}', '{$message}')";
 
if ($mysqli->query($sql)) {
redirect_to("index.php?msg=message sent successfully");
} else {
echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
exit();
}
}

?> 
</body>
</html>
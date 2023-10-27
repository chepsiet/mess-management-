
<?php

include('session-admin.php');

if(!isset($login_session)){
header('Location: index.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin home</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="admin-wraper" style="background-color: white">
		<div class="left-sidebar" style="background-color: #c87437;height: 700px;">
			<ul>
				 <li><a href="admin-home.php"> <img src="image/thumb.png" style="border-radius: 50%;" width="100" height="100"></a></li>
				<li><a href="admin-manage-students.php">Student</a></li>
			  <li><a href="admin-create-menu.php">Menu</a></li>
				   <li><a href="admin-create-cartegory.php">Cartegory</a></li>
				   <li><a href="order-report.php">Reports</a></li>
				<li><a href="admin-manage-posts.php">Posts</a></li>
				<li><a href="admin-manage-orders.php">Orders</a></li>
				<li><a href="admin-view-messages.php">Notifications</a></li>				
				<li><a href="admin-logout.php">Logout</a></li>


			</ul>
		</div>
		<div class="admin-content">
			<div class="button-group"> 
				<p style="float: right;"> welcome:<span style="font-size: 30px;">Mr.<?php echo $_SESSION['login_user1']; ?></span></p>
				<p href="#">
            <img src="image/topimg.png" height="70" width="70" alt="" style="border-radius: 50%"><span style="font-size: 2em; color: green">Mess Management System</span>
        </p>
			</div>
			<i class="page-title text-dark" style="font-size: 25px;"> Current Posts</i><span style="float: right;"><button style="color: red; font-weight: bold;"> <a href="admin-create-posts.html"> Add new posts</a></button></span>
			<div class="content" style="border: 1px solid lightgray;"> 
				<h5 class="page-title" style="margin-left: 1%;">Posts</h5>
					
								<?php
$dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "db_name";

  //Create Connection
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
if ($conn->connect_errno) {
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
exit();
}

$res=mysqli_query($conn,"SELECT* FROM posts ");

while ($row=mysqli_fetch_array($res)) {
     echo "<br>";  
    echo "<strong>"; echo $row['title'];  echo "</strong>";  echo "<br>"; 
	echo $row['body']; echo "<br>";   
	
	
}
 ?>


					</tbody>
				</table>
			</div>

		</div>
         
	</div>
</div>
</body>
</html>
<?php

include('session-admin.php');

if(!isset($login_session)){
header('Location: index.php'); 
}

if (isset($_POST['submit'])) {
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "db_name";
## connect mysql server
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
# check connection


$cartegory_name = $_POST['cartegory_name'];
$sql = "INSERT  INTO `cartegory` (`cartegory_id`,`cartegory_name`) 
VALUES (NULL, '{$cartegory_name}')";
 
if ($conn->query($sql)) {
	header("location:admin-create-cartegory.php");

} 
}
?> 





<!DOCTYPE html>
<html>
<head>
	<title>admin create menu page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	 <div class="admin-wraper" style="background-color: white">
    <div class="left-sidebar" style="background-color: #c87437;height: 700px;">
      <ul>
         <li><a href="admin-home.php"> <img src="image/thumb.png" style="border-radius: 50%;" width="100" height="100"></a></li>
         <?php
        require_once("connection.php");
         $numbers=mysqli_query($conn, "SELECT count(*) as total FROM student ");
         $data=mysqli_fetch_assoc($numbers);
         $total=$data['total'];
        ?>
        <li><a href="admin-manage-students.php">Student<span class="badge" style="background-color: black; float: right;"><?php echo $total;?></span></a></li>
        <li><a href="admin-create-menu.php">Menu</a></li>
           <li><a href="admin-create-cartegory.php">Cartegory</a></li>
           <li><a href="order-report.php">Reports</a></li>
        <li><a href="admin-manage-posts.php">Posts</a></li>
        <?php
        require_once("connection.php");
         $number=mysqli_query($conn, "SELECT count(*) as total FROM orders WHERE status=0 ");
         $data=mysqli_fetch_assoc($number);
         $total=$data['total'];
        ?>
        <li><a href="admin-manage-orders.php">Orders<span class="badge" style="background-color: black; float: right;"><?php echo $total;?></span></a></li>
         <?php
        require_once("connection.php");
         $numbers=mysqli_query($conn, "SELECT count(*) as total FROM contact ");
         $data=mysqli_fetch_assoc($numbers);
         $total=$data['total'];
        ?>
        <li><a href="admin-view-messages.php">Notifications<span class="badge" style="background-color: black; float: right;"><?php echo $total;?></span></a></li>        
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
			<i class="page-title text-dark" style="font-size: 25px;"> Add new food cartegory</i><span style="float: right;"><button style="color: red; font-weight: bold;"> <a href="admin-manage-cartegory.php"> Manage cartegory</a></button></span>
			<div class="content" style="border: 1px solid lightgray;"> 
				
				<form action="admin-create-cartegory.php" method="post" style="text-align: left;">
					<div class="col-md-8 col-lg-5  col-sm-10 col-xs-12 ">
	                 <div class="form-group">
	        	     <label class="control-label" ><b><i>Cartegory name<b><i><span style="color:red;">*</span></label>
					 <input type="text" name="cartegory_name" class="form-control" placeholder="enter cartegory name" required="">
					 </div>
                     </div><br><br>
					
						<button type="submit" class="btn  btn-lg btn-success" name="submit" style=" width: 150px; margin-left: 3%;">SAVE</button>
					</div>


				</form>
			</div>

		</div>
         
	</div>
</div>
</body>
</html>
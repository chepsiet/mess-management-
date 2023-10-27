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

$item_name = $_POST['item_name'];
$cartegory_name = $_POST['cartegory_name'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];
$total_price=$unit_price*$quantity;

$filepath =$_FILES["item_image"]["name"];
move_uploaded_file($_FILES["item_image"]["tmp_name"], $filepath);
$sql = "INSERT  INTO `menu` (`menu_id`,`item_name`, `cartegory_name`, `item_image`, `quantity`, `unit_price`, `total_price`) 
VALUES (NULL, '{$item_name}', '{$cartegory_name}', '{$filepath}', '{$quantity}', '{$unit_price}', '{$total_price}')";
if ($conn->query($sql)) {
	header("location:admin-create-menu.php");
} else {
echo "<p>MySQL error no {$conn->errno} : {$conn->error}</p>";
exit();
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
			<i class="page-title text-dark" style="font-size: 25px;"> Add food</i><span style="float: right;"><button style="color: red; font-weight: bold;"> <a href="admin-manage-menu.php"> Manage food</a></button></span>
			<div class="content col-lg-12" style="border: 1px solid lightgray;"> 
				<div class="row">

				<form action="admin-create-menu.php" method="post"  class="horizontal-form" enctype="multipart/form-data" style="padding: 20px;">
					 <div class="col-md-8 col-lg-8  col-sm-10 col-xs-12 ">
	                 <div class="form-group">

	        	     <label class="control-label" ><b><i>Name<b><i><span style="color:red;">*</span></label>
					 <input type="text" name="item_name" class="form-control" placeholder="enter item name" required="">
					 </div>
                     </div>

			         <div class="col-md-8 col-lg-8  col-sm-10 col-xs-12 ">
	                 <div class="form-group">
	            	 <label class="control-label" ><b><i>photo</b></i><span>*</span></label>
					 <input type="file" name="item_image" class="form-control" required="">
					 </div>
                     </div>


                     <div class="col-md-8 col-lg-8  col-sm-10 col-xs-12 ">
	                 <div class="form-group">
	             	 <label class="control-label" ><b><i>quantity</b></i><span style="color:red;">*</span></label>
					 <input type="number" min="1" max="2000" name="quantity" class="form-control" style="background-color: white;border: 0.2px solid;" required="">
					 </div>
                     </div>

					 <div class="col-md-8 col-lg-8  col-sm-10 col-xs-12 ">
	                  <div class="form-group">
	             	 <label class="control-label" ><b><i>unit price</b></i><span style="color:red;">*</span></label>
					 <input type="text" name="unit_price" class="form-control" style="background-color: white;border: 0.2px solid;" required="" placeholder="Ksh.">
					 </div>
                     </div>
				 <?php
	        $mysqli =NEW mysqli ('localhost', 'root', '', 'db_name');
	        $resultSet =$mysqli ->query ("SELECT cartegory_name FROM cartegory");
	        ?>
               
	        <div class="col-md-8 col-lg-8  col-sm-10 col-xs-12 ">
	        <div class="form-group">
	        <label class="control-label" ><b><i>cartegory<b><i><span style="color:red;">*</span></label>
	        <select  class='form-control' name="cartegory_name" id="select_cartegory" required>
		    <option value='-1'selected disabled>select cartegory</option> 
		    <?php
		     while($rows= $resultSet->fetch_assoc())
		    {
			$cartegory =$rows['cartegory_name'];
			echo "<option  class='form-control'value ='$cartegory' required>$cartegory</option>";
	     	}
			?>
			</select> 
            </div>
	     	</div>
	     	<div>
	     	</div>

	        <div style="float: left; margin-left: 13px;">
			<button type="submit" class="btn  btn-lg btn-success" name="submit" >Add food</button>
			</div>
		    </div>

				</form>
			</div>
			</div>

		</div>
         
	</div>
</div>
</body>
</html>

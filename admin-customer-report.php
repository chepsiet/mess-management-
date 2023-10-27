<?php
include('session-admin.php');

if(!isset($login_session)){
header('Location: index.php'); // Redirecting To Home Page
}

?>

<?php 
require_once("connection.php");
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
			<i class="page-title text-dark" style="font-size: 25px;"> Customer Report</i><span style="float: right;"><button style="color: red; font-weight: bold;" name="submit"> <a href="order-report.php" name="submit"> Other reports</a></button></span>
			


				<table class="table">

    <thead style="background: lightgray;">
      <tr>
        <th>ORDER ID</th>
        <th>CUTOMER NAME</th>
        <th>EMAIL ADDRESS</th>
        <th>DATE</th>
        <th>TOTAL</th>
        
      </tr>
    </thead>
    <tbody>
    	<?php 
    	$res=mysqli_query($conn,"SELECT* FROM orders ");
        while ($row=mysqli_fetch_array($res)) { 
        	?>
      <tr style="border: none;">
        <td ><?php echo $row['id']; ?></td>
        <td ><?php echo $row['name']; ?></td>
        <td ><?php echo $row['email']; ?></td>
        <td ><?php echo $row['date']; ?></td>
        <td ><?php echo $row['total']; ?></td>
      </tr>

        <?php  }?>
    </tbody>
  </table>
    </div>
  </div>
</div>

				
				
				
			</div>

		</div>
         
	</div>
</div>

</body>
</html>
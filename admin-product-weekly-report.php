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
      <i class="page-title text-dark" style="font-size: 25px;"> Product report(weekly)</i><span style="float: right;"><button style="color: red; font-weight: bold;"> <a href="order-report.php"> Other reports</a></button></span>
      <div class="content" style="border: 1px solid lightgray;"> 
      
        <a href="admin-product-report.php" style="font-size: 20px; color: lightblue;">All/</a>
        <a href="admin-product-daily-report.php" style="font-size: 20px; color: lightblue;">daily<span style="color: black;">/</span></a>
        <a href="admin-product-weekly-report.php" style="font-size: 20px; color: black;">weekly<span style="color: black;">/</span></a>
        <a href="admin-product-monthly-report.php" style="font-size: 20px; color: lightblue;">monthly</a>
        <table class="table">
    <thead style="background: lightgray;">
      <tr>
        <th>MENU ID</th>
        <th>PRODUCT NAME</th>
        <th>QUANTITY</th>
        <th>ITEM CATEGORY</th>
        <th>UNIT PRICE</th>
        <th>TOTAL</th>
        <th>DATE</th>
        <th>ACTION</th>
        
      </tr>
    </thead>
    <tbody>
    	<?php 
      //date-sub is used to acquire date interval interms of hrs sec min day week etc.
      $date=date_create("now");
      $now=date_format($date, "Y-m-d");
      date_sub($date,date_interval_create_from_date_string("7 days"));
      $weekly=date_format($date, "Y-m-d");

      $res=mysqli_query($conn,"SELECT * FROM menu WHERE date BETWEEN '$weekly' AND '$now' " );
        while ($row=mysqli_fetch_array($res)) { 
          
          ?>
      <tr style="border: none;">
        <td ><?php echo $row['menu_id']; ?></td>
        <td ><?php echo $row['item_name']; ?></td>
        <td ><?php echo $row['quantity']; ?></td>
        <td ><?php echo $row['cartegory_name']; ?></td>
        <td ><?php echo $row['unit_price']; ?></td>
        <td ><?php echo $row['total_price']; ?></td>
        <td ><?php echo $row['date']; ?></td>
        <td ><a href="#">Details</a></td>
      </tr>

    <?php } ?>

        <?php  

//calculating the order-column total to net-total of the daily orders
$req = "SELECT SUM(total_price) AS value_sum FROM menu WHERE date BETWEEN '$weekly' AND '$now'";
$ses_sql = mysqli_query($conn, $req);
$row = mysqli_fetch_assoc($ses_sql);
$sum = $row['value_sum'];  
 ?>
<tr style="background-color: lightgray; margin-bottom: 1px;width: 100%;">
<th colspan="5">Total Cost:</th>
<th >Ksh.<?php echo $sum; ?></th>
<th colspan="2">&nbsp;</th>
</tr>
<tr style="background-color: lightgray; margin-bottom: 1px;width: 100%;">
  <?php

  //calculating mess daily expenses;
$req = "SELECT SUM(quantity) AS value_quantity FROM menu WHERE date BETWEEN '$weekly' AND '$now'";
$ses_sql = mysqli_query($conn, $req);
$row = mysqli_fetch_assoc($ses_sql);
$quantity = $row['value_quantity'];


  ?>
<th colspan="5">Total Food available:</th>
<th ><?php echo $quantity; ?> pcs</th>
<th colspan="2">&nbsp;</th>
</tr>

        
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
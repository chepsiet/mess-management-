i<?php
include('session-admin.php');
require_once('tcpdf/tcpdf.php');  
ob_start();

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
        <h2 class="page-title">Reports</h2>
         <a href="order-report.php" class="btn-big "><button type="submit" class="btn  btn-sm btn-success " name="submit" style="background-color: #white;" >Order Report</button></a>
               <a href="admin-product-report.php" class="btn-big"><button type="submit" class="btn  btn-sm btn-success" name="submit" style="background-color: #d05056;" >Product report</button></a><a href="admin-customer-report.php" class="btn-big"><button type="submit" class="btn  btn-sm btn-success" name="submit" style="background-color: #d05056;" >Customer Report</button></a>
<form class="form-inline" method="POST" action="search.php" style="float: right; width: 300px;">
        <div class="input-group col-md-12">

          <input type="date" class="form-control" name="date" placeholder="dd-mm-yyyy" required="required"/>
          <span class="input-group-btn">
            <button class="btn btn-secondary" name="search"><span class="glyphicon glyphicon-search"></span>search</button>
          </span>
        </div>
      </form>

               <br><br>

             
      </div>


      <div class="content" style="border: 1px solid lightgray;"> 
        <i style="font-size: 22px;">Order Report(daily)</i><br>
        <a href="order-report.php" style="font-size: 20px; color: lightblue;">All/</a>
        <a href="admin-report-daily.php" style="font-size: 20px; color: black;">daily<span style="color: black">/</span></a>
        <a href="admin-report-weekly.php" style="font-size: 20px; color: lightblue;">weekly<span style="color: black">/</span></a>
        <a href="admin-report-monthly.php" style="font-size: 20px; color: lightblue;">monthly </a>
				<form method="post" action="order-report.php" style="float: right;">
				<button type="submit" class="btn  btn-sm btn-success" name="daily" style="background-color: #d05056;margin-left: 400px;" >generate pdf</button></form>
				<table class="table">
    <thead style="background: lightgray;">
      <tr>
        <th>ORDER ID</th>
        <th>CUTOMER NAME</th>
        <th>EMAIL ADDRESS</th>
        <th>DATE</th>
        <th>TOTAL</th>
        <th>ACTION</th>
        
      </tr>
       
    </thead>
    <tbody>
    	<?php 
      //date-sub is used to acquire date interval interms of hrs sec min day week etc.
      $date=date_create("now");
      $now=date_format($date, "Y-m-d");
      date_sub($date,date_interval_create_from_date_string("1 days"));
      $weekly=date_format($date, "Y-m-d");

      $res=mysqli_query($conn,"SELECT * FROM orders WHERE date BETWEEN '$weekly' AND '$now' " );
        while ($row=mysqli_fetch_array($res)) { 
         
          ?>
      <tr style="border: none;">
        <td ><?php echo $row['id']; ?></td>
        <td ><?php echo $row['name']; ?></td>
        <td ><?php echo $row['email']; ?></td>
        <td ><?php echo $row['date']; ?></td>
        <td ><?php echo $row['total']; ?></td>
        <td ><a href="#">Details</a></td>
      </tr>
    <?php } ?>
 <?php

//calculating the order-column total to net-total of the daily orders
$req = "SELECT SUM(total) AS value_sum FROM orders WHERE date BETWEEN '$weekly' AND '$now'";
$ses_sql = mysqli_query($conn, $req);
$row = mysqli_fetch_assoc($ses_sql);
$sum = $row['value_sum'];  
 ?>
<tr style="background-color: lightgray; margin-bottom: 1px;width: 100%;">
<th colspan="4">Gross Total:</th>
<th >Ksh.<?php echo $sum; ?></th>
<th >&nbsp;</th>
</tr>
<tr style="background-color: lightgray; margin-bottom: 1px;width: 100%;">
  <?php

  //calculating mess daily expenses;
$req = "SELECT SUM(total_price) AS value_sum FROM menu WHERE date BETWEEN '$weekly' AND '$now'";
$ses_sql = mysqli_query($conn, $req);
$row = mysqli_fetch_assoc($ses_sql);
$expenses = $row['value_sum'];
$net_total=$sum-$expenses;

  ?>
<th colspan="4">Expenses:</th>
<th >Ksh.<?php echo $expenses; ?></th>
<th >&nbsp;</th>
</tr>
<tr style="background-color: lightgray; margin-bottom: 1px;width: 100%;">
<th colspan="4">Net Total:</th>
<th >Ksh.<?php echo $net_total; ?></th>
<th ><?php if ($net_total<=0) {
  echo "<img src='image/red.png' width=50 height=20>";
}else{echo "<img src='image/green.png' width=50 height=20>";} ?></th>
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
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
	<title>order report</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <style type="text/css">
    
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button[type=submit] {
  background-color: #2d833f;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}
.admin-wraper .left-sidebar ul li a:hover{
  background: gray;
  border-left:4px solid green;
  
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 70px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #c87437;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
  color: #f2f5ec;
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: ;
  cursor: pointer;
}


/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.desc {
  padding: 15px;
  text-align: center;
}
#clear:hover{
width: 100px;
}

tr:nth-child(even){background-color: #f2f2f2}
  </style>

  <title>admin home</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
      <i class="page-title text-dark" style="font-size: 25px;"> Recent orders</i><span style="float: right;"><button style="color: red; font-weight: bold;"> <a href="admin-create-menu.php"> Add more food </a></button></span>
      <a class="btn" href="clear.php? id=<?php echo $row['id'];?>" style="position: fixed; bottom: 66.2%; left: 92%; background-color: black; color: red;" id="clear" >
        Clear Orders
      </a>
      <form class="form-inline" method="POST" action="search.php" style="float: right; width: 300px;">
        <div class="input-group col-md-12">

          <input type="date" class="form-control" name="date" placeholder="dd-mm-yyyy" required="required"/>
          <span class="input-group-btn">
            <button class="btn btn-secondary" name="search"><span class="glyphicon glyphicon-search"></span>search</button>
          </span>
        </div>
      </form><br>
      <div class="content" style="border: 1px solid lightgray;"> 
				<table class="table">
    <thead style="background: lightgray;">
      <tr>
        <th>Status</th>
       
        <th>Order_id</th>
        <th>Customer</th>
        <th>Email</th>
        <th>Date</th>
        <th>Total</th>
        <th colspan="2">ACTION</th>
        
      </tr>
    </thead>
    <tbody>
    	<?php 
    	$tm=time();
    	$today="".date('m/d/y',$tm)."";
      
    	$res=mysqli_query($conn,"SELECT * FROM orders " );
        while ($row=mysqli_fetch_array($res)) { 
           $iid=$row["id"];
           $order_id=$row['id'];

        	
        	?>
          <form method="POST" action="admin-manage-orders.php?action=confirm&id=<?php echo $row["id"]; ?>">

      <tr style="border: none;">
        <td> <?php if ($row['status']==1) {
         echo "<img src='image/black.png' width=10 height=10>";
        }else{
         echo "<img src='image/green.png' width=10 height=10>";
        } ?></td>
       
        <td ><?php echo $row['id']; ?></td>
        <td ><?php echo $row['name']; ?></td>
        <td ><?php echo $row['email']; ?></td>
        <td ><?php echo $row['date']; ?></td>
        <td ><?php echo $row['total']; ?></td>
        <td ><input id="submit" type="submit" name="confirm" class="btn  btn-sm btn-success " value="confirm" />
        </td>
        </form>
        <td>
          
        </td>
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
<?php 
if(isset($_POST['confirm'])) //
{
$iid=$_GET["id"];
$newstaus=1;
mysqli_query($conn,"update orders set status='$newstaus' where  id=$iid")or die(" incorrect query");
}
 ?>


</body>
</html>
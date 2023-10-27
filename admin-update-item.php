<?php

include('session-admin.php');
?>
<?php

if(!isset($login_session)){
header('Location: index.php'); 
}

require_once("connection.php");
?>

<?php
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
}
?>
<?php
$id=$_REQUEST['id'];

$result=mysqli_query($conn,"select menu_id, item_name, cartegory_name,item_image,quantity,unit_price,total_price from menu where menu_id='$id'")or die ("query 1 incorrect.......");

list($menu_id,$item_name,$cartegory_name,$item_image,$quantity,$unit_price,$total_price)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$item_name = $_POST['item_name'];
$cartegory_name = $_POST['cartegory_name'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];
$total_price=$unit_price*$quantity;

$filepath =$_FILES["item_image"]["name"];
move_uploaded_file($_FILES["item_image"]["tmp_name"], $filepath);

mysqli_query($conn,"update menu set item_name='$item_name',cartegory_name='$cartegory_name',item_image='$filepath',quantity='$quantity',unit_price='$unit_price',total_price='$total_price' where menu_id='$menu_id'")or die("Query 2 is inncorrect..........");

header("location: admin-manage-menu.php");
mysqli_close($conn);
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
        <p style="float: right;"> <i style="color: black;font-size: 20px;">welcome:</i><span style="font-size: 30px;">Mr.<?php echo $_SESSION['login_user1']; ?></span></p><br>
        <p href="#">
            <img src="image/topimg.png" height="70" width="70" alt="" style="border-radius: 50%"><span style="font-size: 2em; color: green">Mess Management System</span>

        </p>
        <h3><i>Update menu item</i></h3>

    </div>
 <div class="content" style="border: 1px solid lightgray;"> 
        <form action="admin-update-item.php" name="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="menu_id" value="<?php echo $menu_id;?>" />
                    <div class="col-md-8 col-lg-5 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Item name<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="item_name" id="item_name" required value="<?php echo $item_name; ?>">
		           </div>
		           </div>

                    <div class="col-md-8 col-lg-5 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Cartegory Name<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="cartegory_name" id="cartegory_name" required value="<?php echo $cartegory_name; ?>">
		            </div>
		            </div>

                    <div class="col-md-8 col-lg-5 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Photo<span style="color:red;">*</span></label>
			        <input class="form-control"type="file" name="item_image" id="item_image" required value="<?php echo $item_image; ?>">
		           </div>
		           </div>


                    <div class="col-md-8 col-lg-5 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Quantity<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="quantity" id="quantity" required value="<?php echo $quantity; ?>">
		            </div>
   		            </div>

   		            <div class="col-md-8 col-lg-5 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Unit price<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="unit_price" id="unit_price" required value="<?php echo $unit_price; ?>">
		           </div>
		           </div>

		          
		           <div class="col-sm-7">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save">Update</button></div>
        </form>

			</div>

		</div>
         
	</div>
</div>
</body>
</html>
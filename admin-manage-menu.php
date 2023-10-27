
<?php

include('session-admin.php');

if(!isset($login_session)){
header('Location: index.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		img{
			height: 50px;
			width: 50px;
		}
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
			<i class="page-title text-dark" style="font-size: 25px;"> Available food</i><span style="float: right;"><button style="color: red; font-weight: bold;"> <a href="admin-create-menu.php"> Add more food</a></button></span>
			<div class="content" style="border: 1px solid lightgray;"> 
					
						

					
				<table>
					
					<thead>
						<th>S/no.</th>
						<th>item name</th>
						<th>cartegory name</th>
						<th>item image</th>
						<th>quantity</th>
						<th>unit price</th>
						<th>total price</th>
						<th colspan="2">Action</th>
						
						
					</thead>
	<tbody>
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

$res=mysqli_query($conn,"SELECT* FROM menu ");

while ($row=mysqli_fetch_array($res)) {
	echo "<tr>";
	echo "<td>"; echo $row['item_name']; echo "</td>";
	echo "<td>"; echo $row['cartegory_name']; echo "</td>";
	echo "<td>"; echo "<img src=".''.$row['item_image']." />"; echo "</td>";
	echo "<td>"; echo $row['quantity']; echo "</td>";
	echo "<td>"; echo $row['unit_price']; echo "</td>";
	echo "<td>"; echo $row['total_price']; echo "</td>";
	echo "<td>"; ?>  <a href="admin-update-item.php? id=<?php echo $row['menu_id'];?>" class="btn-big"><button type="submit" class="btn  btn-sm btn-success" name="submit"  >edit</button></a> <?php echo "</td>";
echo "<td>"; ?> <a href="admin-delete-menu_item.php? id=<?php echo $row['menu_id'];?>" class="btn-big"><button type="submit" class="btn  btn-sm btn-denger" name="submit" style="background-color: #d05056; color: white;"  >delete</button></a> <?php echo "</td>";
echo "</tr>";
	
}
 ?>

 <!-- js that adds numbered table-column S/no  and can  resets the numbering when if a row is deletedr-->
 <script type="text/javascript">
      var tables = document.getElementsByTagName('tbody');
      var tbody =tables[tables.length-1];
      var rows = tbody.rows;
      for (var i = 0; i < rows.length; i++) {
        td= document.createElement('td');
        td.appendChild(document.createTextNode(i+1));
        rows[i].insertBefore(td,rows[i].firstChild);
      }
    </script>

			</div>

		</div>
         
	</div>
</div>
</body>
</html>
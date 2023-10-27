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
			<div class="content">
				<i class="page-title" style="font-size: 25px;"> Student List</i><br>
				<table class="table table-bordered">
					
					<thead class=" text-dark"> 
						<th>S/no</th>
						<th>Name</th>
						<th>Reg. No.</th>
						<th>School</th>
						
						<th>Email</th>
			
						<th>Department</th>
						<th>&nbsp;</th>
						
						
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

$res=mysqli_query($conn,"SELECT* FROM student ");

while ($row=mysqli_fetch_array($res)) {
	echo "<tr>";
	echo "<td>"; echo $row['name']; echo "</td>";
	echo "<td>"; echo $row['regNumber']; echo "</td>";
	echo "<td>"; echo $row['school']; echo "</td>";
	
	echo "<td>"; echo $row['email']; echo "</td>";
	
	echo "<td>"; echo $row['department']; echo "</td>";
		echo '<td><a href="admin-update-student.php? id='.$row["id"].'">Details</a></td>';

echo "</tr>";
	
}
 ?>

				</table>


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
    </script><br>
    <div class="container-fluid">
  
    <div class="col" ><i style="font-size: 25px;">Product List</i> <br><br>
      <table class="table table-bordered" style="width: 100%;">
    <thead class=" text-dark">
						<th>S/no</th>
						<th>Item Name</th>
						
						<th>Quantity</th>
						
					</thead>
	                <tbody>
  <?php
$res=mysqli_query($conn,"SELECT* FROM menu ");
while ($row=mysqli_fetch_array($res)) {
	echo "<tr>";
	echo "<td>"; echo $row['item_name']; echo "</td>";
	echo "<td>"; echo $row['quantity']; echo "</td>";
echo "</tr>";
	
}
 ?>	

</table>

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
         
	</div>
</div>

</body>
</html>
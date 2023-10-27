<?php

include('session-admin.php');

if(!isset($login_session)){
header('Location: index.php'); 
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
			<div class="content" style="border: 1px solid lightgray;"> 
             <i style="font-size: 20px; font-weight: bold;">New messages</i><br><br>
				<table >
					<thead>
						<tr>
							<th>s/no</th>
							<th>Name</th>
							<th>Email Address</th>
							<th>Phone</th>
							<th>Message</th>
							<th>date</th>
						</tr>
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

$res=mysqli_query($conn,"SELECT* FROM contact ");

while ($row=mysqli_fetch_array($res)) { 
	echo "<tr>";   
	echo "<td>";   echo $row['name']; echo "</td>";   
	echo "<td>";   echo $row['email']; echo "</td>";
	echo "<td>";   echo $row['phone']; echo "</td>";
	echo "<td>";   echo $row['message']; echo "</td>";
	echo "<td>";   echo $row['date']; echo "</td>";
	echo "<tr>";   
	
}
 ?>


					</tbody>
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
				</table>
				 
			</div>

		</div>
         
	</div>
</div>
</body>
</html>
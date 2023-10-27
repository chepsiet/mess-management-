<?php
	$conn = mysqli_connect('localhost', 'root', '', 'db_name') or die(mysqli_error());
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>


<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['date'];
?>

<button class="btn-primary btn-sm" style="position: fixed;margin-left: 4px;margin-top: 1px;"><a href="order-report.php" style="color: white; text-decoration: none;">Back</a></button>
<br>
	<hr style="border-top:2px dotted #ccc;"/>
		<p  ><i>Search results of orders:&nbsp;&nbsp;&nbsp;</i><span style="color: blue;">Date&nbsp;&nbsp;<?php echo $keyword?></span>
	</p>
	</div>

		<div style="height: 10px;">
			
		</div>

	
</div>
               <table class="table">
               	
				<tr>
					<th>Order id</th>
					<th>Customer name</th>
					<th>Email Address</th>
					<th>Date of Order</th>
				</tr>
			
	<?php
		require 'connection.php';
		$query = mysqli_query($conn, "SELECT * FROM `orders` WHERE `date` LIKE '%$keyword%' ORDER BY `date`") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
	?>
	
			<tr>
				<td><?php echo $fetch['id']?></td>
				<td><?php echo $fetch['name']?></td>
				<td><?php echo $fetch['email']?></td>
				<td><?php echo $fetch['date']?></td>
				<td><a href="get_order_details.php?id=<?php echo $fetch['id']?>" class="btn btn-sm btn-success">Details</a></td>

			</tr>
		
		
		
		
	
	
	<?php
		}
	?>
	</table>
</div>
<?php
	}
?>

</body>
</html>

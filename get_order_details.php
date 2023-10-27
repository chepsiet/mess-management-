<!DOCTYPE html>
<html lang="en">
	<head>
		
	</head>
<body>
	           <table>
		        	<tr>
		        		<th>S./No.</th>
		        		<th>Item name</th>
		        		<th>Quantity</th>
		        		<th> Unit Price</th>
		        		<th> Total</th>
		        	</tr>
	
		<?php
			require 'conn.php';
			if(ISSET($_REQUEST['id'])){
				$query = mysqli_query($conn, "SELECT * FROM `order_details` WHERE `order_id` = '$_REQUEST[id]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
		?>
		        
		        	<tr>
		        		<td><?php echo $fetch['id']?></td>
		        		<td><?php echo $fetch['id']?></td>
		        		<td><?php echo $fetch['quantity']?></td>
		        		<td><?php echo $fetch['price']?></td>
		        		<td><?php echo $fetch['price']*$fetch['quantity'] ?></td>
		        	</tr>
		        
				
		<?php
			}
		?>
		</table>
	</div>
</body>
</html>
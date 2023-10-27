<?php 
$customer_id= $_POST['customer_id'];
$name= $_POST['name'];
$email= $_POST['email'];
$total= $_POST['total'];
$key= $_POST['item_id'];
$value= $_POST['quantity'];
$price= $_POST['price']; 
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="db_name";

$conn =new mysqli ( $host , $dbusername , $dbpassword , $dbname);

if(mysqli_connect_error()){

	die('Connect Error('.mysqli_connect_errno().')');
	mysqli_connect_error();
}

else{

	$sql = "INSERT  INTO `orders` (`id`,`customer_id`, `name`, `email`, `total`, `status`) 
VALUES (NULL,'{$customer_id}', '{$name}', '{$email}', '{$total}', 0)";


if ($conn->query($sql) === TRUE){
 $order_id =  $conn->insert_id;
$sql = "INSERT  INTO `order_details` (`order_id`,`item_id`, `quantity`, `price`) 
VALUES ('{$order_id}', '{$key}', '{$value}', '{$price}')";}




if(isset($_POST['submit'])) 
{
$amount=$_POST['amount'];
mysqli_query($conn,"update account set amount='$amount' where  student_id=$customer_id")or die(" incorrect query");
}



if($conn->query($sql)){
	
	header("location: order-success-test.php");
}
else{
	echo "Error:".$sql."<br>".$conn->error;
}
$conn->close();
}

 ?>

 
  
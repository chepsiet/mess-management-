<?php

include('session-student.php');

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">        
    <link rel="stylesheet" href="css/customstyles.css">



<title>view menu items</title>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />
<style type="text/css">
     body{
        background-color: #e2aa22;
    }
   
        .container-block{
            height: 100px;
            width: 96%;
            margin-left: 2%;

        }
        .navbar{
            background-color: #c87437;
            border-radius: 24px 24px 0 0;
            margin:10px 0px 20px 0;
            
        }
        .nav-item #getstarted{
            border-radius: 15px;
         font-size: 1.5em;
         padding: 1px;
         background-color:blue;
         color: white;

        }
        .nav-item #getstarted:hover{


        }
        .nav-link {
            color: #f2f5ec;
            font-weight: bold;
            text-decoration: none;
            font-style: oblique;
            font-size: 20px;
        }
        .nav-item .nav-link:hover{
           background-color: lightgray;
           border-radius: 10px;
           
        }
        .nav-item .nav-link{
            border-radius: 10px;
            margin-right: 5px;
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

</style>

</head>
<body >

	 <div class="container-block" id="hero">
     <header >
    <nav class="navbar navbar-expand-lg navbar-dark mt-0 pt-4 pb-4 " >
        <a class="navbar-brand" href="#">
            <img src="image/topimg.png" height="60" width="60" alt="" style="border-radius: 50%">Mess Management System
        </a>
        <a class="navbar-brand" href="#"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a  class="nav-link" href="student-home.php"> Home</a>
                    </li>
                     </li>
                   
                    <li class="nav-item">
                        <a  class="nav-link " href="confirm-order.php"> myCart</a>
                    </li>
                     <li class="nav-item">
                        <a  class="nav-link active" href="viewmenu.php">Gallery</a>
                    </li>
                     <li class="nav-item dropdown">
                        <p  class="nav-link " id="navbarDropdown" data-toggle="dropdown" style="color: black">
                          
                          <?php
         
 $sql = "SELECT student.username,account.student_id,account.amount FROM account INNER JOIN student ON student.id=account.student_id WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$balance = $row['amount'];
echo "$balance";
?>/=
                        </p>
                        
                    </li>
                     </li>
                      <li class="nav-item dropdown">
                        <p  class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" style="background-color: #2d833f;"><?php echo $login_session;  ?></p>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="student-order.php">order</a>
                            <p class="dropdown-item" href="student-home.php" onclick="document.getElementById('id02').style.display='block'">Profile</p>
                          <a class="dropdown-item" href="student-logout.php">Logout</a>
                            
                        </div>
                    </li>
                   
                </ul>
            </div>                                                                   
            
        </nav>
</header>



	<?php 

$connect = mysqli_connect("localhost", "root", "", "db_name");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;

      
      //update the value of quantity when an item is added to cart
        $item_id=$_GET['id'];
        $query = "SELECT * FROM menu WHERE menu_id=$item_id";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result)==1)
        {
          while($row = mysqli_fetch_array($result))
          {$rowqty= $row["quantity"]; $untit_pris=$row["unit_price"];}}
        
          $value=$_POST['quantity'];
          $set_qty=$rowqty- $value;
          $new_total=$set_qty*$untit_pris;
          mysqli_query($connect,"update menu set quantity='$set_qty',total_price='$new_total' where  menu_id=$item_id")or die(" incorrect query");
			
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';

		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}


?>



<!-- ========================= SECTION CONTENT ========================= -->
<!-- sect-heading -->

 


<header class="section-heading">
	<h3 class="section-title">Foods available</h3>
</header>

<div class="row">
	<?php
	$conn = mysqli_connect("localhost", "root", "", "db_name");
    $res=mysqli_query($conn,"SELECT* FROM menu ");
    while ($row=mysqli_fetch_array($res)) {
    	$rowqty= $row["quantity"];
	?>
	<div class="col-md-3">
		<form method="post" action="viewmenu.php?action=add&id=<?php echo $row["menu_id"]; ?>">
		<div href="#" class="card card-product-grid" style="background-color: initial;">
			<a href="#" class="img-wrap"><?php echo "<img src=".''.$row['item_image']." />"; ?> </a>
			<figcaption class="info-wrap">
				<div class="price mt-1">Available: <?php echo $row['quantity']; ?></div>
				<div class="price mt-1">Name:<?php echo $row['item_name']; ?></div>
				<div class="price mt-1">Cartegory:<?php echo $row['cartegory_name']; ?></div>
				<div class="price mt-1">Ksh.<?php echo $row['unit_price']; ?></div> <!-- price-wrap.// -->
				<div class="price mt-1">Qty:<span><input type="number" name="quantity" min="1" max="20" step="1" style="width: 50px; height: 20px; " required placeholder="1"></span></div><br>
				<input type="hidden" name="hidden_name" value="<?php echo $row["item_name"]; ?>" />
				<input type="hidden" name="hidden_price" value="<?php echo $row["unit_price"]; ?>" />

				<a href="#" class="title"><input type="submit" name="add_to_cart" <?php
                        
						 if (($rowqty <1) ) {echo 'disabled'; }?> value="Add to cart" class="btn btn-success" style="width: 150px; background-color: #2d833f;"></a>
			</figcaption>
		</div>
	</form>

	</div> <!-- col.// -->
	<?php } ?>
</div>
	
</div> <!-- row.// -->


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
 <div id="id02" class="modal">
  
  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <p> <img  src="image/thumb.png" alt="Card image cap" width="70" height="70"  style="border-radius: 50%;"></p>
    </div>
    <?php

$query = "SELECT* FROM student WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
$id = $row['id']; 
$name = $row['name']; 
$phone = $row['phone_number']; 
$email = $row['email'];
$regNumber = $row['regNumber'];
$year = $row['year_of_study'];
$school = $row['school'];
$department = $row['department'];
$residence = $row['place_of_residence'];?>

<table style="height: 400px;">
  <tr>
<td>NAME:</td><td><i style="font-weight: bold;"> <?php echo $name ; ?></i></td>
   </tr>
   <tr>
<td>SCHOOL:</td><td><i style="font-weight: bold;"> <?php echo $school ; ?></i></td>
   </tr>
   <tr>
    <td>REG. NO:</td><td><i style="font-weight: bold;"> <?php echo $regNumber ; ?></i></td>
  </tr>
  <tr>
    <td>EMAIL:</td><td><i style="font-weight: bold;"> <?php echo $email ; ?></i></td>
  </tr>
  <tr>
    <td>DEPARTMENT:</td><td><i style="font-weight: bold;"> <?php echo $department ; ?></i></td>
  </tr>
  <tr>
    <td>YEAR:</td><td><i style="font-weight: bold;"> <?php echo $year ; ?></i></td>
  </tr>
  <tr>
   <td>PHONE:</td><td><i style="font-weight: bold;"> <?php echo $phone ; ?></i></td>
  </tr>
  <tr>
    <td>HOUSE:</td><td><i style="font-weight: bold;"> <?php echo $residence ; ?></i></td>
  </tr>
    
     </table>
    

    <div class="container" style="background-color:#c87437">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</div>

</div>


<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

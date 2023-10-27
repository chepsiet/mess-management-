<?php 
include('session-student.php');
?>

<?php
//aquring the particular order of a particular user.
$req = "SELECT* FROM student WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $req);
$row = mysqli_fetch_assoc($ses_sql);
$id = $row['id'];     
$sql="SELECT * FROM orders WHERE date = (SELECT max(date) from orders WHERE customer_id = $id)";
$ses_sql = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$order_number = $row['id'];
$time = $row['date'];
?>
<?php 

$connect = mysqli_connect("localhost", "root", "", "db_name");

//Fetching order id of the next order row.
$qry="select max(id) as maxid from orders";
$oid=0;
$run=mysqli_query($connect,$qry);
while ($rows=mysqli_fetch_array($run))
      {
                  $oid=$rows[0]+1;
      }



if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'   =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;

      //update the of quantity when an item is added to cart
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
      'item_id'     =>  $_GET["id"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
  //updating order details table with the items selected.
      $item_id=$_GET['id'];
      $item_name=$_POST['hidden_name'];
      $item_price=$_POST['hidden_price'];
      $item_quantity=$_POST['quantity'];
      $sq = "INSERT  INTO `order_detail` (`id`,`order_id`,`item_id`, `quantity`, `price`) 
      VALUES (NULL,'{$oid}', '{$item_id}', '{$item_quantity}', '{$item_price}')";
      mysqli_query($connect,$sq);

  
}

?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>student home  page</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">        
    <link rel="stylesheet" href="css/customstyles.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
            margin-left: 20px;
            margin-right: 20px;
          
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
      

    table{
  width: 100%;
  border-collapse: collapse;
  font-size: 1.1em;
}
thead, td{
  padding: 15px;
  text-align: left;
  border-bottom: 0px solid gray;


}
input {
      outline: 0;
      border-width: 0 0 1px;
      border-color: gray;
      background-color: white;
      margin-left: 40px;
      font-size: 1em;
      width: 50px

    }
    input:focus{
      border-color: green;
    }

    table img {
      height: 100px;
      width: 100px;
    }
  
  
    </style>
</head>

<body >

     <div class="container-block" id="hero">
     <header >
    <nav class="navbar navbar-expand-lg navbar-dark mt-0 pt-4 pb-4 mb-4 fixed-top" >
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
                        <a  class="nav-link" href="viewmenu.php">Gallery</a>
                    </li>


                    <li class="nav-item">
                        <a  class="nav-link active" href="student-order.php">Order</a>
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
                            <p class="dropdown-item" href="student-home.php" onclick="document.getElementById('id02').style.display='block'">Profile</p>
                          <a class="dropdown-item" href="student-logout.php">Logout</a>
                            
                        </div>
                    </li>
                   
                </ul>
            </div>                                                                   
            
        </nav>
</header>


 <div class="jumbotron"  style="margin-top:150px;">
   <div style="margin-left: 20px;">
                  <table class="table">
                    <thead>
                      <tr>
                         <th scope="col">IMAGE</th>
                        <th scope="col">NAME</th>
                        <th scope="col">PRICE</th>
                         <th scope="col">AVAILABLE</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>


      <?php
          $qty='item_quantity';
        $query = "SELECT * FROM menu ORDER BY menu_id ASC";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {$rowqty= $row["quantity"];
        ?>
      <div class="col-md-4">

        <form method="post" action="student-order.php?action=add&id=<?php echo $row["menu_id"]; ?>">
          <tr>
            <td><img src="<?php echo $row["item_image"]; ?>" class="img-responsive" /></td>

            <td><h4><?php echo $row["item_name"]; ?></h4></td>
            <td>Ksh. <?php echo $row["unit_price"]; ?></td>
            <td><?php echo $row["quantity"]; ?> pieces</td>

                       <td> <input type="number" name="quantity" min="1" max="20" step="1" placeholder="1" required="">
             <input type="hidden" name="item_id" value="<?php echo $row["item_name"]; ?>" />
            <input type="hidden" name="hidden_name" value="<?php echo $row["item_name"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row["unit_price"]; ?>" />
            <input type="hidden" name="user_id" value="<?php echo $id ?>" />
          </td>

            <td><input id="submit" type="submit"  style="background-color:#2d833f; " name="add_to_cart"  <?php
                        
             if (($rowqty <1) ) {echo 'disabled'; }?> style="margin-top:5px;" class="btn btn-success" value="Buy"  /></td>
                    </tr>

           
        </form>
      </div>
    </tbody>

      </div>

      <?php
          }
        }
      ?>

      </table>
    </div>

            
          </div>
        </div>
        <!--end container-->

      </section>
      <div style="position: fixed; bottom: 100px; right: 12px;">
<button class="btn btn-success" style="background-color:#2d833f;color: white;  font-weight: bold; "> <a href="confirm-order.php" style="color: white;">checkout</a>
</button>
</div>


<div id="id02" class="modal">
  
  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <p> <img  src="image/thumb.png" alt="Card image cap" width="70" height="70"  style="border-radius: 50%; margin-left: 40%;"></p>
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
$residence = $row['place_of_residence'];

?>
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



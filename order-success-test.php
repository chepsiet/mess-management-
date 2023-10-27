<?php

include('session-student.php');
if(!isset($login_session)){
header('Location: index.php'); 
}
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
     <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">  
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
                    
                    <li class="nav-item">
                        <a  class="nav-link scrollto" href="#team"> About</a>
                    </li>
                     </li>
                   
                    <li class="nav-item">
                        <a  class="nav-link " href="confirm-order.php"> myCart</a>
                    </li>
                     <li class="nav-item">
                        <a  class="nav-link" href="viewmenu.php">Gallery</a>
                    </li>


                    <li class="nav-item">
                        <a  class="nav-link scrollto" href="#contact"> Contact</a>
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
                          <a class="dropdown-item" href="student-logout.php" style="cursor:pointer;">Logout</a>
                            
                        </div>
                    </li>
                   
                </ul>
            </div>                                                                   
            
        </nav>
</header>



        <?php

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
       <div class="jumbotron" style="height: 500px">
            <h1 class="display-4">Thank you for your order!</h1>
            <p class="lead">Your order will be ready  in 30 Mins and your order number is <?php echo $order_number  ?> </p>
            <p class="lead">
              <b style="color: blue; font-size: 12px;">More info.</b><br>
             <p> <i class="bi bi-check"></i>An <b style="border-bottom: 2px solid darkgreen; cursor: pointer;">Email</b> has been sent to <b style="font-size: 19px;"><?php echo $email;  ?></b> about your order status.</p><br>
               <i class="bi bi-check"></i>You can contact our <b style="border-bottom: 2px solid darkgreen; cursor: pointer;">support team</b> when you need help.<br><br><br>
                 <form method="post" action="confirm-order.php"  >  
            <input type="submit" name="create_pdf"  value="Download your order receipt here!"  style="width: 320px;height: 50px; background-color:#2d833f; margin-left: 0.2%; font-size: 20px; color: #e2aa22;" />  
             </form>
            </p>
        </div>

        <div style="position: fixed; bottom: 54%; left: 80%;">
          <b><u>Our contact information.</u></b><br>
           <i class="bi bi-envelope"></i> kenogo2018@gmail.com<br>
            <i class="bi bi-telephone"></i> +254719601928
        </div>


            <footer id="footer" style="background-color: #c87437">
            <!-- top footer -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">About Us</h3>
                                <p> At Moi mess we're tied in with presenting nice food ,regardless of whether it implies going the additional mile. When you stoll through our entryways,we do what we can to make everybody feel comfortable in light of the fact that our family stretches out through your locale.</p>
                              
                            </div>
                        </div>
                        <div class="col-md-6 text-center" >
                          
                                   <div class="footer">
                                 <h3 class="footer-title" >Contact links</h3>
                                 <ul style="list-style: none;">
                                    <li><a href="#"><i class="fa fa-map-marker"></i>Kesses ,Eldoret</a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i>+254-9535688928</a></li>
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>kenogot2018@gmail.com</a></li>
                                </ul>
                            </div>
                          
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Categories</h3>
                                <ul class="footer-links" style="list-style: none;">
                                    <li><a href="#">Lunch</a></li>
                                    <li><a href="#">Breakfast</a></li>
                                    <li><a href="#">Supper</a></li>
                                    <li><a href="#">cold Drinks</a></li>
                                    <li><a href="#">Soft Drinks</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="clearfix visible-xs"></div>

                        
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /top footer -->
                

            <!-- bottom footer -->
            
            <!-- /bottom footer -->
        </footer>
           
<!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2020 <a class="grey-text text-lighten-4" href="#" target="_blank">Ken Ogot </a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">Ken Ogot</a></span>
        </div>
    </div>
  </footer>
    <!-- END FOOTER -->


</div>


<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kenogot2018@gmail.com';                     //SMTP username
    $mail->Password   = 'Kenneth31116918';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('kenogot2018@gmail.com', 'Moi mess');
    $mail->addAddress($email,$login_session);     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('kenogot2018@gmail.com', 'Information');
   // $mail->addCC('cc@example.com');
    //$mail->addBCC('kenogot2018@gmail.com');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Order status';
    $mail->Body    = 'Thank you, for ordering from moi mess. your order will be available in 40 minutes.</b>';
    $mail->AltBody = '';

    $mail->send();
    echo '';
} catch (Exception $e) {
    echo "";
}
?>



<?php
include('session-student.php');
if(!isset($login_session)){
header('Location: index.php');
} 
require_once("db-const.php");
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>mess management system index page</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
     <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">       
    <link rel="stylesheet" href="css/customstyles.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>

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
            margin:20px 26px 0 30px;
            
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
            margin-right: 3px;
        }

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button[type=submit] {
  background-color: #2d833f;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
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

/*--------------------------------------------------------------
# Team
--------------------------------------------------------------*/


.team .member {
  position: relative;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  padding: 30px;
  border-radius: 10px;
  text-align: center;
}

.team .member .pic {
  overflow: hidden;
  width: 150px;
  border-radius: 50%;
  margin: 0 auto 20px auto;
}

.team .member .pic img {
  transition: ease-in-out 0.3s;
}

.team .member:hover img {
  transform: scale(1.1);
}

.team .member h4 {
  font-weight: 700;
  margin-bottom: 5px;
  font-size: 20px;
  color: #36343a;
}

.team .member span {
  display: block;
  font-size: 15px;
  padding-bottom: 10px;
  position: relative;
  font-weight: 500;
}

.team .member span::after {
  content: '';
  position: absolute;
  display: block;
  width: 50px;
  height: 1px;
  background: #b5b3ba;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

.team .member p {
  margin: 10px 0 0 0;
  font-size: 14px;
}

.team .member .social {
  margin-top: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.team .member .social a {
  transition: ease-in-out 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50px;
  width: 32px;
  height: 32px;
  background: #a8a5ae;
}

.team .member .social a i {
  color: #fff;
  font-size: 16px;
  margin: 0 2px;
}

.team .member .social a:hover {
  background: #009970;
}

.team .member .social a + a {
  margin-left: 8px;
}
/*--------------------------------------------------------------
# Contact
--------------------------------------------------------------*/
.contact .info {
  padding: 30px;
  width: 100%;
  background: #fff;
  border-radius: 20%;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}


.contact .info h4 {
  padding: 0 0 0 60px;
  font-size: 22px;
  font-weight: 600;
  margin-bottom: 5px;
  color: #36343a;
}

.contact .info p {
  padding: 0 0 0 60px;
  margin-bottom: 0;
  font-size: 14px;
  color: #686470;
}

.contact .php-email-form {
  width: 100%;
  padding: 30px;
  background: #c87437;
  box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
}

.contact .php-email-form .form-group {
  padding-bottom: 8px;
}

.contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .error-message br + br {
  margin-top: 25px;
}

.contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form input, .contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
}

.contact .php-email-form input {
  height: 44px;
}

.contact .php-email-form textarea {
  padding: 10px 12px;
}

.contact .php-email-form button[type="submit"] {
  background: #009970;
  border: 0;
  padding: 10px 30px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;
}

.contact .php-email-form button[type="submit"]:hover {
  background: #00805d;
}

@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
/*--------------------------------------------------------------
# Services
--------------------------------------------------------------*/
.services .icon-box {
  text-align: center;
  padding: 40px 20px;
  transition: all ease-in-out 0.3s;
  background: #fff;
}

.services .icon-box .icon {
  margin: 0 auto;
  width: 64px;
  height: 64px;
  border-radius: 50px;
  border: 1px solid #009970;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  transition: ease-in-out 0.3s;
  color: #009970;
}

.services .icon-box .icon i {
  font-size: 28px;
}

.services .icon-box h4 {
  font-weight: 700;
  margin-bottom: 15px;
  font-size: 24px;
}

.services .icon-box h4 a {
  color: #36343a;
  transition: ease-in-out 0.3s;
}

.services .icon-box p {
  line-height: 24px;
  font-size: 14px;
  margin-bottom: 0;
}

.services .icon-box:hover {
  border-color: #fff;
  box-shadow: 0px 0 25px 0 rgba(0, 0, 0, 0.1);
}

.services .icon-box:hover h4 a {
  color: #009970;
}

.services .icon-box:hover .icon {
  color: #fff;
  background: #009970;
}
 #navbarDropdown:hover {
        border: none;

}



       
    </style>
</head>

<body>

   <div class="container-block" id="hero">
     <header class="fixed-top">
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
                        <a  class="nav-link scrollto" href="#team"> About</a>
                    </li>
                     </li>
                   
                    <li class="nav-item">
                        <a  class="nav-link " href="confirm-order.php"> myCart</a>
                    </li>
                     <li class="nav-item">
                        <a  class="nav-link " href="viewmenu.php">Gallery</a>
                    </li>
                     <li class="nav-item">
                        <a  class="nav-link " href="mpesa.php">Make Payment</a>
                    </li>


                    <li class="nav-item">
                        <a  class="nav-link scrollto" href="#contact"> Contact</a>
                    </li>

                    <li class="nav-item">
                        <a  class="nav-link" href="student-order.php">Order</a>
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
     <div style="height: 115px;"></div>
        <div class="row mt-4 mb-4">
        <div class="col-md-4">
            <p> <h1 style="color: darkgray; text-shadow: 3px 3px red">Welcome to Moi Mess</h1> </p>
            <p style="color: gray;">At Moi Mess we're tied in with presenting nice food..</p>
            <div class="card">
                <img src="image/tea.jpg" >
            <div class="card-body text-center" style="background-color:#e2aa22; "><button style="border-radius: 3px; border: none; padding-left: 10px; background-color: #2d833f;color: white; height: 50px; font-size: 1.5em; "><a href="student-order.php" style="color: white;">Order Food Now!</a></button></div>

            </div>
        </div>
        <div class="col-md-8" style="border-radius: 0 0 0 50%;"><img src="image/heroimg.jpeg" width="100%" height="470px;"></div>
        </div>

        <div class="hero2 mt-4 mb-4 text-center" style="background-color: #f2f5ec; height: 200px; background-image: url('images.jpeg'); background-size: cover;"><br><br>
            <p style="color: #f2f5ec; font-weight: bold;font-size: 1.5em;"> Here is where you can find quality nice food &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><button style="border:1px solid #e2aa22;border-radius: 20%; background-color: transparent; color: black;"><a href="viewmenu0.php" style="color: #000000;">View menu</a></button></span></p>
        </div>

         

  <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="jumbotron mb-4 mt-4" style="background-color: #ffffff">
             <h1 style="text-align: center;">-Our Mission-</h1>
             <p class="lead" style="text-align: center;">To serve our customers with meals they always require</p>
           
                 <h1 style="text-align: center;">About</h1>

                <p class="lead" style="text-align: justify;">  At Moi mess we're tied in with presentin nice food ,regardless of whether it implies going the additional mile. When you stoll through our entryways,we do what we can to make everybody feel comfortable in light of the fact that our family stretches out through your locale.</p>
    <p class="lead" style="text-align: justify;"> Moi mess is an organization that is continually developing.From the young eatery we had in 1960 ,we've kept on extending visions to help others.</p>
   <p class="lead" style="text-align: justify;">  We believe in quality.All around.Quality food cant be made without quality initiative.Find out about general population driving our organization.</p>
           
        </div>

      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Our Leadership</h2>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">

              <div class="col-lg-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                  <div class="pic"><img src="image/leader1.jpg" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>John Chirchir</h4>
                    <span>Chief Executive Officer</span>
                    <p>Begin to be now what you will be thereafter</p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member" data-aos="zoom-in" data-aos-delay="200">
                  <div class="pic"><img src="image/leader2.jpg" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Mike Patel</h4>
                    <span>Product Manager</span>
                    <p>Its always too early to quit</p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="300">
                  <div class="pic"><img src="image/leader2.jpg" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Richard Sweat</h4>
                    <span>CTO</span>
                    <p>With the new day comes the new strength</p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="400">
                  <div class="pic"><img src="image/leader1.jpg" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>David Matt</h4>
                    <span>Accountant</span>
                    <p>Either i will find a way or will make one.</p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>

    </section><!-- End Team Section -->

      <div class="jumbotron" style="height: 500px; background-color: #e2aa22" id="news" >
        <h3>BREAKING NEWS</h3>

<?php

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_errno) {
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
exit();
}

$res=mysqli_query($mysqli,"SELECT* FROM posts ");

while ($row=mysqli_fetch_array($res)) {
     echo "<br>";  
    echo "<h3>"; echo $row['title'];  echo "</h3>";  echo "<br>"; 
    echo $row['body']; echo "<br>";   
    
    
}
 ?>
             
        </div>

  <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
              <h2>CONTACT US.</h2>
              <img src="image/contact.jpeg" height="400px" width="300px;" style="border-radius: 50%;"> 
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
        
            <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="info">
                  <h4>Email:</h4>
                  <p>kenogot2018@gmail.com</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info w-100 mt-4">
                  <h4>Call:</h4>
                  <p>+254 719601928</p>
                </div>
              </div>
            </div>
            <form action="contact.php" method="post" class="php-email-form mt-4">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="phone" id="subject" placeholder="Phone Number" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center" style="width: 200px; "><button type="submit" name="submit" style="background-color: #2d833f;">Send Message</button></div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

     <div id="id02" class="modal">
  
  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <p > <img  src="image/thumb.png" alt="Card image cap" width="70" height="70"  style="border-radius: 50%;"></p>
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
<table style="height: 300px;">
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


      


        <footer id="footer">
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
                                    <li><a href="#"><i class="bi bi-map-marker"></i>Kesses ,Eldoret</a></li>
                                    <li><a href="#"><i class="bi bi-phone"></i>+254-9535688928</a></li>
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>kenogot2018@gmail.com</a></li>
                                </ul>
                            </div>
                          
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Social links</h3>
                                <ul class="footer-links" style="list-style: none;">
                                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                    <li>  <a href="https://web.facebook.com/ibunda.page/" class="facebook"><i class="bi bi-facebook"></i> Facebook</a></li>
                                    <li> <a href="www.instagram.com" class="instagram"><i class="bi bi-instagram"></i>Instagram</a></li>
                                    <li> <a href="www.linkedin.com" class="linkedin"><i class="bi bi-linkedin"></i>Linkedin</a></li>
                                    <li> <a href="www.youtube.com" class="linkedin"><i class="bi bi-youtube"></i> Youtube</a></li>
            
             
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
  <footer class="page-footer" >
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
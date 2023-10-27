<?php
require_once("db-const.php");
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>student login page</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">        
    <link rel="stylesheet" href="css/customstyles.css">
    <link rel="stylesheet" href="css/styles.css">
 <style>

    body{
        background-color: orange;
    }
   
        .container-block{
            height: 100px;
            width: 96%;
            margin-left: 2%;

        }
        .navbar{
            background-color: #d05056;;
            border-radius: 24px 24px 0 0;

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
            color: black;
            font-weight: bold;
            text-decoration: none;
        }
        .nav-item .nav-link:hover{
           background-color: lightgray;
           border-radius: 10px;
           
        }
        .nav-item .nav-link{
            border-radius: 10px;
            margin-right: 10px;
        }
        
    </style>
</head>

<body>

   <div class="container-block">
    <nav class="navbar navbar-expand-lg navbar-dark mt-3 pt-4 pb-4 sticky-top">
        <a class="navbar-brand" href="#">
            <img src="image/logo.png" width="60" height="40" alt="">Mess Management System
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
                        <a  class="nav-link text-dark" href="index.php"> Home</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link text-dark" href="aboutus.php"> About</a>
                    </li>

                     </li>
                    <li class="nav-item">
                        <a  class="nav-link text-dark" href="news.php"> News</a>
                    </li>

                    <li class="nav-item">
                        <a  class="nav-link text-dark" href="contact.html"> Contact</a>
                    </li>
                     </li>
                    <li class="nav-item">
                        <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Log In
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="admin-login.html">Admin</a>
    <a class="dropdown-item" href="student-login.html">Student</a>
  </div>
</div>

                      
                    </li>
                </ul>
            </div>
            
        </nav>

        <div class="jumbotron" style="height: 500px">

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
         <footer id="footer" style="margin-top: 50px;">
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
  
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2020 <a class="grey-text text-lighten-4" href="#" target="_blank">Ken Ogot </a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">Ken Ogot</a></span>
        </div>
    </div>



</div>


<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
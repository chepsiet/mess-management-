<?php
require 'connection.php';
$conn = Connect();

session_start();

$user_check=$_SESSION['login_user2'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT* FROM student WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
$name = $row['name']; 
$phone = $row['phone_number']; 
$email = $row['email'];
$regNumber = $row['regNumber'];

$total=0;
?>
<!DOCTYPE html>
<html>
  <head>
     <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/materialize.min.css">

    <style type="text/css">
    .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #d05056;
  min-width: 170px;
 box-shadow: none;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 30px 15px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: white;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: white;}
    #container {
      width: 100%;
      /*background-color: black;*/
      margin: 0 auto;
      padding: 1px;


    }
    #container {
      position: fixed;
      top: 0;
      width: 100%;
      background-color: #1ac5ff;
    }
    #navigation{
      height: 64px;
      margin-top: 5px;
      background-color: #d05056; 
      

    }
    ul#navmenu{
      list-style: none;
      font-size: 20px;
    }
    ul#navmenu li{
      text-align: center;
      float: left;
      margin-top: 20px;
      margin-right: 4px;

    }
    ul#navmenu a{
      text-decoration: none;
      display: inline-block;
      width: 150px;
      height: 25px;
      background-color: #d05056;
      padding-right: 60px;
      color: white;
    }
    
    
    form img {
      height: 250px;
      width: 600px;
      margin:10px; 
      
    }
    
    table{
  width: 100%;
  border-collapse: collapse;
  font-size: 1.1em;
}
thead, td{
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #4dd2ff;


}
input {
      outline: 0;
      border-width: 0 0 2px;
      border-color: gray;
      background-color: deepskyblue;
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

    <title></title>
  </head>
  <body style="background-color: deepskyblue">
    <div id="container">
  <img src="image/logo.jpg" width="50" height="50"><span style="float: right;margin-top: 20px;margin-right: 200px">Hello , <?php echo $login_session;  ?></span>
<div id="navigation">
  <ul id="navmenu">
    <li><a href="student-home.php" >HOME</a></li>
    <li><a href="viewmenu.php">GALLERY</a></li>
    <li><a href="student-order.php" style="color: blue;">ORDER</a></li>
    
      
    <li>
      
      <div class="dropdown">
  <a href="#" class="dropbtn">ACCOUNT</a>
  <div class="dropdown-content">
    <a href="student-order-history.php">order history</a>
   <a href="student-home.php" style="border-bottom: 1px solid blue;">profile</a>

    <a href="student-logout.php">logout</a>

</div>

  </div>  
  </ul>
  <br><br><br>

</div>
</div>
</header>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container" style="margin-top: 150px;">
          <p>Provide payment details</p>
          <div class="divider"></div>
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Details</h4>
              </div>
<div>
                <div class="card-panel">
                  <div class="row">
                    <form class="formValidate col s12 m12 l6" id="formValidate" method="post" action="confirm-order.php" novalidate="novalidate">
                     <div class="row">
                        <div class="input-field col s12">
                        
              <input name="name" id="Wallet" type="text" data-error=".errorTxt2" required value="<?php echo $name;?>">
             
              <div class="errorTxt2"></div>
                        </div>
                      </div>       
                      <div class="row">
                        <div class="input-field col s12">
                      
              <textarea name="address" id="address" class="materialize-textarea validate" data-error=".errorTxt1" placeholder="address"><?php echo $regNumber;?></textarea>
              
              <div class="errorTxt1"></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                        
              <input name="cc_number" id="cc_number" type="text" data-error=".errorTxt2" required placeholder="cc_number">
             
              <div class="errorTxt2"></div>
                        </div>
                      </div>
                              
                      <div class="row">
                        <div class="row">
                          <div >
        <div style="position: fixed; bottom: 200px; right: 5px;">
                              <button class="btn btn-big success" type="submit" name="action" style="width: 150px; background-color:#d05056;color: white; ">ORDER >
                              
                              </button>
                            </div>
            </div>
                        </div>
                      </div>
            <?php
              foreach ($_POST as $key => $value)
            {
              if($key == 'action' || $value == ''){
                break;
              }
              echo '<input name="'.$key.'" type="hidden" value="'.$value.'">';
            }
            ?>
                    </form>
                  </div>
                </div>
              </div>
            <div class="divider"></div>
            
          </div>
        <!--end container-->

      </div>
    
        <div class="container">
          <p class="caption">Estimated Receipt</p>
          <div class="divider"></div>
          <!--editableTable-->
<div id="work-collections" class="seaction">
<div class="row">
<div>
<ul id="issues-collection" class="collection">
<?php
    echo '<li class="collection-item avatar">
        <i class="mdi-content-content-paste red circle"></i>
        <p><strong>Name:</strong>'.$name.'</p>
        <p><strong>phone:</strong>'.$phone.'</p>
    <p><strong>Email:</strong> '.$email.'</p>
        <a href="#" class="secondary-content"></a>';
    
  foreach ($_POST as $key => $value)
  {
    if($value == ''){
      break;
    }
    if(is_numeric($key)){
    $result = mysqli_query($conn, "SELECT * FROM menu WHERE menu_id = $key");
    while($row = mysqli_fetch_array($result))
    {
      $price = $row['unit_price'];
      $name = $row['item_name'];
      $item_id = $row['menu_id'];
    }
      $price = $value*$price;
          echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title"><strong>#'.$item_id.' </strong>'.$name.'</p>
            </div>
            <div class="col s2">
                <span>'.$value.' Pieces</span>
            </div>
            <div class="col s3">
                <span>Ksh. '.$price.'</span>
            </div>
        </div>
    </li>';
    $total = $total + $price;
  }
  }
    echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title"> Total</p>
            </div>
            <div class="col s2">
                <span>&nbsp;</span>
            </div>
            <div class="col s3">
                <span><strong>Ksh. '.$total.'</strong></span>
            </div>
        </div>
    </li>';
    if(!empty($_POST['description']))
    echo '<li class="collection-item avatar"><p><strong>Note: </strong>'.htmlspecialchars($_POST['description']).'</p></li>';
?>
</ul>


                </div>
        </div>
                </div>
              </div>
            </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->




    <!-- ================================================
    Scripts
    ================================================ -->
    
    

</body>

</html>
<?php
  
  
  
?>
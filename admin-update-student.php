<?php

include('session-admin.php');
?>
<?php

if(!isset($login_session)){
header('Location: index.php'); 
}

require_once("connection.php");
?>

<?php
if (isset($_POST['submit'])) {
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "db_name";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_errno) {
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
exit();
}
}
?>
<?php
$user_id=$_REQUEST['id'];

$result=mysqli_query($conn,"select id, name, regNumber,school,email,year_of_study,department,place_of_residence,phone_number,username,password from student where id='$user_id'")or die ("query 1 incorrect.......");

list($user_id,$name,$regNumber,$school,$email,$year_of_study,$department,$place_of_residence,$phone_number,$username,$password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$name=$_POST['name'];
$regNumber=$_POST['regNumber'];
$school=$_POST['school'];
$email=$_POST['email'];
$year_of_study=$_POST['year_of_study'];
$department=$_POST['department'];
$place_of_residence=$_POST['place_of_residence'];
$phone_number=$_POST['phone_number'];
$username=$_POST['username'];
$password=$_POST['password'];


mysqli_query($conn,"update student set name='$name',regNumber='$regNumber',school='$school',email='$email',year_of_study='$year_of_study',department='$department',place_of_residence='$place_of_residence',phone_number='$phone_number',username='$username', password='$password' where id='$user_id'")or die("Query 2 is inncorrect..........");

header("location: admin-manage-students.php");
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>admin create menu page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <style type="text/css">
  	label{
  		font-size: 11px;
  	}
  	 
  
  </style>
</head>
<body>
  <div class="admin-wraper" style="background-color: white">
    <div class="left-sidebar" style="background-color: #c87437;height:109vh;">
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
        <h3><i>Update student records</i></h3>

    </div>
 
        <form action="admin-update-student.php" name="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $user_id;?>" />
                    <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">name<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="name" id="name" required value="<?php echo $name; ?>">
		           </div>
		           </div>

                    <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Reg No<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="regNumber" id="regNumber" required value="<?php echo $regNumber; ?>">
		            </div>
		            </div>

                    <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">School<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="school" id="school" required value="<?php echo $school; ?>">
		           </div>
		           </div>


                    <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Email<span style="color:red;">*</span></label>
			        <input class="form-control"type="email" name="email" id="email" required value="<?php echo $email; ?>">
		            </div>
   		            </div>

   		            <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Year<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="year_of_study" id="name" required value="<?php echo $year_of_study; ?>">
		           </div>
		           </div>
                    <div class="row" style="position: fixed; left: 60%; bottom: 3%;">
		           <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Department<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="department" id="department" required value="<?php echo $department; ?>">
		           </div>
		           </div>
                  

		           <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Place of Residence<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="place_of_residence" id="place_of_residenece" required value="<?php echo $place_of_residence; ?>">
		           </div>
		           </div>

		           <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Phone number<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="phone_number" id="phone_number" required value="<?php echo $phone_number; ?>">
		           </div>
		           </div>

		           <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Username<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="username" id="username" required value="<?php echo $username; ?>">
		           </div>
		           </div>

		           <div class="col-md-8 col-lg-8 col-lg-offset-1 col-sm-10 col-xs-12 ">
		            <div class="form-group ">
			        <label class="control-label">Password<span style="color:red;">*</span></label>
			        <input class="form-control"type="text" name="password" id="password" required value="<?php echo $password; ?>">
		           </div>
		           </div>
		           <div class="col-sm-7">
        <button style="background-color: darkgreen; width: 200px; height: 40px; margin-left: 15%;" type="submit" class="btn btn-success " name="btn_save" id="btn_save">SAVE</button></div>
        </div>
        </form>

			</div>

		</div>
         
	</div>
</div>
</body>
</html>
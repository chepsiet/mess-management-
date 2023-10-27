<?php
include('session-admin.php');

require_once('tcpdf/tcpdf.php');  
ob_start();

if(!isset($login_session)){
header('Location: index.php'); // Redirecting To Home Page
}

?>

<?php 
require_once("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>admin create menu page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
   <div class="admin-wraper" style="background-color: white">
    <div class="left-sidebar" style="background-color: #c87437;height: 700px;">
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
        <p style="float: right;"> welcome:<span style="font-size: 30px;">Mr.<?php echo $_SESSION['login_user1']; ?></span></p>
        <p href="#">
            <img src="image/topimg.png" height="70" width="70" alt="" style="border-radius: 50%"><span style="font-size: 2em; color: green">Mess Management System</span>

        </p>

       
      
        <h2 class="page-title">Reports</h2>
				 <a href="order-report.php" class="btn-big "><button type="submit" class="btn  btn-sm btn-success " name="submit" style="background-color: #white;" >Order Report</button></a>
               <a href="admin-product-report.php" class="btn-big"><button type="submit" class="btn  btn-sm btn-success" name="submit" style="background-color: #d05056;" >Product report</button></a><a href="admin-customer-report.php" class="btn-big"><button type="submit" class="btn  btn-sm btn-success" name="submit" style="background-color: #d05056;" >Customer Report</button></a>
 <form class="form-inline" method="POST" action="search.php" style="float: right; width: 300px;">
        <div class="input-group col-md-12">

          <input type="date" class="form-control" name="date" placeholder="dd-mm-yyyy" required="required"/>
          <span class="input-group-btn">
            <button class="btn btn-secondary" name="search"><span class="glyphicon glyphicon-search"></span>search</button>
          </span>
        </div>
      </form>
               <br><br>

             
			</div>

			<div class="content" style="border: 1px solid lightgray;"> 
				<i style="font-size: 22px;">Order Report(all order reports)</i><br>
				<a href="order-report.php" style="font-size: 20px; color: black;">All/</a>
				<a href="admin-report-daily.php" style="font-size: 20px; color: lightblue;">daily<span style="color: black">/</span></a>
				<a href="admin-report-weekly.php" style="font-size: 20px; color: lightblue;">weekly<span style="color: black">/</span></a>
				<a href="admin-report-monthly.php" style="font-size: 20px; color: lightblue;">monthly </a>
				<form method="post" action="order-report.php" style="float: right;">
				<button type="submit" class="btn  btn-sm btn-success" name="create_pdf" style="background-color: #d05056; float: right; margin-left: 400px" >Print report</button></form>
				<table class="table">
    <thead style="background: lightgray;">
      <tr>
        <th>ORDER ID</th>
        <th>CUTOMER NAME</th>
        <th>EMAIL ADDRESS</th>
        <th>DATE</th>
        <th>TOTAL</th>
        
      </tr>
    </thead>
    <tbody>
    	<?php 
    	$tm=time();
    	$today="".date('m/d/y',$tm)."";
    	$res=mysqli_query($conn,"SELECT * FROM orders " );
        while ($row=mysqli_fetch_array($res)) { 
        	
        	?>
      <tr style="border: none;">
        <td ><?php echo $row['id']; ?></td>
        <td ><?php echo $row['name']; ?></td>
        <td ><?php echo $row['email']; ?></td>
        <td ><?php echo $row['date']; ?></td>
        <td ><?php echo $row['total']; ?></td>
      </tr>
        <?php  }?>
    </tbody>
  </table>
    </div>
  </div>
</div>

			
				
				
			</div>

		</div>
         
	</div>
</div>
<!--Generating pdf of the confirm-order.php page-->
<?php

          if(isset($_POST["create_pdf"]))  
 {  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("export data");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();
      
       $ht='<h3>MOI UNIVERSITY MESS-FOOD ORDER REPORT </h3>
       ';

      $ht .= '<table width="600px" border="none"><tr>
      <th>ORDER NUMBER</th>
      <th>CUSTOMER NAME</th>
       <th>EMAIL ADDRESS</th>
      <th>DATE OF ORDER</th>
      <th>COST OF ORDER</th>
      </tr>';

      $res=mysqli_query($conn,"SELECT * FROM orders " );
        while ($row=mysqli_fetch_array($res)) { 
        	$sum+=$row["total"];
      $ht .= '
      <tr>
      <td>'.$row["id"].'</td>
      <td>'.$row["name"].'</td>
       <td>'.$row["email"].'</td>
      <td>'.$row["date"].'</td>
      <td>'.$row["total"].'</td>
      </tr>
      ';}
      $ht .= '
      <tr>
      <td>Total</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>Ksh'.$sum.'</td>
      </tr>
      ';

      $ht .= '</table>';
      
      $obj_pdf->writeHTML($ht,true, true, false);
       ob_end_clean(); 
      $obj_pdf->Output('foodOrderReport.pdf', 'I');
       
         }

      ?> 
      <!--Generating pdf of the order-daily-report.php page-->
<?php

          if(isset($_POST["daily"]))  
 {  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("export data");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();
      
       $ht='<h3>MOI UNIVERSITY MESS-FOOD ORDER REPORTP </h3>
       ';

      $ht .= '<table width="600px" border="none"><tr>
      <th>ORDER NUMBER</th>
      <th>CUSTOMER NAME</th>
       <th>EMAIL ADDRESS</th>
      <th>DATE OF ORDER</th>
      <th>COST OF ORDER</th>
      </tr>';
      $date=date_create("now");
      $now=date_format($date, "Y-m-d");
      date_sub($date,date_interval_create_from_date_string("1 days"));
      $weekly=date_format($date, "Y-m-d");
      $res=mysqli_query($conn,"SELECT * FROM orders WHERE date BETWEEN '$weekly' AND '$now' " );

      while ($row=mysqli_fetch_array($res)) { 
      $sum+=$row["total"];
      $ht .= '
      <tr>
      <td>'.$row["id"].'</td>
      <td>'.$row["name"].'</td>
       <td>'.$row["email"].'</td>
      <td>'.$row["date"].'</td>
      <td>'.$row["total"].'</td>
      </tr>
      ';}
      
      $ht .= '
      <tr>
      <td>Total</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>Ksh'.$sum.'</td>
      </tr>
      ';

      $ht .= '</table>';
      $ht .='
      <p><strong>Account Balance:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ksh:'.($balance-$total).'</p>
          ';
      $obj_pdf->writeHTML($ht,true, true, false);
       ob_end_clean(); 
      $obj_pdf->Output('foodOrderReport.pdf', 'I');
       
         }
      ?> 
      <!--Generating pdf of the weekly report page-->
<?php

          if(isset($_POST["weekly"]))  
 {  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("export data");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();
      
       $ht='<h3>MOI UNIVERSITY MESS-FOOD ORDER REPORT </h3>
       ';

      $ht .= '<table width="600px" border="none"><tr>
      <th>ORDER NUMBER</th>
      <th>CUSTOMER NAME</th>
       <th>EMAIL ADDRESS</th>
      <th>DATE OF ORDER</th>
      <th>COST OF ORDER</th>
      </tr>';

      $date=date_create("now");
      $now=date_format($date, "Y-m-d");
      date_sub($date,date_interval_create_from_date_string("7 days"));
      $weekly=date_format($date, "Y-m-d");
      $res=mysqli_query($conn,"SELECT * FROM orders WHERE date BETWEEN '$weekly' AND '$now' " );

      while ($row=mysqli_fetch_array($res)) { 
      $sum+=$row["total"];
      $ht .= '
      <tr>
      <td>'.$row["id"].'</td>
      <td>'.$row["name"].'</td>
       <td>'.$row["email"].'</td>
      <td>'.$row["date"].'</td>
      <td>'.$row["total"].'</td>
      </tr>
      ';}
      
      $ht .= '
      <tr>
      <td>Total</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>Ksh'.$sum.'</td>
      </tr>
      ';

      $ht .= '</table>';
      $obj_pdf->writeHTML($ht,true, true, false);
       ob_end_clean(); 
      $obj_pdf->Output('foodOrderReport.pdf', 'I');
       
         }
      ?> 

       <!--Generating pdf of the monthly report page-->
<?php

          if(isset($_POST["monthly"]))  
 {  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("export data");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();
      
       $ht='<h3>MOI UNIVERSITY MESS-FOOD ORDER REPORT </h3>
       ';

      $ht .= '<table width="600px" border="none"><tr>
      <th>ORDER NUMBER</th>
      <th>CUSTOMER NAME</th>
       <th>EMAIL ADDRESS</th>
      <th>DATE OF ORDER</th>
      <th>COST OF ORDER</th>
      </tr>';

      $date=date_create("now");
      $now=date_format($date, "Y-m-d");
      date_sub($date,date_interval_create_from_date_string("30 days"));
      $weekly=date_format($date, "Y-m-d");
      $res=mysqli_query($conn,"SELECT * FROM orders WHERE date BETWEEN '$weekly' AND '$now' " );

      while ($row=mysqli_fetch_array($res)) { 
      $sum+=$row["total"];
      $ht .= '
      <tr>
      <td>'.$row["id"].'</td>
      <td>'.$row["name"].'</td>
       <td>'.$row["email"].'</td>
      <td>'.$row["date"].'</td>
      <td>'.$row["total"].'</td>
      </tr>
      ';}
      
      $ht .= '
      <tr>
      <td>Total</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>Ksh'.$sum.'</td>
      </tr>
      ';

      $ht .= '</table>';
      $obj_pdf->writeHTML($ht,true, true, false);
       ob_end_clean(); 
      $obj_pdf->Output('foodOrderReport.pdf', 'I');
       
         }
      ?> 
      

</body>
</html>
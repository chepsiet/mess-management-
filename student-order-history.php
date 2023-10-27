<?php

include('session-student.php');


if(!isset($login_session)){
header('Location: index.php'); 
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/font-awesome.min.css">
		 <link rel="stylesheet" href="css/bootstrap.min.css">

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
		
			margin: 0 auto;
			padding: 1px;
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
			padding-right: 100px;	
			color: white;
			margin-left: 80px;
		}
		
		


		
		
	</style>
	<title>student order history</title>
</head>
<body style="background-color: white;">
<div id="container">
	<header>
	<img src="image/logo.jpg" width="50" height="50"><span style="float: right;margin-top: 20px;margin-right: 200px">Hello , <?php echo $login_session; ?></span>
    <div id="navigation">
	<ul id="navmenu">
		<li><a href="student-home.php" >HOME</a></li>
		<li><a href="viewmenu.php" style="color: blue">GALLERY</a></li>
		<li><a href="student-order.php">ORDER</a></li>
		<li><a href="#" style="color: black; font-size: 20px;" > Ksh.<?php
         
 $sql = "SELECT student.username,account.student_id,account.amount,account.account_id FROM account INNER JOIN student ON student.id=account.student_id WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$balance = $row['amount'];
echo "$balance";
?>
	
</a></li>	
		
	<li> 	
	<div class="dropdown">
	<a href="#" class="dropbtn">ACCOUNT</a>
	<div class="dropdown-content">
		 <a href="student-order-history.php">order history</a>
	<a href="student-home.php" style="border-bottom: 1px solid blue;">profile</a>
    <a href="student-logout.php">logout</a>
    </div>
    </div>
    </li>
	</ul>
</div>

     </header>
    </div>
    <div class="menuItems">
    <table>
      
      <tr><td>harry</td></tr>
       <tr><td>simon</td></tr>
        <tr><td>maria</td></tr>
         <tr><td>victory</td></tr>
    </table>
    <script type="text/javascript">
      var tables = document.getElementsByTagName('table');
      var table =tables[tables.length-1];
      var rows = table.rows;
      for (var i = 0; i < rows.length; i++) {
        td= document.createElement('td');
        td.appendChild(document.createTextNode(i+1));
        rows[i].insertBefore(td,rows[i].firstChild);
      }
    </script>


      
  <?php
  $html='<table class="table" style="margin-left: 10px;">
    	 <thead>
    	  <tr>
    	   <th scope="col">Order#</th>
    	    <th scope="col">Items</th>
    	     <th scope="col">Order Placed On</th>
    	      <th scope=​"col"​>​Status</th>
    	      <th scope=​"col"​>​Details</th>
    	       </tr>
    	        </thead>



    	      

    	 <tbody>
    	  <tr>
    	   <th scope="row">33</th>
    	    <td>12</td>
    	     <td>10/1/2020</td>
    	      <td>Order Processing</td>
    	       <td><a href="#">view details </a></td>
    	   </tr>

    	    <tr>
    	   <th scope="row">33</th>
    	    <td>12</td>
    	     <td>10/1/2020</td>
    	      <td>Order Processing</td>
    	       <td><a href="#">view details </a></td>
    	   </tr>

    	    <tr>
    	   <th scope="row">33</th>
    	    <td>12</td>
    	     <td>10/1/2020</td>
    	      <td>Order Processing</td>
    	       <td><a href="#">view details </a></td>
    	   </tr>

    	    <tr>
    	   <th scope="row">33</th>
    	    <td>12</td>
    	     <td>10/1/2020</td>
    	      <td>Order Processing</td>
    	       <td><a href="#">view details </a></td>
    	   </tr>

    	  	     </tbody>
    	  	 </table>' ?>
           
           <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>

     </body>
     </html>



             <?php
          if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
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
      ob_end_clean(); 
      $obj_pdf->writeHTML($html,true, true, false);
      $obj_pdf->Output('student-order-history.pdf', 'I');   }
      ?> 
        

           
    	  	 
  




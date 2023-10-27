<?php
require 'connection.php';
$conn = Connect();
require_once('tcpdf/tcpdf.php');  
ob_start();
session_start();
$user_check=$_SESSION['login_user2'];
$query = "SELECT* FROM student WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
$id = $row['id']; 
$name = $row['name']; 
$phone = $row['phone_number']; 
$email = $row['email'];
$regNumber = $row['regNumber'];
$year_of_study = $row['year_of_study'];
$total=0;
$date=date('Y-m-d H:i:s');
?>


        <?php
       
 $sql="SELECT * FROM orders WHERE date = (SELECT max(date) from orders WHERE customer_id = $id)";
$ses_sql = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$order_number = $row['id'];
$time = $row['date'];
?>

<!DOCTYPE html>
<html>
<head>
   <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.minn.css">
  <link rel="stylesheet" href="css/materialize.min.css">
<title>student confirm order</title>
<style type="text/css">
   body{
        background-color: #e2aa22;
    }
</style>
</head>
<body>
 <!--inner joining  student to account table to fetch balance of every student-->
<?php
$sql = "SELECT student.username,account.student_id,account.amount FROM account INNER JOIN student ON student.id=account.student_id WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$balance = $row['amount'];
?>
<!--start container-->
<div class="container" >
<h1 style="font-size: 30px; text-shadow: 2px 2px red; padding-left: 37px; color:darkgray;">MOI UNIV. MESS-FOOD ORDER RECEIPT </h1>
  <p style="font-size: 20px; color: white;">Estimated Receipt<span style="margin-left: 380px;"><a href="student-order.php" style="font-size: 20px; color: white;">continue buying</a></span></p>
  <div class="divider"></div>
  <div class="row">
    <div id="work-collections" class="seaction">
      <div class="row">
        <div style="background-color: white;">
          <ul id="issues-collection" class="collection">
            <?php
            echo '<li class="collection-item avatar">
            <i class="mdi-content-content-paste yellow circle"></i>
            <p><strong>NAME:</strong>'.$name.'</p>
            <p><strong>PHONE NO.:</strong>'.$phone.'</p>
            <p><strong>EMAIL ADDRESS:</strong> '.$email.'</p><br>
            <p><strong>DATE:</strong> '.$date.'</p><br><br>
            <a href="#" class="secondary-content"></a>';

            if(!empty($_SESSION["shopping_cart"]))
            {
              $total = 0;
              foreach($_SESSION["shopping_cart"] as $keys => $values)
              {
               $value=$values["item_quantity"];
               $key=$values["item_id"];
               $price=$values["item_price"];
               $subtotal=$values["item_quantity"]*$values["item_price"];
               $sql="SELECT* FROM menu WHERE menu_id=$key";
               $ses_sql = mysqli_query($conn, $sql);
               $row = mysqli_fetch_assoc($ses_sql);
               $menQty = $row['quantity'];
                $qty=$menQty-$value;

               echo '<li class="collection-item">
               <div class="row">
               <div class="col s7">
               <p class="collections-title"><strong>#'. $values["item_id"].' </strong>'.$values["item_name"].'</p>
               </div>
               <div class="col s1">
               <span>'.$values["item_quantity"].' pcs</span>
               </div>
               <div class="col s2">
               <span>Ksh. '.$subtotal.'</span>
               </div>
               <div class="col ">
               <span><a href="confirm-order.php?action=delete&id='. $values["item_id"].'"><span class="text-danger" title="remove"><i class="bi bi-trash-fill"></i></span></a></span></div></li>';



               $total = $total + $subtotal;
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

           $amount=$balance-$total;
           if ($balance<$total) {
            echo "<i>Oops!! Your balance is insuficient,Please make payment to continue ordering.</i>";
          }else
          echo '<div id="basic-collections" class="section">
          <div class="row">
          <div class="collection">
          <a href="#" class="collection-item" style="color:black;">
          <div class="row"><div class="col s7">CURRENT BALANCE:</div><div class="col s3">'.$balance.'</div></div>
          </a>
          <a href="#" class="collection-item " style="color:black;" >
          <div class="row" ><div class="col s7" >BALANCE AFTER PURCHASE:</div><div class="col s3">'.($balance-$total).'</div></div>
          </a>
          </div>
          </div>
          </div>';
          
          ?>
          <?php 
          //deleting item from cart and resetting product quantity.
          if(isset($_GET["action"]))
          {
           if($_GET["action"] == "delete")
           {
             foreach($_SESSION["shopping_cart"] as $keys => $values)
             {
              if($values["item_id"] == $_GET["id"])
              { 
                //delete item from order detail
                $itm_id=$_GET["id"];
                mysqli_query($conn,"delete from order_detail where item_id=$itm_id");
                  
                //resetting qty value in database.
                $itm_id=$_GET["id"];
                $set_qty=$menQty+$value;
                $new_total=$set_qty*$price;
                mysqli_query($conn,"update menu set quantity='$set_qty',total_price='$new_total' where  menu_id=$itm_id")or die(" incorrect query");

                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>window.location="confirm-order.php"</script>';
              }
            }
          }

                
        }
       if(empty($_SESSION["shopping_cart"]))
            { 
              echo '<script>window.location="empty-shopping-cart.php"</script>';
        }

        ?>
    
      <form action="order-router.php" method="post">
        <input type="hidden" name="customer_id" value="<?php echo $id;?>">
        <input type="hidden" name="name" value="<?php echo $name;?>">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="total" value="<?php echo $total;?>">
        <input type="hidden" name="amount" value="<?php echo $amount;?>">
        <!--storing cart variables in the table order-deatils with the particular user-->
         <?php
      if(!empty($_SESSION["shopping_cart"]))
            {
              foreach($_SESSION["shopping_cart"] as $keys => $values)
              {
               $value=$values["item_quantity"];
               $key=$values["item_id"];
               $price=$values["item_price"];
               $subtotal=$values["item_quantity"]*$values["item_price"];
               $sql="SELECT* FROM menu WHERE menu_id=$key";
               $ses_sql = mysqli_query($conn, $sql);
               $row = mysqli_fetch_assoc($ses_sql);
               $menQty = $row['quantity'];
                $qty=$menQty-$value;
                

                   ?>

        <input type="hidden" name="quantity" value="<?php echo $value;?>" >
         <input type="hidden" name="qty" value="<?php echo $qty;?>"  >
        <input type="hidden" name="item_id" value="<?php echo $key;?>" >
        <input type="hidden" name="price" value="<?php echo $price;?>" >

         <?php 
        

       }}?>
        <div class="input-field col s12">
          <div >
            <div style="position: fixed; bottom: 70px; right: 5px;">
              <button class="btn btn-big success" type="submit" name="submit" <?php if ($balance-$total < 0 ||$total<0) {echo 'disabled'; }?> style="background-color:#2d833f;color: white;width: 180px; "> CONFIRM ORDER >
        
              </button>
            </div>
          </form>
       
<?php 
?>

<!--Generating pdf of the confirm-order.php page-->
<?php

          if(isset($_POST["create_pdf"]))  
 {  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("mess management ststem");  
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
      
       $ht='<h3>MOI UNIVERSITY MESS-FOOD ORDER RECEIPT </h3>
       <p><strong>Customer Name:</strong>'.$name.'</p>
       <p><strong>Reg. No:</strong>'.$regNumber.'</p>
       <p><strong>Phone No:</strong>'.$phone.'</p>
       <p><strong>Email Address:</strong> '.$email.'</p>
       <p style="color:blue;"><strong>Order Number:</strong> '.$order_number.'</p>
       <p><strong>Date :</strong> '.$date.'</p>
       <br><br><br><br><br><br>';

      $ht .= '<table width="600px" border="none"><tr>
      <th>S/No.</th>
      <th>ITEM NAME</th>
       <th>ITEM QUANTITY</th>
      <th>UNIT PRICE</th>
      <th>SUB-TOTAL</th>
      </tr>';

      if(!empty($_SESSION["shopping_cart"]))
            {
              foreach($_SESSION["shopping_cart"] as $keys => $values)
              {
               $value=$values["item_quantity"];
               $iname=$values["item_name"];
               $key=$values["item_id"];
               $price=$values["item_price"];
               $subtotal=$values["item_quantity"]*$values["item_price"];
               $sql="SELECT* FROM menu WHERE menu_id=$key";
               $ses_sql = mysqli_query($conn, $sql);
               $row = mysqli_fetch_assoc($ses_sql);
               $menQty = $row['quantity'];
                $qty=$menQty-$value;

      $ht .= '
      <tr>
      <td>'.$key.'</td>
      <td>'.$iname.'</td>
       <td>'.$values["item_quantity"].'</td>
      <td>'.$price.'</td>
      <td>'.$subtotal.'</td>
      </tr>
      ';}}
      
      $ht .= '
      <tr>
      <td>Total</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>Ksh'.$total.'</td>
      </tr>
      ';

      $ht .= '</table>';
      $ht .='
      <p><strong>Account Balance:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ksh:'.($balance-$total).'</p>
          ';

      $obj_pdf->writeHTML($ht,true, true, false);
       ob_end_clean(); 
      $obj_pdf->Output('foodOrderReceipt.pdf', 'I');
       
         }

      ?> 
            
</body>
</html>



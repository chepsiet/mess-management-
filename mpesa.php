<!DOCTYPE html>
<html>
<head>
	<title>mpesa</title>
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
</head>
<body>
<img src="image/mpesa.jpeg" style="margin-left: 25%;" height="350">

<form class="contact2-form validate-form" action="lipaOnline.php" method="post" style="margin-left: 30%;">
  <h1><i>Make Payment</i></h1>
  <div class="wrap-input2 validate-input" data-validate="Amount is required">
  	<label style="font-weight: bold;">Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</label>
  	<input type="text" name="amount" placeholder="Ksh....."><br><br>
    <span class="focus-input2" data-placeholder="AMOUNT"></span>
  </div>
<div class="wrap-input2 validate-input" data-validate="Valid phone number is required: 07xxxxxxxx">
	<label style="font-weight: bold;">Phone Number</label>
  <input class="input2" type="tel" name="phone" placeholder="254xxxxxxxxx"><br><br>
  <span class="focus-input2" data-placeholder="MPESA PHONE NUMBER TO MAKE PAYMENT"></span>
</div>
<div class="container-contact2-form-btn">
  <div class="wrap-contact2-form-btn">
  <div class="contact2-form-bgbtn"></div>
  <button class="contact2-form-btn btn-success">COMPLETE PAYMENT</button>
</div>
</div>

</form>

</body>
</html>
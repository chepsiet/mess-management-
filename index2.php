<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <!-- Lipa na mpesa form-->

<form class="contact2-form validate-form" action="lipaOnline.php" method="post">
  <span class="contact2-form-title">
    Make payment
  </span>
  <div class="wrap-input2 validate-input" data-validate="Amount is required">
  	amout
  	<input type="text" name="amount">
    <span class="focus-input2" data-placeholder="AMOUNT"></span>
  </div>
<div class="wrap-input2 validate-input" data-validate="Valid phone number is required: 07xxxxxxxx">
  <input class="input2" type="tel" name="phone">
  <span class="focus-input2" data-placeholder="MPESA PHONE NUMBER TO MAKE PAYMENT"></span>
</div>
<div class="container-contact2-form-btn">
  <div class="wrap-contact2-form-btn">
  <div class="contact2-form-bgbtn"></div>
  <button class="contact2-form-btn">complete payment</button>
</div>
</div>

</form>
      

</body>
</html>
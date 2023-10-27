<?php
// Initialize the variables
$consumer_key = '3heEvYA11qogDnR2wUoLIRUcbtRDtlil';
$consumer_secret = 'a7dLbNDA6ecVoi3b';
$BusinessShortCode = '174379';
$tokenUrl = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$queryStatusUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
$LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$timestamp = date("Ymdhis");
$password = base64_encode($BusinessShortCode . $LipaNaMpesaPasskey . $timestamp);
$checkoutRequestID = $_POST['checkoutRequestID'];
 
// Generate the auth token
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $tokenUrl);
$credentials = base64_encode($consumer_key . ':' . $consumer_secret);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$curl_response = curl_exec($curl);
 
$token = json_decode($curl_response)->access_token;
 
//Query the transaction
$curl2 = curl_init();
curl_setopt($curl2, CURLOPT_URL, $queryStatusUrl);
curl_setopt($curl2, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token));
 
 
$curl2_post_data = array(
    'BusinessShortCode' => $businessShortCode,
    'Password' => $password,
    'Timestamp' => $timestamp,
    'CheckoutRequestID' => $checkoutRequestID
);
 
$data2_string = json_encode($curl2_post_data);
 
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl2, CURLOPT_POST, true);
curl_setopt($curl2, CURLOPT_POSTFIELDS, $data2_string);
curl_setopt($curl2, CURLOPT_HEADER, false);
 
$curl2_response = json_decode(curl_exec($curl2));
echo $curl2_response;
?>
<?php
session_start();
$context = stream_context_create([
    'ssl' => [
        // set some SSL/TLS specific options
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);
$MerchantID = '44141656-6b9c-11e6-a58a-000c295eb8fc'; //Required
$Amount = $_GET['service']*1000; //Amount will be based on Toman - Required
$Description = 'خرید از لیچ تیوب'; // Required
$Email = $_SESSION['login_user']; // Optional
$CallbackURL = 'http://localhost/verify.php'; // Required
$_SESSION['hajm']=$Amount;

$client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8',
'stream_context' => $context]);


$result = $client->PaymentRequest(
[
'MerchantID' => $MerchantID,
'Amount' => $Amount,
'Description' => $Description,
'Email' => $Email,
'Mobile' => $Mobile,
'CallbackURL' => $CallbackURL,
]
);

//Redirect to URL You can do it also by creating a form
if ($result->Status == 100) {
Header('Location: https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
} else {
echo'ERR: '.$result->Status;
}

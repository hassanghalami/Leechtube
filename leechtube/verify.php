
<?php
require 'func.php';
include('inc.html');
use \RedBeanPHP\R;

$context = stream_context_create([
    'ssl' => [
        // set some SSL/TLS specific options
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);


$MerchantID = '44141656-6b9c-11e6-a58a-000c295eb8fc';
$Amount = $_SESSION['hajm']; //Amount will be based on Toman
$_SESSION['hajm']=NULL;
$Authority = $_GET['Authority'];

if ($_GET['Status'] == 'OK') {

  $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8',
  'stream_context' => $context]);

$result = $client->PaymentVerification(
[
'MerchantID' => $MerchantID,
'Authority' => $Authority,
'Amount' => $Amount,
]
);

if ($result->Status == 100) {
  $usercheck  = R::findOne( 'users', ' userd = ? ', [ $_SESSION['login_user'] ] );
     $hajm=R::dispense('hajm');
     $hajm->uid=$usercheck->userd;
     $hajm->hajm=$Amount;
     $hajm->expire=strtotime("now")+2678400;
     R::store($hajm);
echo '<center>خرید شما با موفقیت انجام شد ';
echo "هم اکنون به صفحه ی اصلی منتقل خواهید شد";
header("refresh:4;url=/",false);

} else {
echo '<center>خرید شما با شکست روبرو شد:'.$result->Status;
echo "هم اکنون به صفحه ی اصلی منتقل خواهید شد";
header("refresh:4;url=/",false);
}
} else {
echo '<center>عدم موفقیت در خرید';
echo "هم اکنون به صفحه ی اصلی منتقل خواهید شد";
header("refresh:4;url=/",false);
}

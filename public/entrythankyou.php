<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>IDMA-2018 Payment Success</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">

      <div class="page-header">
        <h1><a href="index.php">IDMA-2018 Payment Details</a></h1>
        <p class="lead">Thank you for your participation for IDMA-2018 we have included a copy of your order below.</p>
      </div>

      <h3 style="color:#6da552">Thank You</h3>
  

 <?php

include 'src/instamojo.php';
  

$api = new Instamojo\Instamojo('48f6c65e1060019a31c9f2162b61a2a3', '318a4a3543e5bfafcc8110c681690e15','https://www.instamojo.com/api/1.1/');
$payid = $_GET["payment_request_id"];

try {
    $response = $api->paymentRequestStatus($payid);
    $date = $response['payments'][0]['created_at'];
    $dt = explode('T',$date);
    $tm = explode('.',$dt[1]);

if($response['payments'][0]['status']=='Credit'){
    echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
    echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;
    echo "<h4>Transaction Status: " . $response['payments'][0]['status'] . "</h4>" ;
    echo "<h4>Transaction Date: " .$dt[0]. "</h4>" ;
    echo "<h4>Transaction Timing: " .$tm[0]  . "</h4>" ;


$servername = "35.200.252.218";
$username = "root";
$password = "@techadmin123";
$dbname = "e4mevents";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $phone = $response['phone'];
    $Category=$response['purpose'];
    $amount = $response['amount'];
    $payment_id = $response['payments'][0]['payment_id'];
    $payment_option = $response['payments'][0]['instrument_type'];
    $dcdate = $response['payments'][0]['created_at'];
    $email= $response['payments'][0]['buyer_email'];
    $status= $response['payments'][0]['status'];
    $pname = $response['payments'][0]['buyer_name'];
    $data = "SELECT * FROM tbl_idma_2018_payment where email='$email'";
    $result = $conn->query($data);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                
                $id = $row["id"];
                   $sql = "UPDATE tbl_idma_2018_payment SET txnid='$payment_id', status='1' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
error_reporting(E_ALL);
ini_set('display_errors', '1');
include 'PHPMailer.php';
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "techadmin@exchange4media.com";
$mail->Password = "admin@tech123";
$mail->SetFrom("techadmin@exchange4media.com");
$mail->Subject = 'Order No. '.$row["orderid"].' FROM  IDMA 2018';
$mail->Address = "aakash.e4mnew@gmail.com";
$mail->AddCC('sabita.verma@exchange4media.com', 'sabita.verma');
$mail->AddCC('nikita.vig@exchange4media.com', 'nikita vig');
$mail->AddCC('gluthra@exchange4media.com', 'Gaurav Luthra');
$mail->AddCC('priyanka.bhadouria@exchange4media.com', 'priyanka');
$mail->AddCC('aakash.e4mnew@gmail.com', 'aakash');
$mail->AddCC('ksbatra@exchange4media.com', 'Khusboo Batra');
$mail->AddCC('aditya.muvvala@exchange4media.com', 'Aditya Muvvala');
$mail->Body = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Confirmation</title>
</head>

<body>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#58595b;">
  <tr>
    <td valign="top" align="center">
    <table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="https://e4mevents.com/idma-2018/public/img/header.jpg" /></td>
  </tr>
  <tr>
    <td style="padding:0 10px 10px 10px; background:#25484d;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background:#edeff0; padding:10px; text-align:justify;">
    
    
<p>Dear'.$pname.',</p>
<p>
Thank you for your participation for e4m Indian Digital Media Awards (IDMA) &amp; TechManch 2018. For your convenience, we have included a copy of your order below.</p>
<p>
<strong>Please Note:</strong>- The charge will appear on your credit card as "Adsert Web Solutions Pvt. Ltd.". If you have a question about your order status, you can contact directly by e-mail at : <a href="mailto:nikita.vig@exchange4media.com" style="color:#002467;">nikita.vig@exchange4media.com</a>.</p>
</td>
  </tr>
  <tr>
    <td style="background:#ffffff; padding:10px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td>
    
    <table width="100%" border="0" cellspacing="4" cellpadding="5">
  <tr>
    <td colspan="2" valign="bottom"><strong>PAYMENT DETAILS</strong></td>
    </tr>
  <tr>
    <td style="background:#f2f5f8;">Site URL  </td>
    <td style="background:#f2f5f8;">https://e4mevents.com/idma-2018/</td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">Order ID </td>
    <td style="background:#f2f5f8;">'.$row["orderid"].'</td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">Payment id</td>
    <td style="background:#f2f5f8;">'.$payment_id.'</td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">Order Received</td>
    <td style="background:#f2f5f8;">'.$row["created_at"].'</td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">No of Entry </td>
    <td style="background:#f2f5f8;">'.$row["entryno"].'</td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">Total Amount</td>
    <td style="background:#f2f5f8;">'.$row["totalamount"].'</td>
  </tr>
</table>
<tr><td>
<table width="100%" border="0" cellspacing="4" cellpadding="5">
  <tr>
    <td colspan="2" valign="bottom"><strong>CUSTOMER DETAILS</strong> </td>
    </tr>
  <tr>
    <td style="background:#f2f5f8;">Customers Name </td>
    <td style="background:#f2f5f8;">'.$pname.'</td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">Company Name</td>
    <td style="background:#f2f5f8;">'.$row["company"].' </td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">GST IN</td>
    <td style="background:#f2f5f8;">'.$row["gstdata"].' </td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">Billing Address</td>
    <td style="background:#f2f5f8;">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td style="background:#f2f5f8;">&nbsp;'.$row["baddress1"].'</td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">&nbsp;'.$row["baddress2"].'</td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">Contact Number</td>
    <td style="background:#f2f5f8;">+'.$row["bmobile"].'</td>
  </tr>
  <tr>
    <td style="background:#f2f5f8;">E-mail ID: </td>
    <td style="background:#f2f5f8;">'.$row["bemail"].'</td>
  </tr>
</table>
    </td></tr>
    <tr>
    <td align="center" style="padding:20px; 10px 10px 10px">
    <img src="https://e4mevents.com/idma-2018/public/img/e4mlogo.png" /> <img src="https://e4mevents.com/idma-2018/public/img/tw.png" /> <img src="https://e4mevents.com/idma-2018/public/img/fb.png" />
    </td>
    </tr>
    </table>
    </td>
  </tr>
</table>
    </td>
  </tr>
</table>
    </td>
  </tr>
</table>
</body>
</html>';
$mail->AddAddress($email);
 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    
 }
    } else {
        
    }
// var_dump($sql);exit();
            }
        } else {
            
        }
   
    

$conn->close();


  
}else{

    echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
    echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;
    echo "<h4>Transaction Status: " . $response['payments'][0]['status'] . "</h4>" ;
    echo "<h4>Transaction Date: " .$dt[0]. "</h4>" ;
    echo "<h4>Transaction Timing: " .$tm[0]  . "</h4>" ;
    echo "<h4>Reason: " . $response['payments'][0]['failure']['reason'] . "</h4>" ;

}

    


//echo "<pre>";
//    print_r($response);
//echo "</pre>";

    

    ?>


    <?php
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}



  ?>


      
    </div> <!-- /container -->


  </body>
</html>
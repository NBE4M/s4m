<?php
$servername = "35.200.252.218";
$username = "root";
$password = "@techadmin123";
$dbname = "e4mevents";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$cip = $_POST['cip'];
$oid = $_POST['oid'];
$uid = $_POST['uid'];
$amount = $_POST['chargetotal'];
$txtNumberOfEntries = $_POST['entry'];
$return_url = $_POST['responseSuccessURL'];
$webhook = $_POST['webhook'];
$name = $_POST['name'];
$companyname = $_POST['company'];
$designation = $_POST['designation'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$address3 = $_POST['address3'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zipcode = $_POST['zipcode'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$bname = $_POST['bname'];
$description = ' Online payment';
$bcompany = $_POST['bcompany'];
$bdesignation = $_POST['bdesignation'];
$baddress1 = $_POST['baddress1'];
$baddress2 = $_POST['baddress2'];
$baddress3 = $_POST['baddress3'];
$bcity = $_POST['bstate'];
$bstate = $_POST['bstate'];
$bcountry = $_POST['bcountry'];
$bzipcode = $_POST['bzipcode'];
$bmobile = $_POST['bmobile'];
$bemail = $_POST['bemail'];
$gstdata = $_POST['gstdata'];
$date = date('y-m-d');
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO tbl_idma_2018_payment (uid,entryno,name,company,designation,address1, address2,address3,city,state,country,
        zipcode,mobile,email,bname,bcompany,bdesignation,baddress1,baddress2,baddress3,bcity,bstate,bcountry,bzipcode,bmobile,bemail, totalamount,orderid,txnid,clientip,status,gstdata)
        VALUES ('$uid','$txtNumberOfEntries','$name','$companyname','$designation','$address1','$address2','$address3','$city','$state','$country','$zipcode','$mobile','$email','$bname','$bcompany','$bdesignation','$baddress1','$baddress2','$baddress3','$bcity','$bstate','$bcountry','$bzipcode','$bmobile','$bemail','$amount','$oid','0','$cip','0','$gstdata')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo '<script type="text/javascript">alert("The email address you have entered is already registered");history.go(-1);</script>';die;
    }

include 'src/instamojo.php';
$api = new Instamojo\Instamojo('48f6c65e1060019a31c9f2162b61a2a3', '318a4a3543e5bfafcc8110c681690e15','https://www.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $description,
        "amount" => $amount,
        "name" => $name,
        "phone" => $mobile,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => $return_url,
        "webhook" => $webhook,
        ));
    
    $pay_ulr = $response['longurl'];
     
   
    
header("Location: $pay_ulr");
exit();
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

?>
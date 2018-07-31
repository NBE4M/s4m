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


$oid = $_POST['oid'];
$cip = $_POST['cip'];
$amount = $_POST['totalamount'];
$gstamount = $_POST['gstamount'];
$txtNumberOfEntries = $_POST['entry'];
$return_url = $_POST['responseSuccessURL'];
$webhook = $_POST['webhook'];
$name = $_POST['name'];
$companyname = $_POST['companylegname'];
$description = ' Online payment';
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['mobile'];
$gst = $_POST['gst_no'];
$del_fees = $_POST['del_fees'];
$del_type = $_POST['del_type'];
$date = date('y-m-d');
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO tbl_idma_2018_deluserpayment (OrderNo, name, Email,Organisation, Mobileno, Address, Amount, numberofentries,clientip,gst,pdate,txn_id,delegate_Pass_category,Delegate_Type)
        VALUES ('$oid','$name', '$email', '$companyname','$phone' ,'$address' ,'$amount','$txtNumberOfEntries','$cip','$gst','$date',0,'$del_fees','$del_type')";
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
        "phone" => $phone,
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
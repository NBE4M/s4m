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

    <title>Payment Gateway</title>

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
        <h1><a href="index.php">Instamojo Payment Gateway</a></h1>
        <p class="lead">A test payment integration for instamojo payment gateway.</p>
      </div>

		<p>
		<b>Award Name :</b> <?= $_POST['description'] ?>		</p>
    <b>No. of Entry :</b> <?= $_POST['txtnoofentry'] ?>    </p>
		<p>
		<b>Amount : </b> <?= $_POST['txtbeforeamt'] ?>		</p>
		<p><b>GST Tax (18%): </b>   <?= $_POST['txttaxamt'] ?></p>

		<p><b>Total Amount: </b> <?= $_POST['amount'] ?></p>

		<h3>Your Payment Details </h3>
		<hr>
		<form action="pay.php" method="POST" accept-charset="utf-8">
	
		<input type="hidden" name=" __VIEWSTATE" value="<?= $_POST['__VIEWSTATE'] ?>"> 
		<input type="hidden" name="__VIEWSTATEGENERATOR" value="<?= $_POST['__VIEWSTATEGENERATOR'] ?>"> 
    <input type="hidden" name="txtnoofentry" value="<?= $_POST['txtnoofentry'] ?>"> 
    <input type="hidden" name="txtbeforeamt" value="<?= $_POST['txtbeforeamt'] ?>"> 
    <input type="hidden" name="txttaxamt" value="<?= $_POST['txttaxamt'] ?>"> 
    <input type="hidden" name="amount" value="<?= $_POST['amount'] ?>"> 
    <input type="hidden" name="txtNumberOfEntries" value="<?= $_POST['txtNumberOfEntries'] ?>"> 
    <input type="hidden" name="channel" value="<?= $_POST['channel'] ?>"> 
    <input type="hidden" name="account_id" value="<?= $_POST['account_id'] ?>"> 
    <input type="hidden" name="reference_no" value="<?= $_POST['reference_no'] ?>"> 
    <input type="hidden" name="display_currency" value="<?= $_POST['display_currency'] ?>"> 
    <input type="hidden" name="display_currency_rates" value="<?= $_POST['display_currency_rates'] ?>">
    <input type="hidden" name="description" value="<?= $_POST['description'] ?>"> 
    <input type="hidden" name="return_url" value="<?= $_POST['return_url'] ?>"> 
    <input type="hidden" name="mode" value="<?= $_POST['mode'] ?>">  
    <input type="hidden" name="payment_mode" value="<?= $_POST['payment_mode'] ?>"> 
    <input type="hidden" name="card_brand" value="<?= $_POST['card_brand'] ?>"> 
     <input type="hidden" name="payment_option" value="<?= $_POST['payment_option'] ?>">
      <input type="hidden" name="card_brand" value="<?= $_POST['card_brand'] ?>">
       <input type="hidden" name="bank_code" value="<?= $_POST['bank_code'] ?>">
        <input type="hidden" name="emi" value="<?= $_POST['emi'] ?>">
         <input type="hidden" name="page_id" value="<?= $_POST['page_id'] ?>">
          <input type="hidden" name="lastname" value="<?= $_POST['lastname'] ?>">
           <input type="hidden" name="companyname" value="<?= $_POST['companyname'] ?>">
     <input type="hidden" name="gst" value="<?= $_POST['gst'] ?>">
      <input type="hidden" name="address" value="<?= $_POST['address'] ?>">
       <input type="hidden" name="city" value="<?= $_POST['city'] ?>">
        <input type="hidden" name="state" value="<?= $_POST['state'] ?>">
        <input type="hidden" name="postal_code" value="<?= $_POST['postal_code'] ?>">
        <input type="hidden" name="country" value="<?= $_POST['country'] ?>">
        <input type="hidden" name="ship_name" value="<?= $_POST['ship_name'] ?>">
        <input type="hidden" name="ship_address" value="<?= $_POST['ship_address'] ?>">
        <input type="hidden" name="ship_city" value="<?= $_POST['ship_city'] ?>">
        <input type="hidden" name="ship_state" value="<?= $_POST['ship_state'] ?>">
        <input type="hidden" name="ship_postal_code" value="<?= $_POST['ship_postal_code'] ?>">
        <input type="hidden" name="ship_country" value="<?= $_POST['ship_country'] ?>">
        <input type="hidden" name="ship_phone" value="<?= $_POST['ship_phone'] ?>">
        <input type="hidden" name="drpoption" value="<?= $_POST['drpoption'] ?>">
        <input type="hidden" name="issue_bank" value="<?= $_POST['issue_bank'] ?>">
        <input type="hidden" name="draftcno" value="<?= $_POST['draftcno'] ?>">
        <input type="hidden" name="dcdate" value="2001-01-01">
        

		<div class="form-group">
    	<label>Your Name</label>
   		<input type="text" class="form-control" name="name" value="<?= $_POST['name'] ?>">	 <br/>
		</div>

		<div class="form-group">
    	<label>Your Phone</label>
   		<input type="text" class="form-control" name="phone" value="<?= $_POST['phone'] ?>"> <br/>
		</div>


		<div class="form-group">
    	<label>Your Email</label>
   		<input type="email" class="form-control" name="email" value="<?= $_POST['email'] ?>"> <br/>
		</div>

	  
		<input type="submit" class="btn btn-success btn-lg" value="Click here to Pay Rs:<?= $_POST['amount'] ?> ">

		 </form>
 <br/>
  <br/>     
    </div> <!-- /container -->


  </body>
</html>

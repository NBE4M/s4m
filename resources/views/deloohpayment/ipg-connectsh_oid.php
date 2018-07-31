<?php include("ipg-util.php");
$cnt=0;
if(isset($_POST['SubmitButton']))  //check if form was submitted
	{
?>
<html>
	<head>
		<title>IPG Connect Sample for PHP(hashing)</title>
	</head>
	<body onload="document.frm1.submit()">

		<?php
		$responseSuccessURL = "http://e4mevents.com/paymenttest/response_success.php"; //Need to change as per location of response page
		$responseFailURL = "http://e4mevents.com/paymenttest/response_fail.php";       //Need to change as per location of response page
		$CT = $_POST['CT'];
		$txntype = $_POST['txntype'];
		$currency = $_POST['currency'];
		$mode = $_POST['mode'];
		$storename = $_POST['storename'];
		$sharedsecret = $_POST['sharedsecret'];
		$oid = $_POST['oid'];

		?>

			<form method="post" name="frm1" action="https://www4.ipg-online.com/connect/gateway/processing">
			<input type="hidden" name="timezone" value="IST" />
			<input type="hidden" name="authenticateTransaction" value="true" />
			<input size="50" type="hidden" name="txntype" value="<?php echo $txntype ?>"  />
			<input size="50" type="hidden" name="txndatetime" value="<?php echo getDateTime(); ?>"  />
			<input size="50" type="hidden" name="hash" value="<?php echo createHash($CT,"356",$storename,$sharedsecret); ?>"  />
			<input size="50" type="hidden" name="currency" value="<?php echo $currency ?>"  />
			<input size="50" type="hidden" name="mode" value="<?php echo $mode ?>"  />
			<input size="50" type="hidden" name="storename" value="<?php echo $storename ?>"  />
			<input size="50" type="hidden" name="chargetotal" value="<?php echo $CT ?>"  />
			<input size="50" type="hidden" name="sharedsecret" value="<?php echo $sharedsecret ?>"  />
			<input size="50" type="hidden" name="oid" value="<?php echo $oid ?>"  />
			<input type="hidden" name="responseSuccessURL" value="<?php echo $responseSuccessURL ?>"  />
			<input type="hidden" name="responseFailURL" value="<?php echo $responseFailURL ?>"  />
			<input type="hidden" name="hash_algorithm" value="SHA1"/>

</form>
</body>
</html>

<?php
$cnt++;
}
if($cnt==0)
{
?>
<form action="" method="post">
<head>
		<title>IPG Connect Sample for PHP(hashing)</title>
			</head>
			<body>
				<p>
				<h1>
					Order Form
				</h1>
				<table>
				<tr>

					<td>Enter Chargetotal </td>
					<td><input type="text"  name="CT"  style="width: 150px;" value="1"/> </td>
				</tr>
				<tr>
					<td>
						Transaction Type
					</td>
					<td>
						<input size="50" type="text" name="txntype" value="sale"  />
					</td>
				</tr>
				<tr>
					<td>
						Transaction Date Time
					</td>
					<td>
						<input size="50" type="text" name="txndatetime" value="<?php echo getDateTime(); ?>" readonly />
					</td>
				</tr>
				<tr>
					<td>
						Currency
					</td>
					<td>
						<input size="50" type="text" name="currency" value="356"  />
					</td>
				</tr>
				<tr>
					<td>
						Payment Mode
					</td>
					<td>
						<input size="50" type="text" name="mode" value="payonly"  />
					</td>
				</tr>
				<tr>
					<td>
						Store Id
					</td>
					<td>
						<input size="50" type="text" name="storename" value="3300002935"  />
					</td>
				</tr>

				<tr>
					<td>
						Shared Secret
					</td>
					<td>
						<input size="50" type="text" name="sharedsecret" value="LuZFrbuh>0Doi"  />
					</td>
				</tr>

				<td>
					Order ID
					</td>
					<td>
									<input size="50" type="text" name="oid" value="pg<?php echo rand()."" ?>"/>
					</td>

				<tr>
				<tr>
					<td>
						Language
					</td>
					<td>
						<select name="language">
							<option value="de_DE">Deutsch</option>
							<option value="en_EN" selected>English</option>
						</select>
					</td>
				</tr>
				<tr><td></td><td><input type="submit" name="SubmitButton" value="Submit"/></td></tr>
				</table>
</form>

<?php
}
?>



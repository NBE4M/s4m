<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCheque extends Model
{
     protected $table = 'tbl_idma_2018_chequepayment';
	 protected $fillable = [
        'uid', 'OrderNo','Name','Email','Organisation', 'MobileNo','Address','ChequeNo','BankName','Remark',
		'Amount','username','numberofentries','gst','pdate','status'];
}

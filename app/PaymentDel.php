<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDel extends Model
{
     protected $table = 'tbl_ooh_2018_deluserpayment';
	protected $fillable = ['OrderNo','Name','Email','Organisation', 'MobileNo','Address','ChequeNo','BankName','Remark',
		'Amount','numberofentries','gst','pdate','status'];
}

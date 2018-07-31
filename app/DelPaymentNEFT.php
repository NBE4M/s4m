<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DelPaymentNEFT extends Model
{
    protected $table = 'tbl_idma_2018_delneftpayment';
	protected $fillable = ['OrderNo','Name','Email','Organisation', 'MobileNo','Address','ChequeNo','BankName','Remark',
		'Amount','numberofentries','gst','pdate','status','delegate_Pass_category','Delegate_Type'];
}

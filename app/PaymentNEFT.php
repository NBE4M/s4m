<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentNEFT extends Model
{
     protected $table = 'tbl_idma_2018_neftpayment';
	 protected $fillable = [
        'uid', 'OrderNo','Name','Email','Organisation', 'MobileNo','Address',
		'Amount','username','numberofentries','gst','pdate','status'];
}

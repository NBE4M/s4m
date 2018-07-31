<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     protected $table = 'tbl_idma_2018_payment';
	 protected $fillable = [
        'uid', 'name','company','designation','address1', 'address2','address3','city','state','country',
		'zipcode','mobile','email','bname','bcompany','bdesignation','baddress1','baddress2','baddress3','bcity','bstate','bcountry','bzipcode','bmobile','bemail', 'totalamount','orderid','txnid','clientip','status','gstdata'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Delegate extends Model
{
    protected $table = 'tbl_idma_2018_deluserpayment';
    protected $fillable = ['remember_token','name','email','info','companylegname', 'gst_no','address','city','state','ctry','pin_code','del_name_compy','fee_option','num_del','amount','gst','chargetotal','pay_mode', 'mobile','office_num'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
     protected $table    =   'tbl_idma_2018_category'; 
	 protected $primaryKey   =   'categoryid';
	 
	  protected $fillable = [
       'categoryid', 'categoryname','flag','password', 'update_at','created_at'
    ];
	public function Subcategory()
	{
			return $this->hasMany('App\Subcategories','categoryid');
		   // return $this->hasMany('App\Subcategories', 'catid','sub_catid');
	}
   
}

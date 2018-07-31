<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Entry extends Model
{	
	 protected $table = 'tbl_idma_2018_entry';
	public  function Subcatid ($id)
	{
		return DB::table('tbl_idma_2018_category_entry')->select('SubCatId')->where('eid',$id)->get();		
	}
}

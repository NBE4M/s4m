<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juryrecentry extends Model
{
     protected $table = 'tbl_idma_2018_juryrecusedentry';
	 protected $fillable = ['entryid','cat_entry_id', 'juryid','rdate','etype','comment'];
}

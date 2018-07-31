<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategories extends Model
{
    protected $table    =   'tbl_idma_2018_subcategory';           //Table Name
    protected $primaryKey   =   'subcategoryid';         //Table Name
    public $timestamps  =   false;
}

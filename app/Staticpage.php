<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staticpage extends Model
{
    protected $table = 'static_pages';
    protected $fillable = ['title','slug','short_story','full_story','meta_title','meta_description','publish_date','user_id'];
  
}
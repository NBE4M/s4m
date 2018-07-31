<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = "tbl_idma_2018_users";
    use Notifiable;
 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'title', 'fname','lname','email','password', 'user_pass','mobile','designation', 'department','organization','phone','companylegalname', 'companyaddress','city','Pincode','gst','twiterh','Facebook','stitle','sname','sdesignation','sLandlineno','smobile','semail', 'howtohear',
       'role','name', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

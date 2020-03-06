<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function articleCount()
    {
      return $this->hasMany('App\Models\Article','category_id','id')->count();
    }                         // baglanacagımız model   baglanacagımız modelın sutunu    suanda ki baglanıcak sutun
}

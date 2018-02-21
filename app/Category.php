<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='tbl_categories';
    public function product(){
        return $this->hasMany('App\Product');
    }
}

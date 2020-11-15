<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['status_name'];

    public function Product()
    {
        return $this->hasMany('App\Product');
    }
}

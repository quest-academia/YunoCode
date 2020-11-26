<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','promotion','overview','main_image','sub_image1','sub_image2','sub_image3','price','category_id','status_id'];
    
      public function category()
      {
        return $this->belongsTo('App\Category');
      }

      public function status()
      {
        return $this->belongsTo('App\status');
      }
}

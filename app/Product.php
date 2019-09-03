<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = ['id','code','name','unit','size','cost','price',
    'alert_quantity','image','category_id','subcategory_id','cf1','cf2'
    ,'cf3','cf4','cf5','cf6','quantity','tax_rate','track_quantity','details'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_products')->withPivot('quantity', 'price');
    }

//    public function
}

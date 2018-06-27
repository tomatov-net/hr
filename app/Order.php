<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'client_email',
        'partner_id',
        'delivery_dt',
    ];

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products')->withPivot('quantity', 'price');
    }

    public function getStatusTitleAttribute()
    {
        if($this->status == 0){
            return 'новый';
        }
        elseif($this->status == 10){
            return 'подтвержден';

        }
        elseif($this->status == 20){
            return 'завершен';
        }
        else{
            return $this->status;
        }
    }

    public static function getStatuses()
    {
        return [
            0 => 'новый',
            10 => 'подтвержден',
            20 => 'завершен',
         ];
    }

    public function calculateCost()
    {
        $result = 0;

        if($this->products){
            foreach ($this->products as $product) {
                $result += $product->pivot->quantity * $product->pivot->price;
            }
        }

        return $result;
    }

    public function scopeOverdue($q)
    {
        return $q->where('delivery_dt', '<', now())
            ->where('status', 10)
            ->orderBy('delivery_dt', 'desc')
            ->take(50);
    }

    public function scopeCurrent($q)
    {
        return $q->whereBetween('delivery_dt', [now(), now()->addHours(24)])
            ->where('status', 10)
            ->orderBy('delivery_dt', 'asc');
    }

    public function scopeNew($q)
    {
        return $q->where('delivery_dt', '>', now())
            ->where('status', 0)
            ->orderBy('delivery_dt', 'asc')
            ->take(50);
    }

    public function scopeFinished($q)
    {
        return $q->whereBetween('delivery_dt', [now()->subHours(24), now()])
            ->where('status', 20)
            ->orderBy('delivery_dt', 'desc')
            ->take(50);
    }



}

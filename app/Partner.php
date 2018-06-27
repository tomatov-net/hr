<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Partner extends Model
{
    use Notifiable;

    public function orders()
    {
        return $this->belongsTo('App\Order');
    }
}

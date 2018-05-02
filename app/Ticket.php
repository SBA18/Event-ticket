<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\User;
use App\Paiement;

class Ticket extends Model
{
    protected $fillable = [
        'user_id', 'uuid', 'number', 'event_id', 'persons', 'total_price',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paiement()
    {
        return $this->belongsTo(Paiement::class);
    }
}

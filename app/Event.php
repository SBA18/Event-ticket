<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Salle;
use App\EventType;
use App\User;
use App\Ticket;

class Event extends Model
{
    protected $fillable = [
        'user_id', 'uuid', 'number', 'name', 'event_type_id', 'salle_id', 'start_at', 'end_at', 'short_desc', 'long_desc', 'price',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }


    public function event_type()
    {
        return $this->belongsTo(EventType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Salle extends Model
{
    protected $fillable = [
        'user_id', 'uuid', 'name', 'location', 'seats', 'status',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function events()
    {
       return $this->hasMany(Event::class);
    }
}

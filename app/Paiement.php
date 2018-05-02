<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;

class Paiement extends Model
{
    protected $fillable = [
        'uuid', 'ticket_id', 'type', 'amount',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}

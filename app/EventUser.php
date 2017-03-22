<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $fillable = [
        'user_id', 'event_id'
    ];

    protected $table = 'event-users';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function events()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }

}

<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user(){
        return $this->belongsToMany('App\User','event-users');
    }

    protected $fillable = [
        'title', 'description', 'place','date_and_time',
        'image', 'event_id'
    ];

    public function getDate_and_timeAtribute($date){
        return Carbon::createFromFormat('d/m/Y H:m',$date);
    }

    protected $primaryKey = 'event_id';
}

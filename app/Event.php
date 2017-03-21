<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'on_update' => true,
            ]
        ];
    }


    public function user(){
        return $this->belongsToMany('App\User','event-users');
    }

    protected $fillable = [
        'title', 'description', 'place','date_and_time',
        'image', 'event_id','slug'
    ];

    public function getDate_and_timeAtribute($date){
        return Carbon::createFromFormat('d/m/Y H:m',$date);
    }

    protected $primaryKey = 'event_id';
}

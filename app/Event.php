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
    //ZA URL PRIKAZ NASLOVA RADI SEO OPTIMIZACIJE
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'on_update' => true,
            ]
        ];
    }


    public function users(){
        return $this->belongsToMany('App\User','event-users');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function numEvents(){
        return $this->belongsToMany('App\EventUser');
    }


    protected $fillable = [
        'title', 'description', 'place','date_and_time',
        'image', 'event_id','slug'
    ];
    //ZA PRIKAZ SRPSKOG FORMATA DATUM I BEZ SEKUNDI
    public function getDate_and_timeAtribute($date){
        return Carbon::createFromFormat('d/m/Y H:m',$date);
    }

    protected $primaryKey = 'event_id';
}

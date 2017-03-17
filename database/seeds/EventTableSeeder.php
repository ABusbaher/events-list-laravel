<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new \App\Event(['title'=>'Exit festival',
            'description'=>'Najveći muzički festival u jugoistočnoj Evropi održava se već 18 godina',
            'date_and_time'=>'2017-07-28 21:00:00',
            'place'=>'Novi Sad']);
        $event->save();
        $event = new \App\Event(['title'=>'Gitarijada',
            'description'=>'Zaječarska gitarijada je letnji muzički festival, orijentisan prvenstveno na rok muziku, koji se održava jednom godišnje u Srbiji, u gradu Zaječaru.',
            'date_and_time'=>'2017-08-25 20:00:00',
            'place'=>'Zaječar']);
        $event->save();
    }
}

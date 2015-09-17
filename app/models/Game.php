<?php

use \Esensi\Model\SoftModel;

class Game extends SoftModel {
    protected $table = 'games';
	
    protected $fillable = [
        'game_title',
        'genre',
        'device'
    ];

    public function events()
    {
        return $this->hasMany('CalendarEvent');
    }
}
<?php

use \Esensi\Model\Model;

class Game extends Model {
    protected $table = 'games';
	
    protected $fillable = [
        'game_title',
        'genre',
        'device'
    ];

    public function events()
    {
        return $this->belongsToMany('CalendarEvent')->withTimestamps();
    }
}
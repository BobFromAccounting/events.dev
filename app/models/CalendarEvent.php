<?php

use \Esensi\Model\SoftModel;

class CalendarEvent extends SoftModel {
    protected $table = 'calendar_events';

    protected $fillable = [
        'start_time',
        'end_time',
        'title',
        'description',
        'price'
    ];

    protected $rules = array(
            'start_time'  => 'required|date_format:Y-m-d h:i:s',
            'end_time'    => 'required|date_format:Y-m-d h:i:s',
            'title'       => 'required|max:255',
            'description' => 'required|min:5|max:255',
            'price'       => 'numeric|min:0|max:20'
    );

    protected $jugglable = array(
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    );

    public function creator()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function location()
    {
        return $this->belongsTo('Location');
    }

    public function game()
    {
        return $this->belongsTo('Game');
    }
}
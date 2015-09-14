<?php

use \Esensi\Model\Model;

class CalendarEvent extends Model {
    protected $table = 'calendar_events';

    protected $fillable = [
        'start_time',
        'end_time',
        'title',
        'description',
        'price'
    ];

    protected $rules = array(
            'start_time'  => 'required|date_format:Y-m-d H:i:s',
            'end_time'    => 'required|date_format:Y-m-d H:i:s',
            'title'       => 'required|max:255',
            'description' => 'required|min:5|max:255',
            'price'       => 'numeric|min:0'
    );

    // public function getDates()
    // {
    //     return array_merge(parent::getDates(), 'start_time', 'end_time');
    // }

    public function creator()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function location()
    {
        return $this->belongsTo('Location');
    }

    public function games()
    {
        return $this->belongsToMany('Game')->withTimestamps();
    }
}
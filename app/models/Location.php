<?php

use \Esensi\Model\SoftModel;

class Location extends SoftModel {
    protected $table = 'locations';

    protected $fillable = [
        'title',
        'address',
        'city',
        'state',
        'zip'
    ];

    protected $rules = array(
            'title'   => 'required|max:255',
            'address' => 'required|max:255',
            'city'    => 'required|max:255',
            'state'   => 'required',
            'zip'     => 'required|numeric'
    );

    public function calendarEvents()
    {
        return $this->hasMany('CalendarEvent');
    }
}
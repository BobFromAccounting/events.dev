<?php

use \Esensi\Model\Model;

class Location extends Model {
    protected $table = 'locations';

    protected $fillable = [];

    protected $rules = array(
            'title'   => 'required|min:5|max:255',
            'address' => 'required|alpha_num|min:5|max:255',
            'city'    => 'required|max:255',
            'state'   => 'required|string|size:2',
            'zip'     => 'required|numeric|size:5'
    );

    public function calendarEvents()
    {
        $this->hasMany('CalendarEvent');
    }
}
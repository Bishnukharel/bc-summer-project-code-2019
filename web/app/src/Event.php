<?php

namespace App;

/**
 * Class Event
 */
class Event {

    protected $title;
    protected $start_date;
    protected $end_date;

    public function set_title( string $title ) {
        $this->title = $title;

        return $this;
    }
    public function set_start_date( string $start_date ) {
        $this->start_date = $start_date;

        return $this;
    }
    public function set_end_date( string $end_date ) {
        $this->end_date = $end_date;

        return $this;
    }

    public function get_title() : string {
        return $this->title;
    }
    public function get_start_date() : string {
        return $this->start_date;
    }
    public function get_end_date() : string {
        return $this->end_date;
    }

}

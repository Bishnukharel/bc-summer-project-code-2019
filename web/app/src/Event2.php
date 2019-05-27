<?php

namespace App;

/**
 * Class Event
 * 
 * TODO:
 * - Implement the interface.
 */
class Event2 implements EventInterface {

    protected $title;
    protected $start_date;
    protected $end_date;
    
    public function set_title( string $title ) {
        $this->title = $title;
        return $this;
    }
    
    public function set_start_date( \DateTime $start_date ) {
        $this->start_date = $start_date;
        return $this;
    }
    
    public function set_end_date( \DateTime $end_date ) {
        $this->end_date = $end_date;
        return $this;
    }
    
    public function get_title() {
        return $this->title;
    }
    
    public function get_start_date( ?string $format ) {
        return $format ? $this->start_date->format( $format ) : $this->start_date;
    }
    
    public function get_end_date( ?string $format ) {
        return $format ? $this->end_date->format( $format ) : $this->end_date;
    }
}

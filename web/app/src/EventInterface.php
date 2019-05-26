<?php

namespace App;

/**
 * Interface Event
 */
interface EventInterface {

    /**
     * Set the start date as a DateTime object.
     */
    public function set_start_date( \DateTime $date );

    /**
     * Set the end date as a DateTime object.
     */
    public function set_end_date( \DateTime $date );

    /**
     * Get the start date as a DateTime object or as a string if the format is specified.
     */
    public function get_start_date( ?string $format );

    /**
     * Get the end date as a DateTime object or as a string if the format is specified.
     */
    public function get_end_date( ?string $format );

}

<?php

include '../app/vendor/autoload.php';

// Create the events.
$first_event = ( new App\Event() )
    ->set_title( 'First course day' )
    ->set_start_date( new DateTime( '2019-05-27 09:00:00' ) )
    ->set_end_date( new DateTime( '2019-05-27 16:00:00' ) );
$second_event = ( new App\Event() )
    ->set_title( 'Second course day' )
    ->set_start_date( new DateTime( '2019-05-28 09:00:00' ) )
    ->set_end_date( new DateTime( '2019-05-28 16:00:00' ) );

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My events</title>
    </head>
    <body>
        <h1>My events</h1>
        <ul>
            <li>
                <b><?php echo $first_event->get_title(); ?></b>
                <?php echo $first_event->get_start_date( 'c' ) . ' - ' . $first_event->get_end_date( 'c' ); ?>
            </li>
            <li>
                <b><?php echo $second_event->get_title(); ?></b>
                <?php echo $second_event->get_start_date( 'Y-m-d H:i:s' ) . ' - ' . $second_event->get_end_date( 'Y-m-d H:i:s' ); ?>
            </li>
        </ul>
    </body>
</html>
<?php

include '../app/vendor/autoload.php';

// Create the events.
$events = [   
    ( new App\Event() )
        ->set_title( 'First course day' )
        ->set_start_date( '2019-05-27 09:00:00' )
        ->set_end_date( '2019-05-27 16:00:00' ),
    ( new App\Event() )
        ->set_title( 'Second course day' )
        ->set_start_date( '2019-05-28 09:00:00' )
        ->set_end_date( '2019-05-28 16:00:00' )
];

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My events</title>
    </head>
    <body>
        <h1>My events</h1>
        <ul>
            <?php foreach( $events as $event ) : ?>
                <li>
                    <b><?php echo $event->get_title(); ?></b>
                    <?php echo $event->get_start_date() . ' - ' . $event->get_start_date(); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>

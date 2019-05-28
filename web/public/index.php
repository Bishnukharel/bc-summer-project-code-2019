<?php

include '../app/vendor/autoload.php';

$router = new AltoRouter();

// map homepage
$router->map( 'GET', '/', function() {
	echo '/';
});

// map user details page
$router->map( 'GET', '/user/[i:id]/', function( $id ) {
	echo 'user:'.$id;
});

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
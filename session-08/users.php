<?php
require( 'init.php' );

$sql    = "SELECT * FROM users";
$result = mysqli_query( $db_connection, $sql );

$data   = mysqli_fetch_all( $result, MYSQLI_ASSOC );

print_r( $data );
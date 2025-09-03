<?php
require( 'init.php' );

//$sql = "SELECT * FROM users";
//$result = mysqli_query( $db_connection, $sql );
//$rows   = mysqli_fetch_all( $result, MYSQLI_ASSOC );


$sql = "UPDATE users SET username = 'hamedmoodasdasdff' WHERE ID > 4";

$result = mysqli_query( $db_connection, $sql );

$row_affected = mysqli_affected_rows( $db_connection );

print_r( $row_affected );
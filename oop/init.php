<?php
date_default_timezone_set( 'Asia/Tehran' );
session_start();

include( 'db_functions.php' );
mysqli_report( MYSQLI_REPORT_ERROR );
$db = @mysqli_connect( 'localhost', 'root', '', 'oop' );
if( ! $db ){
    
    db_log( mysqli_connect_error() );
    include( 'db-error.php' );
    exit;

}

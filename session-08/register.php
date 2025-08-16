<?php
date_default_timezone_set( 'Asia/Tehran' );
$date = date( 'Y-m-d H:i:s' );

$db_connection = mysqli_connect( 'localhost', 'root', '', 'my_db' );

$username = $_POST['username'];
$password = $_POST['password'];

$sql            = "INSERT INTO users
( username, password, created_at )
VALUES
( '$username', '$password', '$date' )";

//die( $sql );

$result = mysqli_query( $db_connection, $sql );

if( $result ){
    echo 'کاربر ثبت شد';
}else{
    echo 'خطا در ثبت کاربر';
}
<?php
require( 'init.php' );

$date = date( 'Y-m-d H:i:s' );
$username = $_POST['username'];
$password = $_POST['password'];


$tmp_avatar     = $_FILES['avatar']['tmp_name'];
$avatar_target  = 'uploads/' . rand( 10000000, 99999999 ) . '-' . $_FILES['avatar']['name'];
$moved          = move_uploaded_file( $tmp_avatar, $avatar_target );
if( ! $moved ){
    die('Not Move');
}


$sql            = "INSERT INTO users
( username, password, avatar, created_at )
VALUES
( '$username', '$password', '$avatar_target' , '$date' )";

$result = mysqli_query( $db_connection, $sql );

if( $result ){
    echo mysqli_insert_id( $db_connection );
    echo 'کاربر ثبت شد';
}else{
    echo 'خطا در ثبت کاربر';
}
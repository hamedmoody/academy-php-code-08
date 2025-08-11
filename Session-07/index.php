<?php
$file   = 'users.txt';

//Get All Users
$file_content = file_get_contents( $file );
if( $file_content ){
    $users = unserialize( $file_content );
}else{
    $users = [];
}

//Create New user
$name   = 'Ali-' . rand( 1000, 9999 );
$family = 'Moodi-' . rand( 1000, 9999 ) ;

$user   = [
    'name'      => $name,
    'family'    => $family,
];

//Append User
$users[] = $user;

//Save user
$data = serialize( $users );

file_put_contents( $file, $data );

$file_content = file_get_contents( $file );
$data = unserialize( $file_content );
print_r( $data );
//echo $file_content;
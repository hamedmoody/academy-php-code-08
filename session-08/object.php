<?php
$user = [
    'name'  => 'ali',
    'family'    => 'moodi',
];

//$user_object = (object) $user;

 $user = new stdClass;
 $user->name = 'Ali';
 $user->family = 'Moodi';

$user_a = (string) $user;
print_r( $user_a );
<?php

$user = [
    'name'  => 'ali',
    'age'   => 51
];
header( 'content-type: application/json' );
echo json_encode( $user );
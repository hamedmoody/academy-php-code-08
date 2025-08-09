<?php

function generate_random_string( $length, $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890' ){

    $result = '';
    for( $i = 0; $i < $length; $i++ ){
        $rand = rand( 0, strlen( $alphabet ) - 1 );
        $char = $alphabet[$rand];
        $result.= $char;
    }

    return $result;

}

//echo generate_random_string( 5, '0123456789@abdeflakjifdigu!#$%^&*' );
$name = 'aliakbar';
$is_exists = strpos( $name, 'ali' );
if( $is_exists === false ){
    echo 'Not';
}else{
    echo 'Yes';
}

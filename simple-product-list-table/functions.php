<?php

function insert_data( $table, $data ){
    //INSERT INTO producsts ( title, price ) VALUES ( 'Laptop', '5000' ) 

    

    $sql = 'INSERT INTO ' . $table;
    
    $cols = array_keys( $data );
    $sql.= '( ' . implode( ', ', $cols ) . ' ) ';

    $sql.= ' VALUES ';
    $sql.='( ';

    foreach( $data as $key => $value ){
        $sql.= "'$value',";
    }
    
    $sql = trim( $sql, ',' );

    $sql.= ' )';
    
    //print_r( $data );
    echo PHP_EOL;
    die( $sql );

}

insert_data( 'products', [
    'title'   => 'lap top',
    'price'   => '5000'
] );
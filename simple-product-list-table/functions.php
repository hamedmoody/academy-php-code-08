<?php

function insert_data( $table, $data ){
    //INSERT INTO producsts ( title, price ) VALUES ( 'Laptop', '5000' ) 
    global $db;

    $sql = 'INSERT INTO ' . $table;
    
    $cols = array_keys( $data );
    $sql.= '( ' . implode( ', ', $cols ) . ' ) ';

    $sql.= ' VALUES ';
    $sql.='( ';

    foreach( $data as $key => $value ){
        if( $value === NULL ){
            $sql.= "NULL,";
        }else{
            $sql.= "'$value',";
        }
    }
    
    $sql = trim( $sql, ',' );

    $sql.= ' )';
    
    $inserted = mysqli_query( $db, $sql );

    if( $inserted ){
        return mysqli_insert_id( $db );
    }

    return false;

}

function delete_item( $table, $field, $value ){
    //DELETE FROM $Table WHERE $field = $value
    $sql = "DELETE FROM $table WHERE $field = '$value'";
}

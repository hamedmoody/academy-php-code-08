<?php
include 'init.php';

$title          = $_POST['title'];
$description    = $_POST['description'];
$price          = $_POST['price'];
$sale_price     = $_POST['sale_price'];
$stock          = $_POST['stock'];
$status         = $_POST['status'];
$date           = date( 'Y-m-d H:i:s' );
$id             = intval( $_POST['ID'] );


if( $id ){

    //update query
    $sql = "
    UPDATE products
        SET
            title = '$title',
            description = '$description',
            price = $price,
            sale_price = $sale_price,
            status = '$status',
            stock = $stock,
            updated_at = '$date'
        WHERE
            ID = $id
    ";
    
    $updated = mysqli_query( $db, $sql );

    if( $updated ){
        http_response_code( 200 );
        echo 'محصول ویرایش شد';
        exit;
    }else{
        http_response_code( 400 );
        echo 'خطا در بروزرسانی';
        exit;
    }

}else{

    $sql            = "
    INSERT INTO products
        (title, description, price, sale_price, stock, status, created_at, updated_at)
        VALUES
        ('$title', '$description', $price, $sale_price, $stock, '$status', '$date', '$date')
    ";
    
    $result = mysqli_query( $db, $sql );

    if( $result ){
        http_response_code( 200 );
        echo 'ثبت انجام شد';
        exit;
    }else{
        http_response_code( 400 );
        echo 'خطا در ثبت محصول';
        exit;
    }


}
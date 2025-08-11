<?php
$sale_price = false;
if( isset( $_POST['save'] ) ){
    $price      = intval( $_POST['price'] );
    $percent    = intval( $_POST['percent'] );
    $sale_price = $price - ( $percent / 100 * $price );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <p>
            <label for="price">Price:</label>
            <input type="number" name="price">
        </p>
        <p>
            <label for="percent">percent:</label>
            <input type="number" name="percent">
        </p>
        <button name="save">Save</button>
        <button name="del">Delete</button>
    </form>
    <?php   
    if( $sale_price ){
        echo '<strong>' . number_format( $sale_price ) . '</strong>'; 
    }
    ?>
</body>
</html>
<?php
$text = 'Hello {name} {family}
Orderid : {order_id}
total ; {total}';

$name       = 'ALi';
$family     = 'Moodi';
$order_id   = 65465;
$total      = 540000;

$replacement = [
    '{name}'    => $name,
    '{family}'  => $family,
    '{order_id}'=> $order_id,
    '{total}'   => $total
];


$result = str_replace(
    array_keys( $replacement ),
    array_values( $replacement ),
    $text
);

echo $result;
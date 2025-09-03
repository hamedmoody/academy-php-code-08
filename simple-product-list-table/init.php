<?php
date_default_timezone_set( 'Asia/Tehran' );
$db = mysqli_connect( 'localhost', 'root', '', 'shop' );

$product_statuses = [
    'pending'   => 'در انتظار',
    'publish'   => 'در حال فروش',
    'expire'    => 'توقف فروش',
    'draft'     => 'پیش نویس',
    'presale'   => 'پیش فروش'
];
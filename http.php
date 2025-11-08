<?php
$url        = 'https://notificator.ir/api/v1/send';

//Init
$ch = curl_init( $url );

$data = [
    'to'      => 'e32QRm77A2ABVm0sLBU5wrWIlXc5OS5ZeeucXisg',
    'text'    => 'Moodijhkjhkjhkjhkj',
    //'disable_notification' => true,
];

//Setting
curl_setopt_array( $ch, [
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_POSTFIELDS      => http_build_query($data)
] );

//Execute
$result = curl_exec( $ch );

//Close
curl_close( $ch );


$courses = json_decode( $result );

print_r( $courses );
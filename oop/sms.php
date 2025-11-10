<?php
$base_url   = 'https://edge.ippanel.com/v1';
$api_key    = '';

$send_message_url = $base_url . '/api/send';


$ch = curl_init(  $send_message_url );

curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

curl_setopt( $ch, CURLOPT_HTTPHEADER, [
    'Authorization: ' . $api_key,
    'Content-Type: application/json'
]);

curl_setopt( $ch, CURLOPT_POSTFIELDS, '{
  "sending_type": "webservice",
  "from_number": "+983000505",
  "message": "متن پیام من در این قسمت نوشته می شود",
  "params": {
    "recipients": [
      "+989156040160"
    ]
  }
}' );

$result = curl_exec( $ch );

curl_close($ch);

$result = json_decode( $result );

print_r( $result );


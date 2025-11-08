<?php
include( 'init.php' );
include( 'User.php' );

// $user = new User();
// $user->username = 'hamed';
// $user->password  = 'lkjasldkfj';
// $user->save();

$user_id = 2;

$user = new User( 2 );
$user->status = 'block';
$user->username = 'ALimOoidijalksjdflkas';
$user->save();
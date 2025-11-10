<?php
include( 'init.php' );
include( 'User.php' );
include( 'Teacher.php' );

// $user = new User();
// $user->username = 'hamed';
// $user->password  = 'lkjasldkfj';
// $user->save();

$user_id = 2;

$teacher = new Teacher( 2 );
$teacher->send_sms( 'خوش آمدید' );


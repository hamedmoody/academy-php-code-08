<?php
include( 'init.php' );
include( 'Model/Model.php' );
include( 'User.php' );
include( 'Product.php' );

// $user              = new Model();
// $user->phone       = '09123456789';
// $user->name        = 'Hamed Moodi';
// $user->created_at = date('Y-m-d H:i:s');
// $user->updated_at = date('Y-m-d H:i:s');
// $user->save();

// $user = new User(4);
// echo $user->name;

$p              = new Product();
$p->title       = 'Laptop';
$p->price       = 5000;
//$p->created_at  = date('Y-m-d H:i:s');
//$p->updated_at  = date('Y-m-d H:i:s');
$p->save();
//print_r( $user );
<?php

$file = $_FILES['my_file'];

print_r( $file );

$name       = $file['name'];
$tmp_name   = $file['tmp_name'];

$destination = 'uploads/' . $name;

move_uploaded_file( $tmp_name, $destination );
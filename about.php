<?php
$users = [
    ['name' => 'ali', 'family'=>'moodi'],
    ['name' => 'reza', 'family' => 'razavi'],
    ['name' => 'Hamed', 'family' => 'Alavi'],
    ['name' => 'Javad', 'family' => 'Molavi'],
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        tr.active td{
            background: yellow;
        }
    </style>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <?php if( $con ):?>
                    <th>Family</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach( $users as $index => $user ):?>
                    <tr>
                        <td><?php echo $index+1;?></td>
                        <td><?php echo $user['name'];?></td>
                        <td><?php echo $user['family'];?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>
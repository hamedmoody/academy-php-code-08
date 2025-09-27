<?php
include( 'init.php' );

$success    = '';
$error      = '';

$id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

if( isset( $_POST['save'] ) ){

    $title          = $_POST['title'];
    $description    = $_POST['description'];
    $price          = $_POST['price'];
    $sale_price     = $_POST['sale_price'];
    $stock          = $_POST['stock'];
    $status         = $_POST['status'];
    $date           = date( 'Y-m-d H:i:s' );
    $thumbnail_path = '';


    $allowed_types = [
        'image/jpeg', 'image/png', 'image/webp'
    ];
    $allowed_extensions = [
        'jpg', 'jpeg', 'png', 'webp'
    ];

    //Upload
    $file           = $_FILES['thumbnail'];
    $mime_type      = $file['type'];
    $name           = $file['name'];
    $info           = pathinfo( $name );
    //JPG => jpg
    if(
        in_array( $mime_type, $allowed_types )
        &&
        in_array( strtolower( $info['extension'] ), $allowed_extensions )
    ){

        $name           = $info['filename'] . '-' . rand( 100000, 999999 ) . '.' . $info['extension'];
        $upload_dir     = 'uploads/' . date( 'Y/m/' );
        if( ! file_exists( $upload_dir )  ){
            //Make dir
            mkdir( $upload_dir, 0777, true );
        }
        $destination_file = $upload_dir . $name;
        move_uploaded_file( $file['tmp_name'], $destination_file );
        $thumbnail_path = $destination_file;

    }
    

}

$title          = '';
$description    = '';
$price          = 0;
$sale_price     = 0;
$status         = 'pending';
$stock          = 0;
$thumbnail_path = '';


if( isset( $_GET['status'] ) && $_GET['status'] == 'inserted' ){
    $success = 'محصول با موفقیت ثبت شد';
}

if( isset( $_GET['status'] ) && $_GET['status'] == 'updated' ){
    $success = 'محصول با موفقیت بروز شد';
}

if( $id ){
    $sql        = "SELECT * FROM products WHERE ID = $id";
    $result     = mysqli_query( $db, $sql );
    $prodcut    = mysqli_fetch_assoc( $result );
    $title      = $prodcut['title'];
    $thumbnail_path = $prodcut['thumbnail'];
    $description = $prodcut['description'];
    $price      = $prodcut['price'];
    $sale_price      = $prodcut['sale_price'];
    $stock      = $prodcut['stock'];
    $status = $prodcut['status'];
}

?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ثبت/ویرایش محصول</title>
    <link rel="stylesheet" href="https://dl.daneshjooyar.com/mvie/Moodi_Hamed/assets/css/font-yekanbakh-vf.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="box-container">
        <header>
            <div class="title">
                <h1>
                    <?php if( $id ):?>
                        ویرایش
                    <?php else:?>
                        ثبت
                    <?php endif;?>
                    محصول
                </h1>
                <p>از این بخش میتوانید محصولات فعلی را ویرایش یا محصول جدید ثبت کنید</p>
            </div>
        </header>
        
        <?php if( $error ):?>
        <div class="message error">
            <?php echo $error;?>
        </div>
        <?php endif;?>

        <?php if( $success ):?>
        <div class="message success">
            <?php echo $success;?>
        </div>
        <?php endif;?>

        <form action="" method='POST' id="product-register" enctype="multipart/form-data">
            <div class="form-right">
                <div class="form-group">
                    <label for="title">نام محصول</label>
                    <input type="text" name="title" value="<?php echo $title;?>" id="title" class="form-control" placeholder="نام محصول">
                </div>
                <div class="form-group">
                    <label for="description">توضیحات</label>
                    <textarea rows="15" name="description" id="description" class="form-control" placeholder="توضیحات محصول"><?php echo $description;?></textarea>
                </div>
            </div>
            <div class="form-side">
                <div class="form-group">
                    <label for="thumbnail">تصویر شاخص محصول</label>
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/jpeg,image/png">
                    <input type="text" id="thumb_input" name="thumbnail" value="<?php echo $thumbnail_path;?>">
                </div>
                <?php if( $thumbnail_path ):?>
                    <img src="<?php echo $thumbnail_path;?>"
                        alt="" class="thumbnail-preview"/>
                        <button type="button" id="remove-image">Remove Image</button>
                <?php endif;?>
                <div class="form-group">
                    <label for="price">قیمت</label>
                    <input type="number" name="price" id="price" class="form-control" value="<?php echo $price;?>" step="1">
                </div>
                <div class="form-group">
                    <label for="sale_price">قیمت فروش</label>
                    <input type="number" name="sale_price" id="sale_price" class="form-control" min="0" step="1" value="<?php echo $sale_price;?>">
                </div>
                <div class="form-group">
                    <label for="stock">موجودی انبار</label>
                    <input type="number" name="stock" id="stock" class="form-control" min="0" step="1" value="<?php echo $stock;?>">
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control">
                        <?php foreach( $product_statuses as $key => $label ):?>
                            <option value="<?php echo $key;?>" <?php if( $key == $status ){echo 'selected';}?>>
                            <?php echo $label;?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <button class="btn btn-primary w-100" name="save">
                <?php if( $id ):?>    
                    ذخیره تغییرات
                    <?php else:?>
                    ثبت محصول
                    <?php endif;?>
                </button>
                <input type="hidden" name="ID" value="<?php echo $id;?>">
            </div>
        </form>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/script.js"></script>
    <script>
        
    </script>
</body>
</html
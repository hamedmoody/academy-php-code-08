<?php
include( 'init.php' );

if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' && isset( $_GET['id'] ) ){
  $id = intval( $_GET['id'] );
  $sql = "DELETE FROM products WHERE ID = $id";
  $result = mysqli_query( $db, $sql );
}


//( Page - 1 ) * $limit
$page   = isset( $_GET['page'] ) ? intval( $_GET['page'] ) : 1;
$limit  = 20;
$offset = ( $page - 1 ) * $limit;

$where  = ' WHERE 1 = 1 ';
$args   = [];

$search = isset( $_GET['search'] ) ? $_GET['search'] : '';
if( $search ){
  $where.= " AND title LIKE '%$search%' ";
  $args['search'] = $search;
}

$price_from = isset( $_GET['price_from'] ) ? intval( $_GET['price_from'] ) : 0;
if( $price_from ){
  $where.= " AND price >= $price_from ";
  $args['price_from'] = $price_from;
}

$price_to = isset( $_GET['price_to'] ) ? intval( $_GET['price_to'] ) : 0;
if( $price_to ){
  $where.= " AND price <= $price_to ";
  $args['price_to'] = $price_to;
}

$status = isset( $_GET['status'] ) ? $_GET['status'] : '';
if( $status ){
  $where.= " AND status = '$status'";
  $args['status'] = $status;
}

//create list sql
$sql = "SELECT * FROM products $where ORDER BY created_at DESC LIMIT $limit OFFSET $offset";

//Get data
$result   = mysqli_query( $db, $sql );
$products = mysqli_fetch_all( $result, MYSQLI_ASSOC );

//Get total item count
$count_sql = "SELECT COUNT(*) AS total FROM products $where";
$result = mysqli_query( $db, $count_sql );
$result = mysqli_fetch_assoc( $result );
$total = $result['total'];

//Calculate Page Count
$page_count = ceil( $total / $limit );
?>
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>لیست محصولات</title>
  <link rel="stylesheet" href="https://dl.daneshjooyar.com/mvie/Moodi_Hamed/assets/css/font-yekanbakh-vf.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="box-container">
    <header>
      <div class="title">
        <h1>لیست محصولات</h1>
        <p>از این بخش میتوانید محصولات فعلی را ویرایش یا محصول جدید ثبت کنید</p>
      </div>
      <div class="table-button">
        <a href="product-edit.php" class="btn btn-secondary">
          + ثبت محصول جدید
        </a>
      </div>
    </header>
    <form action="" class="table-filter">
      <div class="filter">
        <label for="search">جستجو</label>
        <input type="search" id="search" name="search" placeholder="جستجو" value="<?php echo $search;?>" class="form-control">
      </div>
      <div class="filter">
        <label for="status">وضعیت</label>
        <select name="status" id="status" class="form-control">
          <option value=""> - همه - </option>
          <?php foreach( $product_statuses as $key => $label ):?>
            <option value="<?php echo $key;?>" <?php if( $key == $status ){echo 'selected';}?>>
              <?php echo $label;?>
            </option>
          <?php endforeach;?>
        </select>
      </div>
      <div class="filter filter-price">
        <label for="search">قیمت</label>
        <div>
          از
          <input type="search" name="price_from" placeholder="از" value="<?php echo $price_from;?>" class="form-control">
          تا
          <input type="search" name="price_to" placeholder="تا" value="<?php echo $price_to;?>" class="form-control">
        </div>
      </div>
      <div class="filter btn-filter">
        <button class="btn btn-primary ">
          فیلتر کردن
        </button>
      </div>
    </form><!--.table-filter-->
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>
            <a href="#" class="order-desc">
              <svg xmlns="http://www.w3.org/2000/svg" width="17.505" height="18.5" viewBox="0 0 17.505 18.5">
                <g id="arrow-swap" transform="translate(-3.252 -2.75)">
                  <path id="Path_15" data-name="Path 15" d="M-943.99-509.75h-.02a.739.739,0,0,1-.511-.219l-5.01-5.01a.755.755,0,0,1,0-1.06.755.755,0,0,1,1.06,0l3.73,3.731V-527.5a.754.754,0,0,1,.75-.75.754.754,0,0,1,.75.75v17a.736.736,0,0,1-.06.292.735.735,0,0,1-.159.238q-.025.023-.052.044a.744.744,0,0,1-.478.175Z" transform="translate(953 531)" fill="#c1c1c1"/>
                  <path id="Path_14" data-name="Path 14" d="M-949.748-510.5v-17a.755.755,0,0,1,.751-.75.735.735,0,0,1,.146.015.742.742,0,0,1,.393.205l5.01,5.01a.754.754,0,0,1,0,1.059.742.742,0,0,1-.53.22.742.742,0,0,1-.53-.22l-3.74-3.739v15.2a.749.749,0,0,1-.75.75A.756.756,0,0,1-949.748-510.5Z" transform="translate(963.988 531)" fill="#c1c1c1"/>
                </g>
              </svg>
              محصول
            </a>
          </th>
          <th>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="17.505" height="18.5" viewBox="0 0 17.505 18.5">
                <g id="arrow-swap" transform="translate(-3.252 -2.75)">
                  <path id="Path_15" data-name="Path 15" d="M-943.99-509.75h-.02a.739.739,0,0,1-.511-.219l-5.01-5.01a.755.755,0,0,1,0-1.06.755.755,0,0,1,1.06,0l3.73,3.731V-527.5a.754.754,0,0,1,.75-.75.754.754,0,0,1,.75.75v17a.736.736,0,0,1-.06.292.735.735,0,0,1-.159.238q-.025.023-.052.044a.744.744,0,0,1-.478.175Z" transform="translate(953 531)" fill="#c1c1c1"/>
                  <path id="Path_14" data-name="Path 14" d="M-949.748-510.5v-17a.755.755,0,0,1,.751-.75.735.735,0,0,1,.146.015.742.742,0,0,1,.393.205l5.01,5.01a.754.754,0,0,1,0,1.059.742.742,0,0,1-.53.22.742.742,0,0,1-.53-.22l-3.74-3.739v15.2a.749.749,0,0,1-.75.75A.756.756,0,0,1-949.748-510.5Z" transform="translate(963.988 531)" fill="#c1c1c1"/>
                </g>
              </svg>
              قیمت
            </a>
          </th>
          <th>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="17.505" height="18.5" viewBox="0 0 17.505 18.5">
                <g id="arrow-swap" transform="translate(-3.252 -2.75)">
                  <path id="Path_15" data-name="Path 15" d="M-943.99-509.75h-.02a.739.739,0,0,1-.511-.219l-5.01-5.01a.755.755,0,0,1,0-1.06.755.755,0,0,1,1.06,0l3.73,3.731V-527.5a.754.754,0,0,1,.75-.75.754.754,0,0,1,.75.75v17a.736.736,0,0,1-.06.292.735.735,0,0,1-.159.238q-.025.023-.052.044a.744.744,0,0,1-.478.175Z" transform="translate(953 531)" fill="#c1c1c1"/>
                  <path id="Path_14" data-name="Path 14" d="M-949.748-510.5v-17a.755.755,0,0,1,.751-.75.735.735,0,0,1,.146.015.742.742,0,0,1,.393.205l5.01,5.01a.754.754,0,0,1,0,1.059.742.742,0,0,1-.53.22.742.742,0,0,1-.53-.22l-3.74-3.739v15.2a.749.749,0,0,1-.75.75A.756.756,0,0,1-949.748-510.5Z" transform="translate(963.988 531)" fill="#c1c1c1"/>
                </g>
              </svg>
              تخفیف
            </a>
          </th>
          <th>موجودی</th>
          <th style="width: 110px;">وضعیت</th>
          <th>تاریخ ثبت</th>
          <th>عملیات</th>
        </tr>
      </thead>
      <tbody>
        <?php if( ! empty( $products ) ):?>       
          <?php foreach( $products as $index => $product ):?>
            <?php include( 'parts/product-row.php' );?>
          <?php endforeach;?>
        <?php else:?>
          <tr>
            <td colspan="8">
              نتیجه ای یافت نشد
            </td>
          </tr>
        <?php endif;?>
      </tbody>
    </table>

    <div class="table-footer">
      <div class="result">
        کل نتایج: 
        <?php echo number_format( $total );?>
        | صفحه 
        <?php echo $page;?>
        از 
        <?php echo $page_count;?>
      </div>
      <div class="pagination">
        <?php if( $page > 1 ):?>
          <a href="product-list.php?page=<?php echo $page - 1;?>&<?php echo http_build_query( $args );?>" class="prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="8.597" height="17.337" viewBox="0 0 8.597 17.337">
              <path id="arrow-right-3" d="M16.012,20.67a.742.742,0,0,0,.53-.22.754.754,0,0,0,0-1.06l-6.52-6.52a1.231,1.231,0,0,1,0-1.74l6.52-6.52a.75.75,0,0,0-1.06-1.06l-6.52,6.52a2.724,2.724,0,0,0-.8,1.93,2.683,2.683,0,0,0,.8,1.93l6.52,6.52A.786.786,0,0,0,16.012,20.67Z" transform="translate(-8.162 -3.333)" fill="#292d32"/>
            </svg>
          </a>
        <?php endif;?>
        <?php for( $i = 1; $i <= $page_count; $i++ ):?>
          <?php
          $diff = abs( $i - $page );
          if( $diff > 2 ){
            continue;
          }
          ?>
          <?php if( $i == $page ):?>
            <span><?php echo $i;?></span>
          <?php else:?>
            <a href="product-list.php?page=<?php echo $i;?>&<?php echo http_build_query( $args );?>">
              <?php echo $i;?>
            </a>
          <?php endif;?>
        <?php endfor;?>
        <?php if( $page < $page_count - 3 ):?>
        <a href="#">
          ...
        </a>
        <?php endif;?>
        <?php if( $page < $page_count - 2 ):?>
        <a href="product-list.php?page=<?php echo $page_count;?>&<?php echo http_build_query( $args );?>">
          <?php echo $page_count;?>
        </a>
        <?php endif;?>
        <?php if( $page < $page_count ):?>
          <a href="product-list.php?page=<?php echo $page + 1;?>" class="next">
            <svg xmlns="http://www.w3.org/2000/svg" width="8.597" height="17.337" viewBox="0 0 8.597 17.337">
              <path id="arrow-right-3" d="M8.91,20.67a.742.742,0,0,1-.53-.22.754.754,0,0,1,0-1.06l6.52-6.52a1.231,1.231,0,0,0,0-1.74L8.38,4.61A.75.75,0,1,1,9.44,3.55l6.52,6.52a2.724,2.724,0,0,1,.8,1.93,2.683,2.683,0,0,1-.8,1.93L9.44,20.45A.786.786,0,0,1,8.91,20.67Z" transform="translate(-8.162 -3.333)" fill="#292d32"/>
            </svg>
          </a>
        <?php endif;?>
      </div><!--.pagination-->
    </div><!--.table-footer-->

  </div><!--.table-container-->
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
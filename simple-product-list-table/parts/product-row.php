<?php
$discount = 0;
if( $product['price'] ){
    $discount = ( $product['price'] - $product['sale_price'] ) / $product['price'] * 100;
    $discount = round( $discount );
}

$status_key = $product['status'];

$status_label = $product_statuses[$status_key];
$row = $offset + $index + 1;
?>
<tr>
    <td><?php echo $row;?></td>
    <td>
    <div class="table-flex-col">
        <img class="product-thumbnail" src="<?php echo $product['thumbnail'];?>"
            alt="">
        <p class="product-title">
        <?php echo $product['title'];?>
        </p>
    </div>
    </td>
    <td>
        <?php if( $discount ):?>
            <del><?php echo number_format( $product['price']/10 );?></del>
        <?php endif;?>
        <ins><?php echo number_format( $product['sale_price']/10 );?></ins>
    </td>
    <td>
        <?php echo $discount;?>%
    </td>
    <td>
        <?php echo $product['stock'];?>
    </td>
    <td>
        <div class="product-status <?php echo $status_key;?>">
            <?php echo $status_label;?>
        </div>
    </td>
    <td>
        1405/08/19
    </td>
    <td>
        <div class="table-flex-col">
            <a href="#" class="btn-icon edit-product">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.502" height="18.094" viewBox="0 0 17.502 18.094">
                <g id="edit-2" transform="translate(-3.252 -1.426)">
                <path id="Path_4" data-name="Path 4" d="M5.54,19.52a2.291,2.291,0,0,1-1.59-.6,2.382,2.382,0,0,1-.68-2.03l.37-3.24a3.605,3.605,0,0,1,.87-1.86L12.72,3.1C14.77.93,16.91.87,19.08,2.92s2.23,4.19.18,6.36l-8.21,8.69a3.605,3.605,0,0,1-1.81.97l-3.22.55C5.85,19.5,5.7,19.52,5.54,19.52ZM15.93,2.91a3.055,3.055,0,0,0-2.12,1.2L5.6,12.81a2.309,2.309,0,0,0-.47,1l-.37,3.24a.879.879,0,0,0,.22.77.9.9,0,0,0,.78.18l3.22-.55a2.234,2.234,0,0,0,.97-.52l8.21-8.69C19.4,6.92,19.85,5.7,18.04,4A3.162,3.162,0,0,0,15.93,2.91Z" fill="#292d32"/>
                <path id="Path_5" data-name="Path 5" d="M17.34,10.95h-.07a6.859,6.859,0,0,1-6.11-5.78.754.754,0,0,1,1.49-.23,5.372,5.372,0,0,0,4.78,4.52.751.751,0,0,1,.67.82A.774.774,0,0,1,17.34,10.95Z" fill="#292d32"/>
                </g>
            </svg>
            </a>
            <a href="#" class="btn-icon delete-product">
            <svg xmlns="http://www.w3.org/2000/svg" width="19.497" height="21.499" viewBox="0 0 19.497 21.499">
                <g id="trash" transform="translate(-2.247 -1.251)">
                <path id="Path_11" data-name="Path 11" d="M-910.21-502.25c-3.49,0-3.631-1.93-3.74-3.49l-.65-10.07a.756.756,0,0,1,.7-.8.758.758,0,0,1,.8.7l.65,10.07c.11,1.52.149,2.09,2.24,2.09h6.42c2.1,0,2.14-.57,2.24-2.09l.65-10.07a.763.763,0,0,1,.8-.7.75.75,0,0,1,.7.8l-.65,10.07c-.111,1.561-.25,3.49-3.74,3.49Zm1.539-5.5a.756.756,0,0,1-.75-.75.756.756,0,0,1,.75-.751h3.33a.756.756,0,0,1,.751.751.756.756,0,0,1-.751.75Zm-.83-4a.755.755,0,0,1-.75-.75.756.756,0,0,1,.75-.75h5a.756.756,0,0,1,.75.75.755.755,0,0,1-.75.75Zm-7.25-7.2a.744.744,0,0,1,.67-.82l2.04-.2q1.4-.143,2.807-.218l.213-1.273c.16-.96.381-2.29,2.71-2.29h2.621c2.34,0,2.56,1.38,2.71,2.3l.22,1.3v0c1.607.09,3.218.22,4.829.378a.75.75,0,0,1,.67.82.74.74,0,0,1-.74.68h-.08a78.829,78.829,0,0,0-15.8-.2l-2.039.2c-.026,0-.051,0-.077,0A.752.752,0,0,1-916.75-518.95Zm12.466-1.271-.166-.979c-.139-.87-.17-1.04-1.229-1.04h-2.62c-1.06,0-1.08.14-1.23,1.03l-.17.958q1.1-.034,2.2-.033Q-905.9-520.286-904.284-520.221Z" transform="translate(919 525)" fill="#292d32"/>
                </g>
            </svg>
            </a>
        </div>
    </td>
    </tr>
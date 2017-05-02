

<?php

require 'cnx/cnx.php';
              
// continuation of process.php
$sku = 'product';
$qty = $_POST["qty"];
$items = $_POST["id"];
$stockItemData = array(
    'qty' => $qty );

$result = $client->call($session,'product_stock.update',array(
        $items,
        $stockItemData ));

$productqty=$client->call($session, 'product_stock.list', $items );

$sku=$productqty[0]['sku'];


echo "<script>alert('Votre $sku a bien été modifié avec une nouvelle quantité de $qty ')</script>";

echo "<script type='text/javascript'>
document.location.replace('products.php');</script>";



/*alert("le SKU a bien été modifié");*/


?>




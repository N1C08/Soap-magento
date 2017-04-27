<?php
require 'cnx/template.php';
require 'cnx/cnx.php';

//var_dump($client->call($session, 'product_stock.list' ));

// appeler le .json qui contient les sku + qty 

$productInfo = file_get_contents('json/update/products3.json');
//var_dump($productInfo);

$productInfo2 = json_decode($productInfo, true);
//var_dump($productInfo2);

// envoyer les sku + qty et les mettre a jour

$start = microtime(true);
foreach($productInfo2 as $product )
{
    $calls[] = array('product_stock.update', array($product['sku'], array('qty'=>$product['qty'])));
}

 //  multicall sending 
 // 3 est le nbre de produits intégré au request  foreach(array_chunk($calls, 3) , on peut mettre le nombre total de produits  

 foreach(array_chunk($calls, 3) as $skuChunk)
  {
     $result = $client->multiCall($session, $skuChunk);
     //echo "maj ok";
  }
  //echo $time_elapsed_secs = microtime(true) - $start; // temps ecoulé pour l'operation.

 //  finir la session

  //$client-> session_destroy($session);

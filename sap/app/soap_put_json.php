<?php

$client = new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl');    
$session = $client->login('SAP', 'cordonelec');

// demander le stock du $sku
/*$sku = array( 
                array('sku'=>'appiph5s32','qty'=>'5000'),
                array('sku'=>'sku_test','qty'=>'110'),
                array('sku'=>'appiph5s16','qty'=>'118')
                );*/


var_dump($client->call($session, 'product_stock.list' ));

// appeler le .json qui contient les sku + qty 

$productInfo = file_get_contents('json/update/products3.json');

var_dump($productInfo);

$productInfo2 = json_decode($productInfo, true);

var_dump($productInfo2);

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
  }
  echo $time_elapsed_secs = microtime(true) - $start; // temps ecoulé pour l'operation.

 //  finir la session

  //$client-> session_destroy($session);










// $proxy = new SoapClient('http://olivier.wanalike.fr/magento/index.php/api/soap/?wsdl');
// $sessionId = $proxy->login('magentolive', 'magento23');

// // Get stock info
// var_dump($proxy->call($sessionId, 'product_stock.list', 'sku555'));

// // Update stock info
// $proxy->call($sessionId, 'product_stock.update', array('sku555', array('qty'=>50, 'is_in_stock'=>1)));

// var_dump($proxy->call($sessionId, 'product_stock.list', 'sku555'));

?>


<?php


$client = new SoapClient('http://olivier.wanalike.fr/magento/index.php/api/soap/?wsdl'); // TODO : change url
$session = $client->login('magentolive', 'magento23');
              
// continuation of process.php
$qty = $_POST["qty"];
$items = $_POST["id"];
$stockItemData = array(
    'qty' => $qty );

$result = $client->call($session,'product_stock.update',array(
        $items,
        $stockItemData ));


/*alert'la quantité du produit a bien été modifié';*/



header('location: products.php');




// get the current Magento cart
// $cart = Mage::getSingleton('checkout/cart');

// foreach($items as $key => $value)
// {
// //    // call the Magento catalog/product model
// //    $product = Mage::getModel('catalog/product')
// //                      // set the current store ID
// //                      ->setStoreId(Mage::app()->getStore()->getId())
// //                      // load the product object
// //                      ->load($key);

//    // start adding the product
//    $cart->addProduct($product, array('qty' => $value));
//    // save the cart
//    $cart->save();

//    // very straightforward, set the cart as updated
//    Mage::getSingleton('checkout/session')->setCartWasUpdated(true);
// }

// // redirect to index.php
// header("Location: index.php");

?>




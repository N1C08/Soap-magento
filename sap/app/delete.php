<?php

require 'cnx/cnx.php';
              
// continuation of delete.php
$items = $_POST["id"];
$result = $client->call($session, 'catalog_product.delete', $items);

header('location: products.php');

<?php
require 'cnx/cnx.php';

//===== LIST CUSTOMERS ===
$result = $client->call($session, 'customer.info', $_GET['id']);
var_dump($result);
//===== END OF CUSTOMERS ===

//===== ADDRESS CUSTOMER =====
$add = $client->call($session, 'customer_address.list', $_GET['id']);
  var_dump ($add);
//===== END OF ADDRESS =====

?>
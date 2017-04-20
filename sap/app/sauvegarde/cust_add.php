<?php 
$client = new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl'); // TODO : change url
$session = $client->login('SAP', 'cordonelec'); // TODO : change login and pwd if necessary

$add = $client->call($session, 'customer_address.list', '1');
var_dump ($result);
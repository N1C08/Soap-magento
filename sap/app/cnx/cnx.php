<?php
//===== CONNECT customer/invoices=====
$client = new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl'); // TODO : change url
$session = $client->login('SAP', 'cordonelec'); // TODO : change login and pwd if necessary

//===== END OF customer/invoices ====

//===== CONNECT =====
$proxy = new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl');
$sessionId = $proxy->login('SAP', 'cordonelec');
//===== END OF  ====
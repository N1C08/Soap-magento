<?php
//===== CONNECT customer/invoices=====
$client = new SoapClient('http://YOUR_MAGENTO_HOST/magento/index.php/api/soap/?wsdl'); // TODO : change url
$session = $client->login('USER_KEY', 'USER_PASS'); // TODO : change login and pwd if necessary

//===== END OF customer/invoices ====

//===== CONNECT =====
$proxy = new SoapClient('http://YOUR_MAGENTO_HOST/magento/index.php/api/soap/?wsdl');
$sessionId = $proxy->login('USER_KEY', 'USER_PASS');
//===== END OF  ====
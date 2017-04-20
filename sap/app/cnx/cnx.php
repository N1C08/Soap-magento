<?php
//===== CONNECT =====
$client = new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl'); // TODO : change url
$session = $client->login('SAP', 'cordonelec'); // TODO : change login and pwd if necessary

//===== END OF CONNECT ====
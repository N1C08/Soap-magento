<?php
$client = new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl');
$session = $client->login('SAP', 'cordonelec');

$result = $client->call($session, 'order.list');

echo "<pre>";
    foreach($result as $order){        
        echo ($order['increment_id'])." - ";        // order number
        echo ($order['customer_id'])." - ";        // customer number
        echo ($order['customer_email'])." - ";    // customer last name
        echo ($order['store_name']);        // grand Total    
        echo "<br/>";
    }        
    echo "</pre>"; 
var_dump ($result);
?>
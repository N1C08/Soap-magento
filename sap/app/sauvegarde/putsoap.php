 <?php

$client = new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl');
// Si vous êtes en local sinon, c'est l'adresse du site web. Ne cherchez pas de dossier api.
$session = $client->login('SAP', 'cordonelec');// Les infos rentrées dans Magento.

try 
    {
        $client->call($session,'product_stock.update', array('sku2mtest', array('qty'=>18, 'is_in_stock'=>1))); // le sku doit etre valide
        echo "Produit mis à jour:";
    }
catch (SoapFault $e) 
    {
        echo "Mise à jour échouée";
    }
    
$client->endSession($session);

?>
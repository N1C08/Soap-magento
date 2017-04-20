
<link rel="stylesheet" type="text/css" href="style.css">
<?php 
/**
 * Connexion à l'api Magento et requête 
 */

$client= new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl'); // PATH_API_MAGENTO = http://nom_de_domaine/magento/api/soap/?wsdl
$session = $client->login('SAP', 'cordonelec'); // connexion au webservice

$result = $client->call($session, 'sales_order.info', '100000001');
$add=$result['shipping_address'];
$product=$result['items'][0];
$pay=$result['payment'];
$history=$result['status_history'];

?>

<h1> Détaille de la commande <?=print_r('commande n°:'. $result['increment_id'].'<br/>');?></h1>
<h2> Livraison </h2>

<?php
print_r('avancement de la commande: '. $result['state'].'<br/>');
print_r('Information de livraison: '.$add['region'].'<br/>');
print_r('cp: '.$add['postcode'].'<br/>');
print_r('rue: '.$add['street'].'<br/>');
print_r('ville: '.$add['city'].'<br/>');
print_r('numéro: '.$add['telephone'].'<br/>');
?>
<?=$result['customer_email']?>
<?=$result['created_at']?>
<h2> Produit commandé </h2>

<?php
print_r('nom: '.$product['name'].'<br/>');
print_r('ref: '.$product['sku'].'<br/>');
print_r('poids: '.$product['weight'].'<br/>');
print_r('prix: '.$product['price'].' € (euros)<br/>');
print_r('prix: '.$product['base_price'].' $ (dollars) <br/>');

//var_dump($result['items'][0]);
?>

<h2> Total de la commande</h2>

<?php
print_r('prix: '.$product['price'].' €<br/>');
print_r('frais de port: '.$pay['shipping_captured'].' €<br/>');
print_r('prix total: '.$pay['amount_ordered'].' €<br/>');

//var_dump($result['payment']);
?>

<h2> Historique </h2>

<?php
print_r('état: commande  '.$history[0]['status']);
print_r('  le '.$history[0]['created_at'].'<br/>');
print_r('état: commande  '.$history[1]['status']);
print_r(' le '.$history[1]['created_at'].'<br/>');
print_r('état: commande  '.$history[2]['status']);
print_r(' le '.$history[2]['created_at'].'<br/>');
print_r('état: commande  '.$history[3]['status']);
print_r(' le '.$history[3]['created_at'].'<br/>');

//var_dump($result);

?>
<?php 
require 'cnx/cnx.php';

$client= new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl'); // PATH_API_MAGENTO = http://nom_de_domaine/magento/api/soap/?wsdl
$session = $client->login('SAP', 'cordonelec'); // connexion au webservice

$result = $client->call($session, 'sales_order.info', '100000001');
$ship=$result['shipping_address'];
$add=$result['billing_address'];
$product=$result['items'][0];
$pay=$result['payment'];
$history=$result['status_history'];
//var_dump($result);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2><?=$result['store_name']?></h2><h3 class="pull-right">Commande n°<?=($result['increment_id']);?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Facturé à:</strong><br>
    					<?=$add['lastname']?> <?=$add['firstname']?><br>
    					<?=$add['street']?><br>
    					<?=$add['postcode']?><br>
    					<?=$add['city']?><br>
    					<?=$add['region']?><br>
    					<?=$add['telephone']?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Adresse de livraison:</strong><br>
    					<?=$ship['lastname']?> <?=$ship['firstname']?><br>
    					<?=$ship['street']?><br>
    					<?=$ship['postcode']?><br>
    					<?=$ship['city']?><br>
    					<?=$ship['region']?><br>
    					<?=$ship['telephone']?>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Réglement:</strong><br>
    					Visa ending **** 4242<br>
    					<?=$result['customer_email']?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Date d'achat:</strong><br>
    					<?=$result['created_at']?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Ref</strong></td>
        							<td class="text-center"><strong>Produit</strong></td>
        							<td class="text-center"><strong>Prix</strong></td>
        							<td class="text-center"><strong>Quantité</strong></td>
        							<td class="text-center"><strong>Poids</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td><?=$product['sku']?></td>
    								<td class="text-center"><?=$product['name']?></td>
    								<td class="text-center"><?=$product['price']?></td>
    								<td class="text-center"><?=$product['qty_invoiced']?></td>
    								<td class="text-center"><?=$product['weight']?></td>
    								<td class="text-right"><?=$product['price']?></td>
    							</tr>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Sous-total</strong></td>
    								<td class="thick-line text-right"><?=$product['price']?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Frais de port</strong></td>
    								<td class="no-line text-right"><?=$pay['shipping_captured']?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right"><?=$pay['amount_ordered']?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
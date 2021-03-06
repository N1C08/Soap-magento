<?php 
require 'cnx/cnx.php';
//require 'cnx/template.php';

//===== INVOICES INFOS ====

$invoice_info = $client->call($session, 'sales_order.info', $_GET['id']);
$ship=$invoice_info['shipping_address'];
$add=$invoice_info['billing_address'];
$product=$invoice_info['items'][0];
$pay=$invoice_info['payment'];
$history=$invoice_info['status_history'];
//var_dump($invoice_info);
//===== END OF INVOICES INFOS ====

?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2><?=$invoice_info['store_name']?></h2><h3 class="pull-right">Commande n°<?=($invoice_info['increment_id']);?></h3>
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
    					<?=$invoice_info['customer_email']?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Date d'achat:</strong><br>
    					<?=$invoice_info['created_at']?><br><br>
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
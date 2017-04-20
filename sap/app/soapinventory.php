<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">


<?php

$proxy = new SoapClient('http://nicolasb.wanalike.fr/magento/index.php/api/soap/?wsdl');
$sessionId = $proxy->login('SAP', 'cordonelec');

// Get stock info
var_dump($products=$proxy->call($sessionId, 'product_stock.list', 'sku'));



?>
<h2>Inventaire Boutiques</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:33%;">Sku</th>
    <th style="width:33%;">Quantité</th>
    <th style="width:33%;">Modifier</th>
  </tr>
  
  
<?php  foreach($products as $product){ 
	echo "<tr>";       
        echo "<td>".($product['sku'])." </td> ";        
        echo "<td>".($product['qty'])." </td> ";        
        
?>
			<td>
				<form class="form-inline" action='order_info.php' target="blank"> 
  				<button type="submit" class="btn btn-primary">Voir</button>
				</form>
			</td>
<?php 
    echo "</tr>";    
    }        ?>
  
</table>

<script src='js/filter.js'></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
require 'cnx/template.php';
require 'cnx/cnx.php';

//===== LIST INVOICES ====
$result = $client->call($session, 'order.list'); 
//var_dump ($result);
//===== END OF LIST INVOICES ====

//===== INVOICES INFOS ====
//===== END OF INVOICES INFOS ====

?>
<div class="container">
<!--===== LIST INVOICES ====-->
<h2>Factures Clients</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche par n°, client.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:25%;">N° commande</th>
    <th style="width:25%;">Boutique</th>
    <th style="width:25%;">Client </th>
    <th style="width:25%;">Statut</th>
    <th style="width:25%;">Facture</th>
  </tr>
  
  
<?php  foreach($result as $order){ ?>
  <tr>       
        <td><?=$order['increment_id']?></td>        
        <td><?=$order['store_name']?></td>        
        <td><?=$order['billing_name']?></td>    
        <td><?=$order['status']?></td> 
        <td>
          <form class="form-inline" action='order_info.php' target="blank"> 
            <button type="submit" class="btn btn-info">Voir</button>
          </form>
        </td>
  </tr>
<?php     
    } 
?>
  
</table>
<!--===== END OF LIST INVOICES ====-->
</div>
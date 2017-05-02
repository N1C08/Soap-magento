<?php
require 'cnx/template.php';
require 'cnx/cnx.php';

//=====CALL LIST INVOICES ====
$result = $client->call($session, 'order.list'); 
//var_dump ($result);
//===== END OF LIST INVOICES ====

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
          <a href="invoice_info.php?id=<?=$order['increment_id']?>" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Voir</a>
         <!--data-toggle="modal" data-target="#myModal" invoice_info.php?id=<?=$order['increment_id']?>-->

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <p></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </td>
  </tr>
<?php     
    } 
?>
</table>

<!--===== END OF LIST INVOICES ====-->
</div>
f<?php
require 'cnx/template.php';
require 'cnx/cnx.php';
//===== LIST CUSTOMERS ===

$cust = $client->call($session, 'customer.list');
//var_dump ($cust);
//===== END OF CUSTOMERS ===

//===== ADDRESS CUSTOMER =====
$add = $client->call($session, 'customer_address.list', '1');
  //var_dump ($add);
//===== END OF ADDRESS =====

?>
<div class="container">
      <!--===== LIST CUSTOMER ====-->
<h2>Listes Clients</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche par n°, prénom.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:25%;">N° client</th>
    <th style="width:25%;">Prénom</th>
    <th style="width:25%;">Nom </th>
    <th style="width:25%;">Email</th>
    <th style="width:25%;">Fiche client</th>
  </tr>
  
  
<?php  foreach($cust as $custs){ ?>
  <tr>     
        <td><?=$custs['customer_id']?></td>        
        <td><?=$custs['lastname']?></td>        
        <td><?=$custs['firstname']?></td>    
        <td><?=$custs['email']?></td>   
        <td>
          <a href="cust_info.php" type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Voir</a>
          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
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
<?php  }  ?>
  
</table>
<!--===== END OF CUSTOMER ===-->
    

<!--===== END OF LIST INVOICES ====-->
</div>
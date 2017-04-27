<?php
require 'cnx/template.php';
require 'cnx/cnx.php';

// Get stock info
$products = $client->call($session, 'catalog_product.list');
//var_dump($products);
//END OF GET STOCK
?>
<!--===== INVENTORY =====-->
<div class="container">
<h2>Inventaire Produits</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<button type="submit" name="qty" class="btn btn-default">Update</button><a class="btn btn-primary" href="soap_put_json.php" role="button">Link</a>
<table id="myTable">
  <tr class="header">
    <th style="width:33%;">Sku</th>
    <th style="width:33%;">Quantité</th>
    <th style="width:33%;">Boutique</th>
  </tr>
  
<?php  foreach($products as $product){
        $data=$product['sku'];
        $infos = $client->call($session, 'cataloginventory_stock_item.list', $data);
        //var_dump($infos); 
?>
    <tr> 
      <td><?=$product['sku']?></td>

      <?php foreach($infos as $stock){?>  
      <td><?=$stock['qty']?> pièce(s) </td>
      <?php }?>         
  </tr>
<?php }  ?>
</table>
</div>
<!--===== END OF INVENTORY =====-->
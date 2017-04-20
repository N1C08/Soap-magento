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

<table id="myTable">
  <tr class="header">
    <th style="width:33%;">Sku</th>
    <th style="width:33%;">Quantité</th>
    <th style="width:33%;">Modifier quantité</th>
  </tr>
  
<?php  foreach($products as $product){
        $data=$product['sku'];
        $infos = $client->call($session, 'cataloginventory_stock_item.list', $data);
        //var_dump($result); 
?>
    <tr> 
      <td><?=$product['sku']?></td>

      <?php foreach($infos as $stock){?>  

      <td><?=$stock['qty']?> pièce(s) </td>

      <?php }?>
      <td>
      <form class="form-inline" method="post" target="#">
      <div class="form-group">
        <input type="number" class="form-control" placeholder="Quantité">
      </div>
      <button type="submit" name="qty" class="btn btn-default">Update</button>
      <?php 
      if (!empty($_POST['qty'])) {
        echo "<h2>Inventaire Produits</h2>";
      }
      ?>
    </form>
    </td>         
  </tr>
<?php }  ?>
</table>
</div>
<!--===== END OF INVENTORY =====-->
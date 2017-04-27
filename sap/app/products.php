<?php
require 'cnx/template.php';
require 'cnx/cnx.php';
// Get stock info
//var_dump($products);
//END OF GET STOCK
?>
<!--===== INVENTORY =====-->
<div class="container">
<h2>Inventaire Produits</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:30%;">Sku</th>
    <th style="width:30%;">Quantité</th>
    <th style="width:30%;">Update</th>
    <th style="width:10%;">Supprimer</th>
  </tr>
  
<?php
$products=$client->call($session, 'catalog_product.list'); 


 foreach($products as $product){ 
  $id=$product['product_id'];
  $productqty=$client->call($session, 'product_stock.list', $id ); ?>
  
      <tr>       
        <td><?=$product['sku']?></td>         
        <td><?=$productqty [0]['qty']?></td>  
        <td>
          <form class="form-inline" method="POST" action="process.php">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Quantité"  name="qty">
            </div>
              <button type="submit" name="id" value="<?=$id?>" class="btn btn-success">Update</button>
          </form>
        </td> 
        <td>
          <form class="form-inline" method="POST" action="delete.php">
              <button type="submit" name="id" value="<?=$id?>" class="btn btn-danger">delete</button>
          </form>
        </td>             
      </tr>
<?php }  ?>
</table>
</div>
</table>
<!--===== END OF INVENTORY =====-->
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
    <th style="width:33%;">Sku</th>
    <th style="width:33%;">Quantité</th>
    <th style="width:33%;">Update</th>
  </tr>
  
<?php
$products=$client->call($session, 'catalog_product.list'); 


 foreach($products as $product){ 
  $id=$product['product_id'];
  $productqty=$client->call($session, 'product_stock.list', $id ); 
  echo "<tr>";       
        echo "<td>".($product['sku'])." </td> ";        
        echo "<td>".($productqty [0]['qty'])." </td> "; 


?>
            <td>
            <form class="form-inline" method="POST" action="process.php">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Quantité"  name="qty">
              </div>
              <button type="submit" name="id" value="<?=$id?>" class="btn btn-default">Update</button>
          
              </form>
 
            </td>         
          </tr>
<?php }  ?>
</table>
</div>
</table>
<!--===== END OF INVENTORY =====-->
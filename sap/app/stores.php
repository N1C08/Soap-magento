<?php require 'cnx/template.php';
			require 'cnx/cnx.php';

$stores = $client->call($session, 'store.list');
//var_dump ($stores);
?>
<div class="container">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Boutiques
              <small>Entreprise</small>
          </h1>
      </div>
  </div>
  <!-- /.row -->
  <!-- Projects Row -->
  <div class="row">
<?php 
	foreach ($stores as $store) {
?>
      <div class="col-md-3 portfolio-item">
          <a href="#">
              <img class="img-responsive" src="img/mage.png" alt="">
              <p>Nom: <?=$store['name']?></p>
          </a>
      </div>
  <?php }?>
  </div>
</div>
<hr>
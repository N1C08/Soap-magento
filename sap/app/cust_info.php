<?php
require 'cnx/cnx.php';

//===== LIST CUSTOMERS ===
$result = $client->call($session, 'customer.info', $_GET['id']);
//var_dump($result);
$num=$result['customer_id'];
$create=$result['created_at'];
$link=$result['updated_at'];
$firstname=$result['firstname'];
$name=$result['lastname'];
$mail=$result['email'];
//===== END OF CUSTOMERS ===

//===== ADDRESS CUSTOMER =====
$add = $client->call($session, 'customer_address.list', $_GET['id']);
  //var_dump ($add);
if (empty($add)) {
	$info=print_r('');
}else{
	$info=$add[0];
}

//===== END OF ADDRESS =====

?>
<div class="container">

    <h2>Compte client n°<?=$num?></h2>
		<h5>Créer le: <?=$create?></h5> <h5>Dernière modification: <?=$link?></h5>
   		<ul>
   			<li>Prénom: <?=$firstname?></li>
   			<li>Nom: <?=$name?></li>
   			<li>Email: <?=$mail?></li>
   			<li>Téléphone: <?=$info['telephone']?></li>
   			<li>Adresse: <?=$info['street']?></li>
   			<li>Ville: <?=$info['city']?></li>
   			<li>Region: <?=$info['region']?></li>
   			<li>Pays: <?=$info['country_id']?></li>
   		</ul>
</div>
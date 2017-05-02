<?php
require 'cnx/cnx.php';

//===== LIST CUSTOMERS ===
$result = $client->call($session, 'customer.info', $_GET['id']);
//var_dump($result);
if (empty($result)) {
	$result=print_r('');
}else{
	$result;
}
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
		<h5>Créer le: <span><?=$create?></span></h5> <h5>Dernière modification: <span><?=$link?></span></h5>
   		<ul>
   			<li><span>Prénom:</span> <?=$firstname?></li>
   			<li><span>Nom: </span><?=$name?></li>
   			<li><span>Email: </span><?=$mail?></li>
   			<li><span>Téléphone: </span><?=$info['telephone']?></li>
   			<li><span>Adresse: </span><?=$info['street']?></li>
   			<li><span>Ville: </span><?=$info['city']?></li>
   			<li><span>Region: </span><?=$info['region']?></li>
   			<li><span>Pays: </span><?=$info['country_id']?></li>
   		</ul>
</div>
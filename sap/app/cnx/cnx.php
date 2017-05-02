<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">


<script src='js/filter.js'></script>
<!-- jQuery library -->
<script src="js/jquery.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
<?php
//===== CONNECT customer/invoices=====
$client = new SoapClient('http://YOUR_MAGENTO_HOST/magento/index.php/api/soap/?wsdl'); // TODO : change url
$session = $client->login('API_USER', 'API_KEY'); // TODO : change login and pwd if necessary
API_KEY
//===== END OF customer/invoices ====

//===== CONNECT =====
$proxy = new SoapClient('http://YOUR_MAGENTO_HOST/magento/index.php/api/soap/?wsdl');
$sessionId = $proxy->login('API_USER', 'API_KEY');
//===== END OF  ====

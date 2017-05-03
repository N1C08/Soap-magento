

SOAP magento CONNECT

it's a module for access to your magento stock , SKU ,clients and order directly from your PC or from another place
GO in the folder cnx and modify the cnx.php with your 
API_USER and your API_KEY from your magento website
and modify the host like that
$proxy = new SoapClient('http://YOUR_MAGENTO_HOST/api/soap/?wsdl');
then you can have access to the stock of your website.
We work on the user login and password for a future version with more access to magento
You can go to this link for more docs about SOAP call 
http://devdocs.magento.com/guides/m1x/api/soap/introduction.html

we have work with magento 1.9.3 



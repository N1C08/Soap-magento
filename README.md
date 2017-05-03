

SOAP magento CONNECT

it's a module for access to your magento stock , SKU ,clients and order directly from your PC or from another place

GO in the folder cnx and modify the cnx.php with your 

API_USER and your API_KEY from your magento website

and modify the host like that

$proxy = new SoapClient('http://YOUR_MAGENTO_HOST/api/soap/?wsdl');

then you can have access to the stock of your website.

We work on the user login and password for a future version with more access to magento

You can go to this link for more docs about SOAP call and if you want to put more access to this module

http://devdocs.magento.com/guides/m1x/api/soap/introduction.html

we have work with magento 1.9.3 and suppose that's work for more version

if you have try with other version don't hesitate to let me know.






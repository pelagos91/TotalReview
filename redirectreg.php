<?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Total Review</title>
<link href="css/style.css" rel="stylesheet">
</head>

<?php
print(" <div class='container'>
        
		<p>Registrazione avvenuta con successo!</p>
		Verrai reinderizzato alla pagina principale.");
	
print("	<div class='push'></div></div> ");
	
print(" <!-- FOOTER --><br />
	    <div id='footer' class='footer'><script src='js/footerIndex.js'></script></div>
		</body></html>");
		
header('refresh: 4; url=index.php');

?>
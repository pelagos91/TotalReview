<?php
require 'include/db_connect.php';
require 'include/functions.php';
sec_session_start();



$username = $_SESSION['username'];
/*$logrec='<?xml version="1.0" encoding="UTF-8"?>';
$logrec.= '<!DOCTYPE schedaprodotto SYSTEM \"/xml/regole.dtd\">';
$logrec.='<recensioni>';
*/
$xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><!DOCTYPE recensioni SYSTEM \"/xml/regole.dtd\"><recensioni></recensioni>");

$sql = "SELECT nome, linkrecensione, linkprodotto, commento, categoria, data, autore FROM scheda ORDER BY data DESC LIMIT 5";
if($stmt = $mysqli->prepare($sql)){
$stmt->execute(); // esegue la query appena creata.
$stmt->store_result();
$stmt->bind_result($nome, $linkrec, $linkprod, $commento, $categoria, $data, $autore); 
    while ($stmt->fetch()){
		 $recensione = $xml->addChild('recensione');
         $recensione->addChild('nome', $nome);
         $recensione->addChild('link_recensione', $linkrec);
		 $recensione->addChild('link_prodotto', $linkprod);
		 $recensione->addChild('commento', $commento);
		 $recensione->addChild('categoria', $categoria);
		 $recensione->addChild('data', $data);
		 $recensione->addChild('autore', $autore);
         }
 }

	

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="TOTALREVIEW_Schede recenti"'.date("d-m-Y H:i:s").'-'.$username.'.xml');

print($xml->asXML());

	
?>
    
  
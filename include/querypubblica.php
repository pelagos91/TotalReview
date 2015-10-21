<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Query pubblica</title>
</head>

<body>
<h3>Selezione Documento pubblico</h3>
<? php
	/* prepara variabili per connessione MySQL */
	$server = "localhost:3306"; // indirizzo server e porta
	$username = "guest"; // DB username
	$password = "guest_pwd";// DB password
	
	/* Connessione al server MySQL */
	$con = mysql_connect ($server, $username, $password)or die (mysql_error());
	/* Selezione il DB per l’accesso */
	
	if (!mysql_select_db("ateneo", $con)){
		echo "<p> C’è stato un errore. Questo è un messaggio d’errore:</p>";
		echo "<p><b>" . mysql_error() . "</b></p>";
		echo "Per favore, per dettagli contattare gli amministratori di sistema";}
		
	/* Prepara la Query SQL */
	$sql = "SELECT * FROM documento";
	$sql .= " WHERE ( permessodocumento = '{$_POST['cognome_studente']}' )"
	/* Invia la Query SQL al DB attivo */
	$result = mysql_query($sql, $con);
		if (!$result) {echo("<p>Errore nell’esecuzione della query: " . mysql_error() . "</p>");
		
	exit();
	}
?>


<!--Inizializza la tabella con le intestazioni -->
<table border=1>
	<tr>
		<td><b>Matricola</b></td>
		<td><b>Cognome</b></td>
		<td><b>Nome</b></td>
		<td><b>Residenza</b></td>
		<td><b>CDS</b></td>
	</tr>
<?
/* Recupera le tuple dal result set MySQL e le formatta come righe di tabella HTML */
	while ($row = mysql_fetch_array($result)) {
		echo("<tr>\n<td>" . $row["matr"] . "</td>");
		echo("<td>" . $row["cognome"] . "</td>");
		echo("<td>" . $row["nome"] . "</td>");
		echo("<td>" . $row["residenza"] . "</td>");
		echo("<td>" . $row["CDS"] . "</td>\n</tr>\n\n");
	}
?>
<!-- Chiude la tabella HTML -->
</table>


<?
/* Chiude la connessione col server MySQL */
mysql_close ($con);
?>
</body> 
</html> 
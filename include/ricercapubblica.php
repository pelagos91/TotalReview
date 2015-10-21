<?php
	/*Connessione al database*/
	$handleDBConnection=privatedl_connect();
	/*require_once('risorse/dbconn.php');*/

if(isset($_POST['ok'])) {
echo "Ecco i risultati della tua ricerca:<br /><br /> ";
 
$parolacercata = split(" ", $_POST['cerca']);
$query = "SELECT * FROM `documento` WHERE (KEYWORDS LIKE '%$parolacercata[0]%' and PERMESSODOCUMENTO LIKE '0') OR (NOME LIKE '%$parolacercata[0]%' and PERMESSODOCUMENTO LIKE '0')";
$risultato = mysql_query($query);
while ($record = mysql_fetch_array($risultato)) { ?>
<?php echo $record['KEYWORDS'] ?> - <?php echo $record['PERMESSODOCUMENTO'] ?>
<?php }
} else {
}
?>
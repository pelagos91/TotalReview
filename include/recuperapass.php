<?php  

/************************** ANTONIO MENOLASCINA 575114 , ICD BARI 3° ANNO 
/***************************RECUPERA PASS
pagina "esterna" rispetto al resto del sito, ha l'unica funzionalità di far recuperare la password a chi l'ha dimenticata.
Il recupero avviene tramite creazione di una nuova password random temporanea, inviata tramite mail all'utente, che utilizzerà per accedere nuovamente al sito.

******************************/

	 require 'include/functions.php';

	/*Connessione al database*/
	$handleDBConnection=carpooling_connect();

	extract($_POST); 
	
	$errore = 0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carpooling - Recupera Password</title>
<style>
input.button{background:#4b98ad; border:2px solid #5aa1b4;  padding:4px; color:#eee; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; text-shadow: 2px 1px #5da1b4; cursor:pointer;}
input.button:active{margin:4px 0 0 0;}
input.text{height:29px; width:200px; border:none; padding:3px; background:#eee; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#999; font-size:14px;}

</style>

</head>

<body style="background:#D8D8D8; font-family:Georgia, 'Times New Roman', Times, serif; color:#fff; font-size:16px;">
<?php
	
	if($email != ""){
		
	echo "<div align='center'><br /><img src='img/logo.png' /><br /><br />";
	
	if(preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/', $email )){ $errore = 0;
    } else {  $errore = 1;}
	
	if($errore == 1) {
		
echo "<span style='padding:5px;background:#ffa4a4'>Si &egrave; verificato un problema con l'email inserita.</span><br /><br /><input type=\"button\" class=\"button rounded\" value=\" Riprova \"  onclick=\"location.href='recuperapass.php';\" /><br />oppure<br /><input type=\"button\" class=\"button rounded\" value=\" Torna alla Home \"  onclick=\"location.href='index.php';\" /><br />";

	} else {
		
$verificamail = carpooling_query("SELECT email FROM utenti WHERE email = '".$email."'", 'result');
if (carpooling_query($verificamail, 'num_rows') == 1){
	carpooling_query($verificamail, 'free');
echo "<span style='background:#d7efcd; padding:5px; color:#999;'>Il Recupero della Password è avvenuto con successo!</span><br><br>";
echo "<span style='background:#ffa4a4; padding:5px;'>Controlla la tua casella di posta elettronica, troverai la tua nuova password per accedere al sito.</span><br><br>";
echo "<input type=\"button\" class=\"button rounded\" value=\" Torna alla Home \"  onclick=\"location.href='index.php';\" />";

$pass = "";
// Generate a 8 char password
for ($i=0; $i<8; $i++)
  $pass .= chr(mt_rand(65, 90));
  

carpooling_query("UPDATE utenti SET pass = '".carpooling_encript($pass)."' WHERE email = '".$email."'");

$mittente = 'From: "Carpooling" <no_reply@carpooling.com> \r\n'; 
$reply = "Email automatica, non rispondere. no_reply@carpooling.com\r\n";  
$destinatario = "".$email.""; 
$oggetto = "Recupero Password - Carpooling."; 
$messaggio = "Ci è stata inviata una richiesta di recupero password per l'utente con questo indirizzo e-mail.\n\nLa tua nuova password è: ".$pass."";  
mail($destinatario, $oggetto, $messaggio, $mittente.$reply); 


} else {
	echo "<span style='padding:5px;background:#ffa4a4'>Si &egrave; verificato un problema con l'email inserita. Non esiste nessun utente iscritto con questa e-mail.</span><br /><br /><input type=\"button\" class=\"button rounded\" value=\" Riprova \"  onclick=\"location.href='recuperapass.php';\" /><br />oppure<br /><input type=\"button\" class=\"button rounded\" value=\" Torna alla Home \"  onclick=\"location.href='index.php';\" /><br />";
}  

}
	echo "</div>";
} else {
?>
<div align="center">
<br />
<img src="img/logo.png" />
<br />
<br />
<span style='background:#ffa4a4; padding:5px;'>Recupera la tua password.</span><br><br>
<span style='background:#d7efcd; padding:5px; color:#999;'>Inserisci l'indirizzo e-mail utilizzato nella registrazione!</span><br><br>
<form action="recuperapass.php" method="post">
<input type="text" maxlength="255" name="email" id="email" class="text" /><br /><br />
<input type="submit" class="button rounded" value=" Recupera la Password " /><br />
</form>
<br />
oppure<br />
<input type="button" class="button rounded" value=" Torna alla Home "  onclick="location.href='index.php';" /><br />


</div>
<?php } ?>
</body>
</html>
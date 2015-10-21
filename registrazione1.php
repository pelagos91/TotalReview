<?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Private Digital Library</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body onload = "registerEvents()">
<script type='text/javascript' src='js/sha512.js'></script>
<script type='text/javascript' src='js/forms.js'></script>
<?php
require 'include/db_connect.php';
require 'include/functions.php';
extract($_POST);

if(isset ($submit)){
	
	
sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
// Recupero la password criptata dal form di inserimento.
$password = $_POST['p']; 
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$username = $_POST['username'];
$email = $_POST['email'];

// Creo una chiave casuale
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

// Creo una password usando la chiave appena creata.
$password = hash('sha512', $password.$random_salt);

// Inserisco il codice SQL per eseguire la INSERT nel database
if ($insert_stmt = $mysqli->prepare("INSERT INTO utente (nome, cognome, username, password, mail, salt) VALUES (?, ?, ?, ?, ?, ?)")){
   $insert_stmt->bind_param('ssssss', $nome, $cognome, $username, $password, $email, $random_salt); 
   $insert_stmt->execute();
   
   header("location: redirectreg.php");
} 
}

print("	
        <br/><div id='registrazione' class='rounded registrazione' >
        <form id='regForm' method = 'post' action = 'registrazione.php' accept-charset='utf-8'>
		
           <strong>Username:</strong><br/>
		   <input type='text' name='username' style='height: 22px; width: 130px' /><br/>
	 
		   <strong>Password:</strong><br/>
           <input type='password' name='p' id='pass' class='text' style='height: 22px; width: 130px' /><br/>
	       
           <strong>Ripeti Password:</strong><br/>
           <input type='password' name='rp' id='password2' class='text' style='height: 22px; width: 130px' onblur='verificapw()' /> 
           <div id='info' class='info'></div> <br/>
           
		   <strong>Email:</strong><br/>	
		   <input type='text' name='email' style='height: 22px; width: 130px'/><br/><br/>
    
<input type='submit' name='submit' value='Registrati' class='regButton' onclick='formhash(this.form, this.form.pass)'/>
<input type='reset' class='cancButton' value='Annulla'/>
</form><br/>
</div>

<div class='push'></div>
</div>

<div id='footer' class='footer'><script src='js/footerIndex.js'></script></div>
</body>
</html>");



	 
?>




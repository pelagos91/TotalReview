<?php
require 'include/db_connect.php';
require 'include/functions.php';




   sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
   $username = $_POST['username'];
   $password = $_POST['password']; // Recupero la password criptata.
   // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
   if ($stmt = $mysqli->prepare("SELECT id, username, password, mail, permesso, attivo FROM utente WHERE username = ? AND attivo = 1 LIMIT 1")) { 
      $stmt->bind_param('s', $username); // esegue il bind del parametro '$username'.
      $stmt->execute(); // esegue la query appena creata.
      $stmt->store_result();
      $stmt->bind_result($user_id, $username, $db_password, $email, $permesso, $attivo); // recupera il risultato della query e lo memorizza nelle relative variabili.
      $stmt->fetch();
	  if($stmt->num_rows == 1) { // se l'utente esiste
         // verifichiamo che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
         if(checkbrute($user_id, $mysqli) == true) { 
            // Account disabilitato
            // Invia un e-mail all'utente avvisandolo che il suo account è stato disabilitato.
			echo 0;
         } else if (strcmp($db_password , crypt($password, $db_password)) == 0 ) {
			   // Password corretta!            
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
               $user_id = preg_replace("/[^0-9]+/", "", $user_id); // ci proteggiamo da un attacco XSS
               $_SESSION['user_id'] = $user_id; 
               $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
               $_SESSION['username'] = $username;
               $_SESSION['login_string'] =  crypt($db_password, $user_browser);
			   $_SESSION['permesso'] = $permesso;
               // Login eseguito con successo.
               echo 1;    
    } else {
        // Password incorretta.
            // Registriamo il tentativo fallito nel database.
            $now = time();
            $mysqli->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
            echo 0;
    } }  else {
         // L'utente inserito non esiste.
		 echo 0;
      }
   }

?>


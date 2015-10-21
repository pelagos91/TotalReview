<?php

require 'include/db_connect.php';
require 'include/functions.php';

sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura

// Recupero la password criptata dal form di inserimento.
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Creo una chiave casuale
//$random_salt = uniqid(mt_rand(1, mt_getrandmax()), true);

// Creo una password usando la chiave appena creata.


// Create a random salt
$hash = password_hash($password, PASSWORD_DEFAULT);



// Inserisco il codice SQL per eseguire la INSERT nel database
if ($insert_stmt = $mysqli->prepare("INSERT INTO utente (username, password, mail) VALUES (?, ?, ?)")){
   $insert_stmt->bind_param('sss', $username, $hash, $email); 
   $insert_stmt->execute();
   
   echo 1;

} else echo 0;
?>
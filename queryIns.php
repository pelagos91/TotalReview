<?php

require 'include/db_connect.php';
require 'include/functions.php';

sec_session_start();


$nome = $_POST['nome'];
$linkrec = $_POST['linkrec'];
$linkprod = $_POST['linkprod'];
$commento = $_POST['commento'];
$categoria = $_POST['categoria'];
$autore = $_SESSION['username'];
$data = date("Y-m-d H:i:s");


if ($insert_stmt = $mysqli->prepare("INSERT INTO scheda (nome, linkrecensione, linkprodotto, commento, categoria, data, autore) VALUES (?, ?, ?, ?, ?, ?, ?)")){
   $insert_stmt->bind_param('sssssss', $nome, $linkrec, $linkprod, $commento, $categoria, $data, $autore); 
   $insert_stmt->execute();
   
   echo 1;

} else echo 0;

?>

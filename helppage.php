<?php
require 'include/db_connect.php';
require 'include/functions.php';
sec_session_start();
if(login_check($mysqli) == true) { //Rendo la pagina inacessibile a chi non è loggato, avvalendomi della funzione login_check
$permesso = $_SESSION['permesso'];



echo "<h1>Help page <small>Total Review</small></h1>
<p>Total Review è un aggregatore di recensioni online su prodotti hi-tech. 
La pagina iniziale mostra il form per effettuare il login e un pulsante per effettuare la registrazione al sistema.</p><hr>
<p>Nella home page sono presenti 2 menu:
<ol><li>Il menu superiore contiene il link per effettuare il logout e, nel caso si disponga dei permessi necessari, mostra un link per accedere alle funzionalità amministrative.</li>
<li>Il menu laterale mostra un link alla pagina di aiuto e un link per esportare le schede visualizzate in formato xml.</li></ol></p>
<p>Nella parte centrale è presente una tabella dove vengono mostrate le ultime 5 schede inserite nel sistema. Questa tabella viene aggiornata con le schede inserite dall’utente corrente, quando viene premuto il pulsante “Le mie recensioni”.</p><hr>
<p>Nella parte centrale superiore sono presenti 3 pulsanti, corrispondenti alle 3 principali features della web app:
     <ol><li>Il pulsante <strong>“inserisci recensione”</strong> attiva il form di inserimento della recensione; ogni recensione è composta da: </li>
         <ol><li>Nome del prodotto;</li> 
             <li>Link alla recensione;</li>
             <li>Link alla pagina del prodotto sul sito del produttore o su uno store online;</li>
             <li>Commento sulla recensione che si sta catalogando;</li>
             <li>Categoria del prodotto (Hardware/Software).</li></ol><hr>
         <li>Il pulsante <strong>“le mie recensioni”</strong> aggiorna la tabella in basso con le recensioni inserite dall’utente corrente;</li>
         <li>Il pulsante <strong>“cerca”</strong> mostra un form per effettuare la ricerca delle schede all’interno del sistema, mostrando i risultati nella tabella in basso.</li>
";
	  
	  
	  
	  





}else echo "non autorizzato"; ?>




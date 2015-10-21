<?

define("HOST", "localhost"); // E' il server a cui ti vuoi connettere.
define("USER", "root"); // E' l'utente con cui ti collegherai al DB.
define("PASSWORD", "root"); // Password di accesso al DB.
define("DATABASE", "miodb"); // Nome del database.
define("PORT", "8180");
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE, PORT);
// Se ti stai connettendo usando il protocollo TCP/IP, invece di usare un socket UNIX, ricordati di aggiungere il parametro corrispondente al numero di porta.

?>
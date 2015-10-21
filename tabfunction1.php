<?php
require 'include/db_connect.php';
require 'include/functions.php';
sec_session_start();

$username = $_SESSION['username'];

echo "<table class='table table-striped'>
              <thead>
                <tr>
                  <th>Nome Prodotto</th>
                  <th>Link recensione</th>
                  <th>Link prodotto</th>
                  <th>Commento</th>
                  <th>Categoria</th>
                  <th>Data</th>
                  <th>Autore</th>
                </tr>
              </thead>
              <tbody>";

if ($stmt = $mysqli->prepare("SELECT nome, linkrecensione, linkprodotto, commento, categoria, data, autore FROM scheda WHERE autore = ? ORDER BY data DESC")) { 
      $stmt->bind_param('s', $username); // esegue il bind del parametro '$username'.
      $stmt->execute(); // esegue la query appena creata.
      $stmt->store_result();
      $stmt->bind_result($nome, $linkrec, $linkprod, $commento, $categoria, $data, $autore); 
while($stmt->fetch()){	
	         echo "<tr>";
             echo "<td>".$nome."</td>";
             echo "<td><a href=\"http://".$linkrec."\" target='_blank'>".$linkrec."</a></td>";
	         echo "<td><a href=\"http://".$linkprod."\" target='_blank'>".$linkprod."</a></td>";
	         echo "<td>".$commento."</td>";
	         echo "<td>".$categoria."</td>";
	         echo "<td>".$data."</td>";
	         echo "<td>".$autore."</td>";
	         echo "</tr>";
             }
	 	    	
echo "</table>";
}
?>  
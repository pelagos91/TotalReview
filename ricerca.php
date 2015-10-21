<?php
require 'include/db_connect.php';
require 'include/functions.php';
sec_session_start();
if(login_check($mysqli) == true) { //Rendo la pagina inacessibile a chi non è loggato, avvalendomi della funzione login_check
$permesso = $_SESSION['permesso'];


echo '<h3>Ricerca</h3>
   
           
		  <form class="navbar-form" role="search">
           <strong>Ricerca per prodotto:</strong>
           <div class="input-group">
                    
                    <input type="text" class="form-control" placeholder="Ricerca per prodotto" name="Nome prodotto">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>

           <br/>
	       <br/> 
	       
           <strong>Ricerca per utente:  </strong>
           <div class="input-group">                   
                    <input type="text" class="form-control" placeholder="Nome utente" name="ut" id="ut">
                    <div class="input-group-btn">
					    <button class="btn btn-default" type="submit" id="btn3"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
			</form>
		
';


}else echo "non autorizzato"; ?>

	<script type="text/javascript">
			
  </script>


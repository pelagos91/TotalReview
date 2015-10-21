<?php /*
        Realizzato da:
		Pellegrino Agostino   602076 	a.pellegrino24@studenti.uniba.it
        
        
     ---------------------------------- HOME --------------------------------------------------------------
     
     Pagina principale del sistema TOTALREVIEW, viene mostrata una breve descrizione delle funzionalità e un menu
	 che consente di scegliere se effettuare il login o effettuare un accesso pubblico
	 
*/

require 'include/db_connect.php';
require 'include/functions.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Total Review</title>
        
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    
        
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">    
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script type='text/javascript' src='js/forms.js'></script>
	</head>

<body>
  <!--AREA LOGIN-->
  
 <div class="container">
	  	  
		      <form class="form-login" method='post' id='modulo_login' />
		        <h2 class="form-login-heading" id="loginTitle" style="background-color:#1A1A1A">Accedi a TotalReview</h2>
		        <div class="login-wrap" id="loginArea">
		            <input type="text"  name='username' id='username' class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" name='password' id='password' class="form-control" placeholder="Password">
		            
		            <button class="btn btn-theme btn-block" type="submit" id= 'submit' style="background-color:#1952C4">SIGN IN<div id='messaggio'></div></button>
		          
                    <hr>
		            
		            
		            <div class="registration">
		                Non hai ancora un account?<br/>
		                <tr><td><button type="button" id="regBtn">Registrati!</button></td></tr>
		            </div>
		        </form>
		        
           </div>
            
 
  <!--AREA REGISTRAZIONE-->
 
 
	  	
  
		   <form class="form-login" id='regForm' method = 'post' onmouseover="verificaCount();" />
		        <h2 class="form-login-heading" id="regTitle" style="background-color:#1A1A1A">Registrazione</h2>
		        <div class="login-wrap" id="regArea">
           <label for="user">Username:</label>
           <input type='text' class="form-control" name='username' id='user' onblur='verificaUser();verificaCount();verificapw();verificaEmail();' />
           <div id='infoU' class='info'></div> <br/>
	        
          
		   <label for="pass">Password:</label>
           <input type='password' name='password' class="form-control" id='pass'/><br/>
	       
           
           <label for="password2">Ripeti password:</label>
           <input type='password' name='rp' id='password2' class="form-control" onblur='verificapw();verificaUser();verificaEmail();verificaCount();' /> 
           <div id='info' class='info'></div> <br/>
           
          
		   <label for="mail">Email:</label>
		   <input type='email' name='email' id='mail' class="form-control" onblur='verificaEmail();verificaUser();verificapw();verificaCount();'/>
           <div id='infoE' class='info'></div> <br/>
            
    
           <div id="buttonDiv" onmousemove="verificaCount();" onmouseout="verificaCount();" ><button type='submit' class="btn btn-theme btn-block" id='subBtn' name='submissionBtn' style="background-color:#1952C4">Invia</button></div>
           <div id='messaggio1'></div>
           </form>
           
           
           </div>
           </div>
  <!--AREA MENU UTENTE-->
  
  <!--AREA RICERCA-->
  
 
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#regArea").hide();
$("#insertBtn").hide();
$("#regTitle").hide();
$("#regBtn").click(function(){
	$("#regForm").show();
	$("#regArea").show();
	$("#regTitle").show();
	$("#loginArea").hide();
	$("#loginTitle").hide();
	
});


$("#modulo_login").submit(function() {
  // passo i dati (via POST) al file PHP che effettua le verifiche 
  $.post("login.php", { username: $('#username').val(), password: $('#password').val()}, function(risposta) {
    // se i dati sono corretti...
    if (risposta == 1) {
      // applico l'effetto allo span con id "messaggio"
      $("#messaggio").fadeTo(200, 0.1, function() {
        // per prima cosa mostro, con effetto fade, un messaggio di attesa
        $(this).removeClass().addClass('corretto').text('Login in corso...').fadeTo(900, 1, function() {
          // al termine effettuo il redirect alla pagina privata
          document.location = 'home.php';
        });
      });
    // se, invece, i dati non sono corretti...
    }else{
      // stampo un messaggio di errore
      $("#messaggio").fadeTo(200, 0.1, function() {
        $(this).removeClass().addClass('errore').text('Dati di login non corretti!').fadeTo(900,1);
      });
    }
  });
  // evito il submit del form (che deve essere gestito solo dalla funzione Javascript)
  return false;
});


//Gestione Ajax modulo di registrazione
$("#regForm").submit(function() {
  // passo i dati (via POST) al file PHP che effettua le verifiche 
  $.post("queryReg.php", { username: $('#user').val(), password: $('#pass').val(), email: $('#mail').val()}, function(risposta) {
    // se i dati sono corretti...
    if (risposta == 1) {
      // applico l'effetto allo span con id "messaggio"
      $("#messaggio1").fadeTo(200, 0.1, function() {
        // per prima cosa mostro, con effetto fade, un messaggio di attesa
        $(this).removeClass().addClass('corretto').text('Registrazione avvenuta con successo!').fadeTo(900, 1, function() {
          // al termine effettuo il redirect alla pagina privata
          document.location = 'index.php';
        });
      });
    // se, invece, i dati non sono corretti...
    }else{
      // stampo un messaggio di errore
      $("#messaggio1").fadeTo(200, 0.1, function() {
        $(this).removeClass().addClass('errore').text('Errore').fadeTo(900,1);
      });
    }
  });
  // evito il submit del form (che deve essere gestito solo dalla funzione Javascript)
  return false;
});

});
</script>
<!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("img/bg2.jpg", {speed: 500});
    </script>


    
 </body></html>

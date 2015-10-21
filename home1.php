<?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
<?php
require 'include/db_connect.php';
require 'include/functions.php';
sec_session_start();
if(login_check($mysqli) == true) { //Rendo la pagina inacessibile a chi non è loggato, avvalendomi della funzione login_check

// gestisco la richiesta di logout
if (isset($_GET['logout'])) {
  session_destroy();
  echo "Sei uscito con successo";
  exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Total Review</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/style.css" rel="stylesheet">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
		    <script src="js/bootstrap.min.js"></script>
            <script type='text/javascript' src='js/forms.js'></script>
           <!-- <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script> -->
	</head>
<body>
<!-- CONTENUTO AREA PRIVATA -->
 <section id="container" >
 
<?php
$utente=$_SESSION['username'];
print "benvenuto $utente";
?>
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">TOTAL REVIEW</a>
        </div><!--chiude navbar-header -->
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="#">Profilo</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li> -->
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div><!--chiude navbar -->
      </div><!--chiude container-fluid -->
   </nav>

<div class="container-fluid">
      
      <div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              <li class="active"><a href="#">Overview</a></li>
              <li><a href="#">Profilo</a></li>
              <li><a href="#">Help</a></li>
              <li><a href="#">Export</a></li>
            </ul>
                     
        </div><!-- chiude sidebar-->
        
        <div class="col-sm-9 col-md-10 main" id="cont1">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Benvenuto!
            <p class="lead">Total Review è un aggregatore di recensioni su prodotti hi-tech. Inizia subito inserendo la tua prima recensione!
</p>
          </h1>

          <div class="row placeholders">
            
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <button id="btn"><img src="img/pencil.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
              <h4>Inserisci recensione</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <button><img src="img/folder.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
              <h4>Le mie recensioni</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <button><img src="img/search.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
              <h4>Ricerca</h4>
              <span class="text-muted">Something else</span>
            </div>
          
           <!--    <div class="col-xs-6 col-sm-3 placeholder text-center">
              <img src="//placehold.it/200/66ff66/fff" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div> -->
          </div> <!--chiude row placeholders -->
          
          <hr>



          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
            </table>
          </div>                  
      </div><!--chiude cont1-->
	


 <div class="col-sm-9 col-md-10 main" id="cont2">
  <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		 

          <div class="row placeholders">
            
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <button id="btn"><img src="img/pencil.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
              <h4>Inserisci recensione</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <button><img src="img/folder.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
              <h4>Le mie recensioni</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <button><img src="img/search.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
              <h4>Ricerca</h4>
              <span class="text-muted">Something else</span>
            </div>
          
           <!--    <div class="col-xs-6 col-sm-3 placeholder text-center">
              <img src="//placehold.it/200/66ff66/fff" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div> -->
            <form action="http://tinyurl.com/create.php" method="post" target="_blank">
              <table align="center" cellpadding="5" bgcolor="#E7E7F7"><tr><td>
                <b>Inserisci di seguito il tuo link:</b><br />
                <input type="text" name="url" size="30"><input type="submit" name="submit" value="Make TinyURL!">
              </td></tr></table>
            </form>

          </div> <!-- chiude row placeholders -->
          
         
        <hr>  

  <h3>Nuova scheda prodotto</h3>
     <!-- <form class="form-horizontal well" id="insForm" method="post">
        
          <legend>Inserire di seguito i dati richiesti</legend>
          <div class="control-group">
            <label class="control-label" >Nome prodotto</label>
            <div class="controls">
              <input type="text" class="form-control input-xlarge" name="nome">
              <p class="help-block">Inserisci il nome del prodotto</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Link recensione</label>
            <div class="controls">
              <input type="text" class="form-control input-xlarge" name="linkrec">
              <p class="help-block">Inserisci il link alla pagina della recensione (è preferibile usare l'url shortner in alto a sinistra)</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Link prodotto</label>
            <div class="controls">
              <input type="text" class="form-control input-xlarge" name="linkprod">
              <p class="help-block">Inserisci il link alla pagina ufficiale del prodotto o, in alternativa, alla pagina di uno shop online (es. Amazon) (è preferibile usare l'url shortner in alto a sinistra)</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Commento</label>
            <div class="controls">
              <textarea class="form-control input-xlarge" name="commento" rows="3"></textarea>
              <p class="help-block">Inserisci un commento alla recensione</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Categoria prodotto</label>
            <div class="controls">
              <select name="categoria" class="form-control">
                <option>Hardware</option>
                <option>Software</option>
              </select>
            </div>
          </div> 
          
         <hr>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary" id="insBtn">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
            <div id='messaggio'></div>
          </div>
      </form> -->
        <form class="form-horizontal well" id='regForm' method = 'post' />
		        <h2 class="form-login-heading" id="regTitle">Registrazione</h2>
		        <div class="login-wrap" id="regArea">
           <label for="nome">Username:</label>
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
            
    
           <div class="form-actions" onmousemove="verificaCount();" onmouseout="verificaCount();"><button type='submit' class="btn btn-primary" id='subBtn' name='submissionBtn'>Invia</button>
           <div id='messaggio1'></div>
            
         
          <button type="reset" class="btn">Cancel</button>
           </form>
      
    </div> <!-- ciude cont2 -->
  
  </div><!--/.container-->
  </div>
 </section>

<script type="text/javascript">
$(document).ready(function() {
$("#cont2").hide();
$("#btn").click(function(){
	$("#cont2").show();
	$("#cont1").hide();
});

$("#regForm").submit(function() {
  // passo i dati (via POST) al file PHP che effettua le verifiche 
  $.post("queryIns.php", { username: $('#user').val(), password: $('#pass').val(), email: $('#mail').val()}, function(risposta) {
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


<footer>
  <p class="pull-right">©2015 Progetto realizzato da Agostino Pellegrino</p>
</footer>

</body>
</html>
<!-- $("#insForm").submit(function() {
  // passo i dati (via POST) al file PHP che effettua le verifiche 
  $.post("queryIns.php", { nome: $('#nome').val(), linkrec: $('#linkrec').val(), linkprod: $('#linkprod').val()}, function(risposta) {
    // se i dati sono corretti...
    if (risposta == 1) {
      // applico l'effetto allo span con id "messaggio"
      $("#messaggio").fadeTo(200, 0.1, function() {
        // per prima cosa mostro, con effetto fade, un messaggio di attesa
        $(this).removeClass().addClass('corretto').text('Inserimento avvenuto con successo!').fadeTo(900, 1, function() {
          // al termine effettuo il redirect alla pagina privata
          document.location = 'home.php';
        });
      });
    // se, invece, i dati non sono corretti...
    }else{
      // stampo un messaggio di errore
      $("#messaggio").fadeTo(200, 0.1, function() {
        $(this).removeClass().addClass('errore').text('Errore').fadeTo(900,1);
      });
    }
  });
  // evito il submit del form (che deve essere gestito solo dalla funzione Javascript)
  return false;
});-->


<?php }else echo "non autorizzato";



 
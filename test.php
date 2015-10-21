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
            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		    <script src="js/bootstrap.min.js"></script>
            <script type='text/javascript' src='js/forms.js'></script>
           <!-- <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script> -->
	</head>
<body>
<!-- CONTENUTO AREA PRIVATA -->
<section id="container" >
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">TOTAL REVIEW</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="#">Profilo</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li> -->
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
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
                     
        </div><!--/span-->
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <button><img src="img/pencil.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
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
          </div>
          
         
          

  <h3>Ricerca</h3>
      <form class="form-horizontal well">
        <fieldset>
          <legend>Inserire di seguito i dati richiesti</legend>
          <div class="control-group">
            <label class="control-label" for="input01">Nome prodotto</label>
            <div class="controls">
              <input type="text" class="form-control input-xlarge" id="input01">
              <p class="help-block">Inserisci il nome del prodotto</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="textarea">Commento</label>
            <div class="controls">
              <textarea class="form-control input-xlarge" id="textarea" rows="3"></textarea>
              <p class="help-block">Inserisci un commento alla recensione</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input01">Link recensione</label>
            <div class="controls">
              <input type="text" class="form-control input-xlarge" id="input03">
              <p class="help-block">Inserisci il link alla pagina della recensione</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input01">Link prodotto</label>
            <div class="controls">
              <input type="text" class="form-control input-xlarge" id="input04">
              <p class="help-block">Inserisci il link alla pagina ufficiale del prodotto o, in alternativa, alla pagina di uno shop online (es. Amazon)</p>
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="select01">Categoria prodotto</label>
            <div class="controls">
              <select id="select01" class="form-control">
                <option>Hardware</option>
                <option>Software</option>
              </select>
            </div>
          </div>
          
         <hr>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</section>

<footer>
  <p class="pull-right">©2015 Progetto realizzato da Agostino Pellegrino</p>
</footer>

</body>
</html>


<?php }else echo "non autorizzato";




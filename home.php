<?php
require 'include/db_connect.php';
require 'include/functions.php';
sec_session_start();
if(login_check($mysqli) == true) { //Rendo la pagina inacessibile a chi non è loggato, avvalendomi della funzione login_check
$permesso = $_SESSION['permesso'];
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
	</head>
<body class="active">
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
          <a class="navbar-brand" href="home.php">TOTAL REVIEW</a>
        
        </div><!--chiude navbar-header -->
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li id="logout"><a href="logout.php">Logout</a></li> 
            <?php
			
			if($permesso=='1'){				
            echo "<li><a href='#'>Pannello amministratore</a></li>";
			}
             ?>
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
              <li class="active"><a href="home.php">Home</a></li>
              <li><a href="#">Profilo</a></li>
              <li><a href="#" id="helplink">Help</a></li>
              <li id="export_recent"><a href="downloadxml.php">Export schede recenti</a></li>
              <li id="export_personal"><a href="downloadxml1.php">Export schede personali</a></li>
            </ul>
                     
        </div><!-- chiude sidebar-->
        
        <div class="col-sm-9 col-md-10 main" id="cont1">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">><i><span class="glyphicon glyphicon-menu-hamburger"></span></i></button>
          </p>
          
		  <h1 class="page-header" id="msgbenvenuto">
            Benvenuto 
          <?php
          $utente=$_SESSION['username'];
          print "$utente";
          ?>!
            <p class="lead">Total Review è un aggregatore di recensioni su prodotti hi-tech. Inizia subito inserendo la tua prima recensione!</p>
          </h1>

          <div class="row placeholders" id="rowdiv">
            
            <div class="col-xs-6 col-sm-3 placeholder text-center" >
              <button id="btn"><img src="img/pencil.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
              <h4>Inserisci recensione</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <button id="btn1"><img src="img/folder.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
              <h4>Le mie recensioni</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <button id="btn2"><img src="img/search.png" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail"></button>
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



          <h2 class="sub-header" id="titolo1">Schede recenti</h2>
          <h2 class="sub-header" id="titolo2">Le mie recensioni</h2>
         
          <div class="table-responsive" id="tabella"></div> 
          
          <div class="row placeholders" id="divtabsearch">
          <h3>Ricerca</h3> 
		  <form class="navbar-form" role="search">
           <strong>Ricerca per prodotto:</strong>
           <div class="input-group">
                    
                    <input type="text" class="form-control" placeholder="Ricerca per prodotto" name="np" id="np">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" id="btnprod"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
           </form>
           <br/>
	       <br/> 
	       <form class="navbar-form" role="search1">
           <strong>Ricerca per utente:  </strong>
           <div class="input-group">                   
                    <input type="text" class="form-control" placeholder="Ricerca per nome utente" name="ut" id="ut">
                    <div class="input-group-btn">
					    <button class="btn btn-default" type="submit" id="btnut"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
			</form>
             
            </div><!-- chiude div tab search -->
            <hr>
       <h2 class="sub-header" id="titolo3">Risultato ricerca</h2>
       <div class="table-responsive" id="tabella2"></div> 
       
   
                         
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

  <h3>Nuova scheda prodotto</h3>
   
           <form class="form-horizontal well" id='regForm' method = 'post'>
		        
           <label for="nome">Nome prodotto:</label>
           <input type='text' class="form-control" name='nome' id='nome'/>
           <br/>
	        
          
		   <label for="linkrec">Link recensione:</label>
           <input type='text' name='linkrec' class="form-control" id='linkrec'/><br/>
	       
           
           <label for="linkprod">Link prodotto:</label>
           <input type='text' name='linkprod' id='linkprod' class="form-control"/><br/>
           
          
		   <label for="commento">Commento:</label>
		   <textarea type='text' name='commento' id='commento' class="form-control" rows="3"></textarea>
          <br/>
            
             <label class="control-label" for="categoria">Categoria prodotto</label>
            
              <select name='categoria' class="form-control" id="categoria">
                <option>Hardware</option>
                <option>Software</option>
              </select>
           <br/>
            
    
           <div class="form-actions"><button type='submit' class="btn btn-primary" id='subBtn' name='submissionBtn'>Invia</button>
           <button type="reset" class="btn">Cancel</button></div>
           <div id='messaggio1'></div>
            
         
          
           </form>
    </div> <!-- ciude cont2 -->
    
    
  
    
   
    
  
  </div><!--/.container-->
  </div>
 </section>

<script type="text/javascript">
$body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});


$(document).ready(function() {
$("#cont2").hide();
$("#titolo2").hide();
$("#titolo3").hide();
$("#divtabsearch").hide();
$("#export_recent").show();
$("#export_personal").hide();
$.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "tabfunction.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#tabella").html(response); 
            //alert(response);
        } 
     });
	 
$("#btn1").click(function(){ 
        $("#titolo1").hide();
		$("#titolo2").show();
		$("#export_recent").hide();
        $("#export_personal").show();
		$("#divtabsearch").hide();
        $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "tabfunction1.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#tabella").html(response); 
            //alert(response);
        } 
     });
  });
 
$("#helplink").click(function(){ 
        $("#msgbenvenuto").hide();
		$("#tabella").hide();
		$("#titolo1").hide();
		$("#titolo3").hide();
		$("#divtabsearch").hide();
		$("#tabella2").hide();
        $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "helppage.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#rowdiv").html(response); 
            //alert(response);
        } 
     });
  });
  


$("#btn").click(function(){
	$("#cont2").show();
	$("#cont1").hide();
	$("#divtabsearch").hide();
});

$("#regForm").submit(function() {
  // passo i dati (via POST) al file PHP che effettua le verifiche 
  $.post("queryIns.php", { nome: $('#nome').val(), linkrec: $('#linkrec').val(), linkprod: $('#linkprod').val(), commento: $('#commento').val(), categoria: $('#categoria').val()}, function(risposta) {
    // se i dati sono corretti...
    if (risposta == 1) {
      // applico l'effetto allo span con id "messaggio"
      $("#messaggio1").fadeTo(200, 0.1, function() {
        // per prima cosa mostro, con effetto fade, un messaggio di attesa
        $(this).removeClass().addClass('corretto').text('Inserimento avvenuto con successo!').fadeTo(900, 1, function() {
          // al termine effettuo il redirect alla pagina privata
          document.location = 'home.php';
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

             

      


$("#btn2").click(function(){ 
        $("#msgbenvenuto").hide();
		$("#tabella").hide();
		$("#divtabsearch").show();
		$("#titolo1").hide();
		$("#titolo2").hide();
  });
});


$("#btnut").click(function(){ 
        var ut = $("#ut"); 
		$("#titolo3").show();
	   <!--$("#divtabsearch").hide(); -->
        $.ajax({    //create an ajax request to load_page.php
        type: "post",
		data: ut,
        url: "tabsearchut.php",             
        datatype: "html",   
        success: function(response){                    
            $("#tabella2").html(response); 
            //alert(response);
        } 
     });  
	 return false;
  }); 
  

  
</script>





<div class="modal"><!-- Place at bottom of page --></div>
<footer>
  <p class="pull-right"><small>©2015 Progetto realizzato da Agostino Pellegrino</small></p>
</footer>

</body>
</html>



<?php }else echo "non autorizzato"; ?>



 
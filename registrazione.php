<?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type='text/javascript' src='js/forms.js'></script>
</head> 

<?php
require 'include/db_connect.php';
require 'include/functions.php';
sec_session_start();
if(login_check($mysqli) == true) {

print("	<br/><div id='registrazione' class='rounded registrazione' >
        <form id='regForm' action='queryReg.php' method = 'post' accept-charset='utf-8'>
		
           <strong>Username:</strong><br/>
		   <input type='text' name='username' id='user' style='height: 22px; width: 130px' /><br/>
	 
		   <strong>Password:</strong><br/>
           <input type='password' name='password' id='pass' class='text' style='height: 22px; width: 130px' /><br/>
	       
           <strong>Ripeti Password:</strong><br/>
           <input type='password' name='rp' id='password2' class='text' style='height: 22px; width: 130px' onblur='verificapw()' /> 
           <div id='info' class='info'></div> <br/>
           
		   <strong>Email:</strong><br/>	
		   <input type='text' name='email' id='mail' style='height: 22px; width: 130px'/><br/><br/>
    
           <input type='submit' name='subBtn' value='Registrati' class='regButton'/>
           <input type='reset' class='cancButton' value='Annulla' onclick='registerEvents()'/>
           </form><br/></div>");?>


<?
} else echo 'area riservata!';








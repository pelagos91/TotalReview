var counter=1;



function verificapw(){
var password1 = document.getElementById("pass").value;
var password2 = document.getElementById("password2").value;
if ((password1 != "")&&(password2 == "")){
	document.getElementById('info').innerHTML="<span style='background:#ffcbcb'>Conferma la password! Non lasciare vuoto.</span>";
    counter=1;
} else if((password2 != "")&&(password1 != password2)&&(password1!="")){ 
	document.getElementById('info').innerHTML="<span style='background:#ffcbcb'>La password inserita NON corrisponde.</span>";
    counter=1;
} else if((password2 != "")&&(password1 == password2)){
	document.getElementById('info').innerHTML="<span style='background:#d7efcd'>OK! Password corrispondente.</span>";
    counter=0;
} else if((password1 == "")&&(password2 != "")){
	document.getElementById('info').innerHTML="<span style='background:#ffcbcb'>Inserisci la password! Non lasciare il primo campo vuoto.</span>";
    counter=1;
} else if ((password1 == "")&&(password2 == "")){
	document.getElementById('info').innerHTML="<span style='background:#ffcbcb'>Inserisci la password! Non lasciare i campi vuoti.</span>";
}
}

function registerEvents()
         {
            document.getElementById( "regForm" ).onreset = function()
            {
				  confirm( "Sei sicuro di voler annullare l'operazione? Cliccando su OK verrai reindirizzato alla pagina di accesso." );
				  return window.location.href = "index.php";
			     
            } 
         } 
	
function verificaUser(){
	var username = document.getElementById("user").value;
    if(username==""){
		document.getElementById('infoU').innerHTML="<span style='background:#ffcbcb'>Non lasciare il campo vuoto!</span>";
		counter=1;
	}else{
		 document.getElementById('infoU').innerHTML="<span style='background:#d7efcd'>OK!</span>";
		 counter=0;
	}
}

function verificaEmail(){
var email_reg_exp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;
var email = document.getElementById("mail").value;
if (!email_reg_exp.test(email) || (email == "") || (email == "undefined")) {
   counter=1;
   document.getElementById('infoE').innerHTML="<span style='background:#ffcbcb'>Inserire un indirizzo mail corretto!</span>";
      
}else {
	document.getElementById('infoE').innerHTML="<span style='background:#d7efcd'>Indirizzo email corretto!</span>";
	counter=0;
}
}

function verificaCount(){
	document.getElementById("subBtn").disabled = true;
	if(counter!=0){ document.getElementById("subBtn").disabled = true; 
		}else document.getElementById("subBtn").disabled = false;
			}




	
/************************** ANTONIO MENOLASCINA 575114 , ICD BARI 3° ANNO 
/************************** MESSAGGIO.JS
questo file js si occupa principalmente di controllare che nell'invio dell'email ad un utente qualsiasi non vengano inserite informazioni sbagliate.
Oltre ai classici controlli, viene verificato anche la textarea non superi i 500 caratteri.
******************************/

var controllomsgglob = 0;
function mostramsg(){
	window.scrollTo(0,0);
	document.getElementById('messaggiodiv').style.display='block';

}

function chiudimsg(){
document.getElementById('messaggiodiv').style.display='none';
document.getElementById('messaggiodiv').innerHTML='';
 }

function controllamsg(){
	
var messaggio = getvalue('textmsg');
var totallength = document.getElementById('textmsg').value.length; 

var messaggio_exp = /^([a-zA-Z0-9\xE0\xE8\xE9\xF9\xF2\xEC\x27\?\-\.\,\!]\s?)+$/;
if (messaggio == ""){
	document.getElementById('infomsg').innerHTML="<span style='background:#ffcbcb'>Campo obbligatorio! Non lasciare vuoto.</span>"; controllomsgglob = 1;
} else {
    	if(totallength >= 500) {
document.getElementById('textmsg').value = document.getElementById('textmsg').value.substring(0, 500);
document.getElementById('infomsg').innerHTML="<span style='background:#ffcbcb'>Hai raggiunto il limite massimo di caratteri inseribili.</span>"; controllomsgglob = 1;
	} else {
document.getElementById('infomsg').innerHTML="<span style='background:#d7efcd'>OK.</span>"; controllomsgglob = 0; }

if(messaggio_exp.test(messaggio)){
	document.getElementById('infomsg').innerHTML="<span style='background:#d7efcd'>OK.</span>"; controllomsgglob = 0;} 
	else { document.getElementById('infomsg').innerHTML="<span style='background:#ffcbcb'>Inserire informazioni corrette. Senza caratteri speciali.</span>"; controllomsgglob = 1;}
	
 
}	

}
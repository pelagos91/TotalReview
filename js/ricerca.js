/************************** ANTONIO MENOLASCINA 575114 , ICD BARI 3° ANNO 
/************************** RICERCA.JS
questo file js si occupa principalmente di controllare che nella ricerca di un viaggio non siano inserite informazioni errate.
Se le informazioni inserite sono corrette, viene mandata una richiesta ajax alla pagina consulta2.php per poter effettuare la ricerca.

Inoltre ci sono delle funzioni per la modifica dei colori di brackground per i link di ordinamento dei risultati.
******************************/

var controllaric = new Array(0, 0);
function consultaric(){
	var partenza = getvalue('partenzaric');
	var arrivo = getvalue('arrivoric');
	var datad = getvalue('datadric');
	var datam = getvalue('datamric');
	var datay = getvalue('datayric');
	var ora = getvalue('oraric');	
	var oramin = getvalue('oraminric');

if(( partenza != "")&&(arrivo != "")&&(partenza == arrivo)){
document.getElementById('inforicerca').innerHTML="<span style='background:#ffcbcb'>La partenza e l'arrivo non possono essere uguali.</span>"; controllaric[0] = 1;
} else { document.getElementById('inforicerca').innerHTML="";  controllaric[0] = 0; }

if ((datad != "")||(datam!="")||(datay != "")||(ora != "")||(oramin != "")){

if((datad != "")&&(datam != "")&&(datay != "")&&(ora != "")&&(oramin != "")){
if ((datad > 30)&&((datam == 4)||(datam == 6)||(datam == 9)||(datam == 11))){
document.getElementById('inforicerca').innerHTML="<span style='background:#ffcbcb'>Inserire informazioni corrette nella data di partenza.</span>"; controllaric[1] = 1; } 

else if((datad >= 29)&&(datam == 2)&&(datay%4 != 0)){
document.getElementById('inforicerca').innerHTML="<span style='background:#ffcbcb'>Inserire informazioni corrette nella data di partenza.</span>"; controllaric[1] = 1; }
else if((datad >= 30)&&(datam == 2)&&((datay%4 == 0)||((datay%100 == 0)&&(datay%400 == 0)))){
document.getElementById('inforicerca').innerHTML="<span style='background:#ffcbcb'>Inserire informazioni corrette nella data di partenza.</span>"; controllaric[1] = 1; }
else { 	document.getElementById('inforicerca').innerHTML="<span style='background:#d7efcd'>OK.</span>"; controllaric[1] = 0; }
} else { controllaric[1] = 1;  document.getElementById('inforicerca').innerHTML="<span style='background:#ffcbcb'>Inserire informazioni corrette nella data di partenza.</span>";}


if (controllaric[1] == 0){
	 var dataoggi = new Date();
	 var datay2 = dataoggi.getFullYear();
	 var datam2 = dataoggi.getMonth() + 1;
	 var datad2 = dataoggi.getDate();
	 var ora2 = dataoggi.getHours();
	 var oramin2 = dataoggi.getMinutes();
	 
if((datay == datay2)&&((datam < datam2)&&(datad < datad2))){
controllaric[1] = 1;  document.getElementById('inforicerca').innerHTML="<span style='background:#ffcbcb'>La data di partenza non pu&ograve; essere precedente a oggi.</span>";
}
else if((datay == datay2)&&(datam == datam2)&&(datad < datad2)){
controllaric[1] = 1;  document.getElementById('inforicerca').innerHTML="<span style='background:#ffcbcb'>La data di partenza non pu&ograve; essere precedente a oggi.</span>";
}
else if((datay == datay2)&&(datam == datam2)&&(datad == datad2)){
if (ora < ora2){	    
controllaric[1] = 1;  document.getElementById('inforicerca').innerHTML="<span style='background:#ffcbcb'>E' troppo tardi per organizzare questo viaggio. Controlla l'orario di partenza</span>";} else if ((ora == ora2)&&(oramin < oramin2)){controllaric[1] = 1;  document.getElementById('inforicerca').innerHTML="<span style='background:#ffcbcb'>E' troppo tardi per organizzare questo viaggio. Controlla l'orario di partenza</span>";}
}  }
}
}
	
	
function controlricarr(){
		var errore = 0;
	for(var i=1;i>=0;i=i-1){
		if (controllaric[i] == 1) {
			errore = 1;
			if (i == 0)document.getElementById('partenzaric').focus();
			if (i == 1)document.getElementById('datadric').focus();
			 }
		}	
} 	


function ricercaviaggio(){
	var errore = controlricarr();
	if(errore != 1){ 

if(document.getElementById('offerta').checked)	{var tipo=1; }else{var tipo = 0; }
	var datad=getvalue('datadric');
	var datam=getvalue('datamric');
	var datay=getvalue('datayric');
	var ora=getvalue('oraric');
	var oramin=getvalue('oraminric');
	var flex=getvalue('flexric');
	var partenza=getvalue('partenzaric');
	var arrivo=getvalue('arrivoric');
	var posti=getvalue('postiric');

	
var data = "tipo="+tipo+"&datad="+datad+"&datam="+datam+"&datay="+datay+"&ora="+ora+"&oramin="+oramin+"&flex="+flex+"&partenza="+partenza+"&arrivo="+arrivo+"&posti="+posti+"";
	getRequestObject(0,'consulta1.php',data, 'divricercatisub');
	controllaric[0] = 0;	controllaric[1] = 0;
	document.getElementById('ricercasupdiv').style.display='none';
	document.getElementById('ricercasubdiv').style.display='block';
	document.getElementById('divricercati').style.display='inline-block';
	document.getElementById('ricercatileg').style.display='inline-block';

	}
}


function cambiacolore2(div){
if(div == 'dp'){document.getElementById('ordinadp').style.background='#ccc'; } else { document.getElementById('ordinadp').style.background='#e4e4e4'; }
 if(div == 'p'){ document.getElementById('ordinap').style.background='#ccc'; } else { document.getElementById('ordinap').style.background='#e4e4e4'; }
  if(div == 'a'){document.getElementById('ordinaa').style.background='#ccc'; } else { document.getElementById('ordinaa').style.background='#e4e4e4'; }

}

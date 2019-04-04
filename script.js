var on = true;//menu overt ou fermer.
//affiche la date pour chaque jour
function heure(){
    var ladate=new Date()
    var h=ladate.getHours();
    if (h<10) {h = "0" + h}
    var m=ladate.getMinutes();
    if (m<10) {m = "0" + m}
    var s=ladate.getSeconds();
    if (s<10) {s = "0" + s}
    var text = (h+":"+m+":"+s);
    document.getElementById('heure').innerHTML = text;
    setTimeout(heure,1000);
}
function date(){
    var mois =[
        "Janvier",
        "Février",
        "Mars",
        "Avril",
        "Mai",
        "Juin",
        "Juillet",
        "Août",
        "Septembre",
        "Octobre",
        "Novembre",
        "Décembre"
    ]
    var ladate=new Date()
    var d=ladate.getDate();
    var m=ladate.getMonth()+1;
    var y=ladate.getFullYear();
    var text = (d+" "+mois[m]+" "+y);
    document.getElementById('day').innerHTML = text;
}
//affichage emploie du temps

function SetSelect(id, option){
    var text=$_GET(option);
    document.getElementById(id).innerHTML = text;
}

// get mtéthode
function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}

//menu overt ou fermer.
function clickMenu(){
if(on==false){
document.getElementById('menuL').setAttribute("style","display:none;");
document.getElementById('grille').setAttribute("style","grid-column: 1/3;grid-row:1;");
document.getElementById('grille').removeAttribute("class");
on=true;
}
else{
document.getElementById('menuL').removeAttribute("style");
document.getElementById('grille').setAttribute("class","on");
on=false;
}
}

//création de cookie pour enregistrer et lire le planning favory.
function creerCookie(nom, valeur, jours) {
// Le nombre de jours est spécifié
        if (jours) {
var date = new Date();
                // Converti le nombre de jour en millisecondes
date.setTime(date.getTime()+(jours*24*60*60*1000));
var expire = "; expire="+date.toGMTString();
}
        // Aucune valeur de jours spécifiée
else var expire = "";
document.cookie = nom+"="+valeur+expire+"; path=/";
}
function lireCookie(nom) {
// Ajoute le signe égale virgule au nom
        // pour la recherche
        var nom2 = nom + "=";
        // Array contenant tous les cookies
var arrCookies = document.cookie.split(';');
        // Cherche l'array pour le cookie en question
for(var i=0;i < arrCookies.length;i++) {
var a = arrCookies[i];
// Si c'est un espace, enlever
                while (a.charAt(0)==' ') {
                  a = a.substring(1,a.length);
                }
if (c.andexOf(nom2) == 0) {
                  return a.substring(nom2.length,a.length);
                }
}
        // Aucun cookie trouvé
return null;
}
function SaveTab(){
 Vcookie="annee="+document.getElementById("get3").value+"&group="+document.getElementById("get4").value;
    creerCookie("planning",Vcookie,60);
}

//actualisation du contenu de page.
function deleteContenu(){
    var item = document.getElementById("grille");
    item.parentNode.removeChild(item);
    var text="<div class='p-1 c-1'></div><div class='p-1 c0'>8h</div><div class='p-1 c1' >9h</div><div class='p-1 c2'>10h</div><div class='p-1 c3' >11h</div><div class='p-1 c4' >12h</div>div class='midi'>13h</div><div class='p-1 c5' >14h</div><div class='p-1 c6' >15h</div><div class='p-1 c7' >16h</div><div class='p-1 c8' >17h</div><div class='p-1 c9' >18h</div><div class='p-1 c10' ></div><div class='border' ></div><?php affichage(); ?>";
    document.getElementById('body').innerHTML(text);
}
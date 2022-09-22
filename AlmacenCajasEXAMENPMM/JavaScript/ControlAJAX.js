function mostrarHuecos(str, lugar){
    
    var xmlhttp;
    if (str=="") {
    document.getElementById("select-7615").innerHTML="";
    return;
    }

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
/* Creamos el objeto request para conexiones http,
compatible con los navegadores descritos*/
    }
    else {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
/*Como el explorer va por su cuenta, el objeto es un ActiveX */
    }
    xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    document.getElementById("select-7615").innerHTML=xmlhttp.responseText;
 /*Seleccionamos el elemento que recibirá el flujo de datos*/
    }
    }
    if(lugar=="estanteria"){
    xmlhttp.open("GET","../Controladores/AjaxHuecosPasillos.php?Pasillo="+str,true);
} else if(lugar=="caja"){
    xmlhttp.open("GET","../Controladores/AjaxLejasEstanterias.php?Estanteria="+str,true);
}
/*Mandamos al PHP encargado de traer los datos, el valor de referencia */
    xmlhttp.send();
    }
    
function autocompletado (Cajas) {
    document.getElementById("autocomple").innerHTML = '';

        //alert(Cajas);
	var pal = document.getElementById("name-edff").value;
	var tam = pal.length;
	for(indice in Cajas){
	    var nombre = Cajas[indice];
            //var nombre = indice;
	    if(pal.length != 0 && nombre.length != 0){
			if(nombre.toLowerCase().search(pal.toLowerCase()) != -1){
				var node = document.createElement("button");
                                node.setAttribute("onclick","comprobar('"+nombre+"')");
				node.innerHTML = nombre;
				document.getElementById("autocomple").appendChild(node);
			}
	    }
	}
}

function comprobar (caja){
    var xmlhttp;
    
    if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();

    }
    else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        
    document.getElementById("localizador").innerHTML = caja;
    document.getElementById("datos").innerHTML = xmlhttp.responseText;
    document.getElementById("botonOK").style.visibility = "visible";
    }
    }

    xmlhttp.open("GET","../Modelo/comprobar.php?caja="+caja,true);
    xmlhttp.send();

    }
    
    function validarLocalizador(str){
          
    var xmlhttp;
    if (str=="") {
    document.getElementById("name-edff").value="";
    return;
    }

    if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
    }
    else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        if(xmlhttp.responseText=="<h2> Conexión establecida con el servidor</h2><br><h2> Conexión establecida con la base de datos almacen_cajas_pmm</h2><br>True"){
            document.getElementById("name-edff").value='Este localizador ya esta en uso, escriba otro';
        }
    if(xmlhttp.responseText==false){
        alert("HOLA");
    }
    }
    }
    xmlhttp.open("GET", "../Controladores/ControladorAjaxLocalizador.php?localizador="+str, true);
    xmlhttp.send();    
  }
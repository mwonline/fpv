menuMovil=false;
$(document).ready(function() {
		$("#menu-movil").hide();
	});
accionMenu = function(){
	//alert("menu:"+menuMovil);
	if(menuMovil){
		//ocultar
		$("#menu-movil").slideUp("slow");
		menuMovil=false;	
	}else{
		//Mostrar
		$("#menu-movil").slideDown("slow");
		menuMovil=true;
	}
}

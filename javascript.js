window.onload = function() {
    document.getElementById("btn_cursos").onclick = function(){
        window.locationf="controlador/helper.php?val=todos";
        $("#divData").load("controlador/helper.php?val=todos") ;
    }
}

$(document).ready(function(){
    $('.menu-oculto').on('click', function(){
        $('.bloque-menu').toggleClass('mostrar');     
    });
});

function valor() {
    
    var valorSelect= $("#miSelect").val();
    window.locationf="controlador/helper.php?val="+valorSelect;
    $("#divData").load("controlador/helper.php?val="+valorSelect) ;
}

function cargarArchivo(elemento){

	// var preview = document.querySelector("img");                                                    
    var file = document.querySelector("input[type=file]").files[0];
    var valor = document.formulario.inputHidden;
    valor.value = file.name;
    alert(file.name);


	// var valor = document.formularioModificacion.txtFoto;
	// valor.value = file.name;
    
	// var leer = new FileReader();

	// if(file){
	// 	leer.readAsDataURL(file);
	// 	leer.onloadend = function(){
	// 		preview.src = leer.result;
	// 	}
	// }else{
	// 	preview.src = "";
	// }

}


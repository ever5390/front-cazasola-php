window.onload = function() {
    document.getElementById("btn_cursos").onclick = function(){
        window.locationf="../services/helper.php?val=todos";
        $("#divData").load("../services/helper.php?val=todos") ;
    }
}

$(document).ready(function(){
    $('.menu-oculto').on('click', function(){
        $('.bloque-menu').toggleClass('mostrar');     
    });
});

function valor() {
    
    var valorSelect= $("#miSelect").val();
    alert(valorSelect);
    if(valorSelect != 0){
        //La ruta es como si estuviera en la pàgina de cursos_registro por eso SOLO los ../
        window.locationf="../services/helper.php?val="+valorSelect;
        $("#divData").load("../services/helper.php?val="+valorSelect) ;    
    }
}

function cargarArchivo(elemento){

	// var preview = document.querySelector("img");                                                    
    var file = document.querySelector("input[type=file]").files[0];
    var valor = document.formulario.nameArchivoOculto;
    valor.value = file.name;

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


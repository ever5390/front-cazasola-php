window.onload = function() {
    document.getElementById("btn_cursos").onclick = function(){
        window.locationf="../services/helper.php?val=todos";
        $("#divData").load("../services/helper.php?val=todos") ;
    }
}

document.getElementById("box-archivo").addEventListener("click", myFunction);

function myFunction() {
alert("adasd");
}

$(document).ready(function(){
    $('.menu-oculto').on('click', function(){
        $('.bloque-menu').toggleClass('mostrar');
    });
});



function valor() {
    var valorSelect= $("#miSelect").val();
    if(valorSelect != 0){
        //La ruta es como si estuviera en la pàgina de cursos_registro por eso SOLO los ../
        window.locationf="../services/helper.php?val="+valorSelect;
        $("#divData").load("../services/helper.php?val="+valorSelect) ;
    }
}

function valor2() {
    var valorSelect= $("#miSelect2").val();
    if(valorSelect != 0){
        //La ruta es como si estuviera en la pàgina de cursos_registro por eso SOLO los ../
        window.locationf="../services/service_alumnos.php?val="+valorSelect;
        $("#divData2").load("../services/service_alumnos.php?val="+valorSelect) ;
    }
}

function openModal(){
    var valor = document.getElementById("nameFile").value;
    if(valor != ""){
        $("#modal").slideDown("slow");
    } else {
        alert("Seleccione un archivo previamente...");
    }
}

function closeModal(){
        $("#modal").slideUp("fast");
}

function mensajePorTiempo(){
    setTimeout(function() {
        $(".mensaje").fadeOut(1500);
    },3000);
}
function cargarArchivo(elemento){

	// var preview = document.querySelector("img");
    var file = document.querySelector("input[type=file]").files[0];
    var valor = document.formulario.nameFile;
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


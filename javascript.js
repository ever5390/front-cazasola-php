
$(document).ready(function(){
    $('.menu-oculto').on('click', function(){
        $('.bloque-menu').toggleClass('mostrar');     
    });
});

function valor() {
    
    var valorSelect= $("#miSelect").val();
    console.log(valorSelect);
    window.locationf="controlador/helper.php?val="+valorSelect;
    $("#divData").load("controlador/helper.php?val="+valorSelect) ;
}

window.onload = function() {
    document.getElementById("btn_cursos").onclick = function(){
        window.locationf="controlador/helper.php?val=todos";
        $("#divData").load("controlador/helper.php?val=todos") ;
    }
}
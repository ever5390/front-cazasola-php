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

function openModals(){
    $("#modal").slideDown("slow");
    var valor = document.getElementById("nameFile").value;
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
    
    //validar tipo archivo
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.pdf|.doc|.docx|.xls|.xlsx|.ppt|.pptx)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Por favor solo extensiones .jpg/.jpeg/.png/.pdf/.doc/.docx/.xls/.xlsx/.ppt/.pptx .');
        fileInput.value = '';
        return false;
    }else{
        var oFile = document.getElementById("file").files[0]; 
        if (oFile.size > 10485760) // 2 mb for bytes.
        {
            alert("El archivo supera el límite de 10MB!");
            return;
        }else{
            var preview = document.querySelector("img");
            var file = document.querySelector("input[type=file]").files[0];
            var valor = document.formulario.nameFile;
            valor.value = file.name;
        }

        //Image preview
        // if (fileInput.files && fileInput.files[0]) {
        //     var reader = new FileReader();
        //     reader.onload = function(e) {
        //         document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
        //     };
        //     reader.readAsDataURL(fileInput.files[0]);
        // }
        //<div id="imagePreview"></div>
    }

}




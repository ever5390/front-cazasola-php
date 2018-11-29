<?php

    require '../library/composer/vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;

    ob_start();
    if(isset($_GET['existe_alumnos'])){
        require_once './reporte_archivo_unico.php';
    }else{
        require_once './reporte_archivos_varios.php';

    }
    
    $html = ob_get_clean();

    $html2pdf = new Html2Pdf();

    $html2pdf->writeHTML($html);
    $html2pdf->output();

?>

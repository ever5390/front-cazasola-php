<?php

$ruta = "https://ruc.com.pe/api/v1/ruc";
$token = "256e9737-6e98-40ce-ae6a-80f5fa8de65b-1b01ac2e-3a1f-4134-afbd-b83fc7d1495c";
$rucaconsultar = null;
if(isset($_POST["txtBuscar"])){
	$rucaconsultar = $_POST["txtBuscar"];
	// echo "hola";
}
// $rucaconsultar = '20101024645';

$data = array(
    "token"	=> $token,
    "ruc"   => $rucaconsultar
);

$data_json = json_encode($data);

// Invocamos el servicio a ruc.com.pe
// Ejemplo para JSON
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ruta);
curl_setopt(
	$ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	)
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$respuesta  = curl_exec($ch);
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        body{
            font-family: Arial;
        }
        input{
            width: 30%;
            height: 50px;
            font-size: 2rem;
            border: none;
            color: gray;
            padding-left: 10px;

        }

        input: input-placeholder {
            opacity: .5;
        }

        input[type= text]{
            border-bottom: 1px solid gray;
        }

        .label{
            font-size: 2em;
            color: gray;
            }

            table{
                width: 70%;
                border: none;
                margin-top: 50px;
            }

        td input{
            width: 70%;
        }
    </style>
</head>
<body>
    <center>
    <h1>INSCRIPCION Y REGISTRO NACIONAL DE EMPRESAS Y ENTIDADES</h1>
    <form action="buscar.php" method="post">
        <input type="text" name = "txtBuscar" placeholder="Ingrese ruc a buscar">
        <input type="submit" name="button" value="BUSCAR">
    </form>
    
    <div>
        <?php
            if($rucaconsultar){
                $leer_respuesta = json_decode($respuesta, true);
                if (isset($leer_respuesta['errors'])) {
                    //Mostramos los errores si los hay
                    echo $leer_respuesta['errors'];
                } else {
                    echo "<table>";
                    echo "	<tr>";
                    echo "		<td class='label' >departamento: </td>";
                    echo "		<td ><input type='text' value='".$leer_respuesta['departamento']."'></td>";
                    echo "	</tr>";
                    echo "	<tr>";
                    echo "		<td class='label' >ruc: </td>";
                    echo "		<td ><input type='text' value='".$leer_respuesta['ruc']."'></td>";
                    echo "	</tr>";
                    echo "	<tr>";
                    echo "		<td class='label' >razon social: </td>";
                    echo "		<td ><input type='text' value='".$leer_respuesta['nombre_o_razon_social']."'></td>";
                    echo "	</tr>";
                    echo "	<tr>";
                    echo "		<td class='label' >estado contribuyente:</td>";
                    echo "		<td ><input type='text' value='".$leer_respuesta['estado_del_contribuyente']."'></td>";
                    echo "	</tr>";
                    echo "	<tr>";
                    echo "		<td class='label' >condicion_de_domicilio:</td>";
                    echo "		<td ><input type='text' value='".$leer_respuesta['condicion_de_domicilio']."'></td>";
                    echo "	</tr>";
                    echo "	<tr>";
                    echo "		<td class='label' >Firma electronica: </td>";
                    echo "		<td ><input type='text' value='' placeholder='.....'></td>";
                    echo "	</tr>";
                    echo "	<tr>";
                    echo "		<td class='label' >Declaracion jurada:</td>";
                    echo "		<td ><input type='text' value='' placeholder='.....'></td>";
                    echo "	</tr>";
                    echo "	<tr>";
                    echo "		<td class='label' >Representante legal:</td>";
                    echo "		<td ><input type='text' value='' placeholder='.....'></td>";
                    echo "	</tr>";
                    echo "	</table>";
                
                }
            }                  
        ?>
    </div>
    </center>
</body>
</html>
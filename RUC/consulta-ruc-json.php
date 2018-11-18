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

if($rucaconsultar){
	$leer_respuesta = json_decode($respuesta, true);
	if (isset($leer_respuesta['errors'])) {
		//Mostramos los errores si los hay
		echo $leer_respuesta['errors'];
	} else {
		echo "<table>";
		echo "	<tr>";
		echo "		<td width='200px'>departamento: </td>";
		echo "		<td width='200px'><input type='text' value='".$leer_respuesta['departamento']."'></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "		<td width='200px'>ruc: </td>";
		echo "		<td width='200px'><input type='text' value='".$leer_respuesta['ruc']."'></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "		<td width='200px'>razon social: </td>";
		echo "		<td width='200px'><input type='text' value='".$leer_respuesta['nombre_o_razon_social']."'></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "		<td width='200px'>estado contribuyente:</td>";
		echo "		<td width='200px'><input type='text' value='".$leer_respuesta['estado_del_contribuyente']."'></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "		<td width='200px'>condicion_de_domicilio:</td>";
		echo "		<td width='200px'><input type='text' value='".$leer_respuesta['condicion_de_domicilio']."'></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "		<td width='200px'>firma electronica: </td>";
		echo "		<td width='200px'><input type='text' value='' placeholder='firma electronica:'></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "		<td width='200px'>firma electronica:</td>";
		echo "		<td width='200px'><input type='text' value='' placeholder='firma electronica:'></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "		<td width='200px'>firma electronica:</td>";
		echo "		<td width='200px'><input type='text' value='' placeholder='firma electronica:'></td>";
		echo "	</tr>";
		echo "	</table>";
	
		//Mostramos la respuesta
		// echo "<br>Respuesta del amor de tu vida, tu gallo, tu todo:<br>";
		// echo "<br>succes: <input type='text' style = 'width: 20%' value='".$leer_respuesta['nombre_o_razon_social']."'>";
		// echo "<br>ruc: <input type='text' style = 'width: 20%' value='".$leer_respuesta['success']."'>";
		// echo "<br>razon social: <input type='text' style = 'width: 20%' value='".$leer_respuesta['ruc']."'>";
		// echo "<br>estado contribuyente: <input type='text' style = 'width: 20%' value='".$leer_respuesta['nombre_o_razon_social']."'>";
		// echo "<br>condicion_de_domicilio: <input type='text' style = 'width: 20%' value='".$leer_respuesta['estado_del_contribuyente']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['condicion_de_domicilio']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['ubigeo']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['tipo_de_via']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['nombre_de_via']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['codigo_de_zona']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['tipo_de_zona']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['numero']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['interior']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['lote']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['dpto']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['manzana']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['kilometro']."'>";
		// echo "<br>departamento: <input type='text' style = 'width: 20%' value='".$leer_respuesta['departamento']."'>";
		// echo "<br>provincia: <input type='text' style = 'width: 20%' value='".$leer_respuesta['provincia']."'>";
		// echo "<br>distrito: <input type='text' style = 'width: 20%' value='".$leer_respuesta['distrito']."'>";
		// echo "<br>direccion: <input type='text' style = 'width: 20%' value='".$leer_respuesta['direccion']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['direccion_completa']."'>";
		// // echo "<input type='text' style = 'width: 20%' value='".$leer_respuesta['ultima_actualizacion']."'>";
		// echo "<br><input type='text' style = 'width: 20%' value='' placeholder='DATO QUE QUIERAS INGRESAR 1'>";
		// echo "<br><input type='text' style = 'width: 20%' value='' placeholder='DATO QUE QUIERAS INGRESAR 1'>";
		// echo "<br><input type='text' style = 'width: 20%' value='' placeholder='DATO QUE QUIERAS INGRESAR 1'>";
		// echo "<br><input type='text' style = 'width: 20%' value='' placeholder='DATO QUE QUIERAS INGRESAR 1'>";
		// echo "<br><input type='text' style = 'width: 20%' value='' placeholder='DATO QUE QUIERAS INGRESAR 1'>";
		// echo "<br><input type='text' style = 'width: 20%' value='' placeholder='DATO QUE QUIERAS INGRESAR 1'>";
	}	
}

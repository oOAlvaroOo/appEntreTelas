<?php
header('Access-Control-Allow-Origin: *');

include('conec.php');

$rutVendedor = $_POST["rutVendedorPHP"];

$sql ="SELECT vendedores.rutvendedor,
vendedores.nombrevendedor,
vendedores.apellidoPatVendedor,
vendedores.apellidoMatVendedor,
vendedores.emailVendedor
FROM vendedores
WHERE vendedores.rutvendedor like '$rutVendedor';";

$resultado = mysql_query($sql);

$arrDatos = array();

if(!$resultado){
	echo "SE HA DETECTADO EL SIGUIENTE ERROR EN LA BD AL CONSULTAR LOS DATOS DE LOS VENDEDORES: \n" . mysql_error();
}else{
	while ($rs = mysql_fetch_array($resultado)) {
		$arrDatos[] = array_map('utf8_encode', $rs);
	}
	echo json_encode($arrDatos);
}

//Cierro
mysql_close($conexion);

?>
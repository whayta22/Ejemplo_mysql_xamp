<?php
$mysqli = new mysqli("localhost","root","","Sis_hostal");
$clienhos = $_GET['cliente'];
$diashos = $_GET['dias'];
$thabitahos = $_GET['t_habitacion'];
$costodias = $_GET['costo'];

$import = $diashos * $costodias;

$sql = "INSERT INTO Hostal (cliente, dias, t_habitacion, costo, importe) VALUES ('$clienhos', '$diashos','$thabitahos','$costodias', '$import')";
$resultado = $mysqli->query($sql);
if($resultado){
header("Location: index.php");
}else{
echo "Insercion no exitosa";
}
?>
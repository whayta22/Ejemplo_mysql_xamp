<?php
$mysqli = new mysqli("localhost","root","","Sis_hostal");
$cod = $_POST['id'];
$clienhos = $_POST['cliente'];
$diashos = $_POST['dias'];
$thabitahos = $_POST['t_habitacion'];
$costodias = $_POST['costo'];

$import = $diashos * $costodias;

$sql = "UPDATE Hostal set cliente='$clienhos',dias='$diashos',t_habitacion='$thabitahos', costo='$costodias', importe='$import' where id=$cod";
$resultado = $mysqli->query($sql);
if($resultado){
header("Location: index.php");
}else{
echo "Actualizacion no exitosa";
}
?>
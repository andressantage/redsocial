<?php
session_start();
$_SESSION['idAmigo']=$_POST['boton_id'];
$idAmigo=$_SESSION['idAmigo'];

// Conexión a la base de datos
include("../baches/conexion.php");
$con = conectar();
$consulta = "SELECT * FROM usuario WHERE id='$idAmigo'";
$result = $con->query($consulta);
$row = $result->fetch_assoc();
$_SESSION['Amigo']=$row['nombres'];
header("Location: index.php");
?>
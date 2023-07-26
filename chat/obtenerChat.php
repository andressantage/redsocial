<?php
session_start();
$idUsuario=$_SESSION['idUsuario'];
$idAmigo=$_SESSION['idAmigo'];
$idUsu1=$_SESSION['idUsu1'];
$idUsu2=$_SESSION['idUsu2'];

// Conexión a la base de datos
include("../baches/conexion.php");
$con=conectar();
// Verificar la conexión
if (mysqli_connect_errno()) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}
$consultaChat = "SELECT * FROM chat WHERE idUsu1='$idUsu1' AND idUsu2='$idUsu2'";
$resultadoChat = mysqli_query($con, $consultaChat);
if ($resultadoChat && mysqli_num_rows($resultadoChat) > 0) {
  $filaChat = mysqli_fetch_assoc($resultadoChat);
  $chat = $filaChat['chat'];
  $chat=json_decode($chat, true);
  $chatCodificado='';
  foreach ($chat as $chatico) {
    if($chatico['id']===$idUsuario){
      $chatCodificado.="
      <div class='d-flex align-items-center justify-content-end'>
        <h1 class='letraMensajeDer'>" . $chatico['mensaje'] . "</h1>
        <img src='../baches/".$_SESSION['imagen']."' class='ml-2 mr-2 imagenComunidad' alt=''>
      </div>
      ";
    }else{
      $consultaAmigo = "SELECT * FROM usuario WHERE id='$idAmigo'";
      $resultadoAmigo = mysqli_query($con, $consultaAmigo);
      $filaAmigo = mysqli_fetch_assoc($resultadoAmigo);
      $chatCodificado.="
      <div class='d-flex align-items-center'>
        <img src='../baches/".$filaAmigo['imagen']."' class='ml-2 mr-2 imagenComunidad' alt=''>
        <h1 class='letraMensajeIzq'>".$chatico['mensaje']."</h1>
      </div>
      ";
    }  
  }
  echo $chatCodificado;
} else {
    echo "No hay mensajes en el chat.";
}
?>   
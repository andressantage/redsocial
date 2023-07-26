<?php
session_start();
$idUsuario=$_SESSION['idUsuario'];
$idAmigo=$_SESSION['idAmigo'];
$idUsu1=$_SESSION['idUsu1'];
$idUsu1=intval($idUsu1);

$idUsu2=$_SESSION['idUsu2'];
$idUsu2=intval($idUsu2);
var_dump(intval($idUsu1));
echo $idUsu2;
// Conexión a la base de datos
include("../baches/conexion.php");
$con = conectar();

// Obtener los datos enviados por la solicitud AJAX
$nuevoChat = $_POST['escritoChat'];
$consultaChat = "SELECT * FROM chat WHERE idUsu1='$idUsu1' AND idUsu2='$idUsu2'";
$resultadoChat = mysqli_query($con, $consultaChat);
if ($resultadoChat && mysqli_num_rows($resultadoChat) > 0) {
    $filaChat = mysqli_fetch_assoc($resultadoChat);
    $chat = $filaChat['chat'];
} else {
    $crearChat="INSERT INTO chat (idUsu1,idUsu2,chat) VALUES ('$idUsu1','$idUsu2','[]')";
    $resultadoCrearChat=mysqli_query($con, $crearChat);
    if ($resultadoCrearChat) {
        echo "Cuadro";
    }
    echo "No hay mensajes en el chat.";
}

if(strlen($chat)===0){
    $chat='{}';
}
$chat=json_decode($chat, true);

$ct=array(
    'id'=>$idUsuario,
    'mensaje'=>$nuevoChat,
    'fecha'=>date("Y-m-d H:i:s")
);
array_push($chat,$ct);
$chat=json_encode($chat);

$chat = mysqli_real_escape_string($con, $chat);
// Actualizar la tabla con la nueva cadena $chat
$query = "UPDATE chat SET chat = '$chat' WHERE idUsu1='$idUsu1' AND idUsu2='$idUsu2'";
if (mysqli_query($con, $query)) {
    // La actualización fue exitosa
    echo 'La tabla ha sido actualizada correctamente.';
} else {
    // Ocurrió un error durante la actualización
    echo 'Error al actualizar la tabla: ' . mysqli_error($con);
}
// Cerrar la conexión a la base de datos y cualquier otra limpieza necesaria
mysqli_close($con);
?>

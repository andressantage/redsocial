<?php
session_start();
$idUsuario=$_SESSION['idUsuario'];
if(!isset($_SESSION['idAmigo'])){
  $_SESSION['idAmigo']=1;
}
$idAmigo=$_SESSION['idAmigo'];

if($idUsuario>$idAmigo){
  $idUsu1=$idAmigo;
  $idUsu2=$idUsuario;
}else{
  $idUsu1=$idUsuario;
  $idUsu2=$idAmigo;
}
$_SESSION['idUsu1']=$idUsu1;
$_SESSION['idUsu2']=$idUsu2;

if(!isset($_SESSION['correo'])){
    header('Location: ../index.php');
    exit;
}
// Conexión a la base de datos
include("../baches/conexion.php");
$con=conectar();
// Verificar la conexión
if (mysqli_connect_errno()) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}

// Poner a los usuarios en comunidad
$consulta = "SELECT * FROM usuario";
$resultado = mysqli_query($con, $consulta);
// Almacenamiento de datos en una array
$usuarios = array();
while ($fila = mysqli_fetch_assoc($resultado)) {      
    $usuarios[] = $fila;
}
$html='';
$num=0;
foreach ($usuarios as $usuario) {
  $nombreCompleto = explode(' ', $usuario['nombres']);
  $primerNombre = $nombreCompleto[0];
  if($idUsuario!==$usuario['id']){
    if($num%2==0){
      $html .="
      <div id='". $usuario['id'] ."' class='d-flex align-items-center seleccionarPersona cuadroPersona'>
        <img src='../baches/". $usuario['imagen'] ."' class='ml-2 imagenComunidad' alt=''>
        <h1 class='notificacionComunidad'>+</h1>
        <h1 class='nombreComunidad'>". $primerNombre ."</h1>
      </div>
      ";
      $num+=1;
    }else{
      $html .="
      <div id='". $usuario['id'] ."' class='d-flex align-items-center seleccionarPersona cuadroPersona1'>
        <img src='../baches/". $usuario['imagen'] ."' class='ml-2 imagenComunidad' alt=''>
        <h1 class='notificacionComunidad'>+</h1>
        <h1 class='nombreComunidad'>". $primerNombre ."</h1>
      </div>
      ";
      $num+=1;
    }
  }
}

$palabras = explode(' ', $_SESSION['nombres']);
$nombre = $palabras[0];
$imagenPefil=$_SESSION['imagen'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lired</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" defer></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" defer></script>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <link rel="stylesheet" href="../style/chat.css" >
    <!--   <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>  -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js" defer></script> -->
</head>
<body>
<!-- barra de navegacion -->
<nav class="navbar navbar-expand-lg navbar-dark py-1 navLired">
  <img class="imgLogo" src="../img/logo.png" alt="">
  <h1 class="Lired">Lired</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">            
      <li class="nav-item d-flex align-items-center">
        <a class="nav-link" href="../chat"><button type="button" class="btn btn-success botonChat">Chat</button></a>
      </li>
      <li class="nav-item d-flex align-items-center">
        <a class="nav-link" href="../grupos"><h1 class="menuNav">Grupos</h1></a>
      </li>
      <li class="nav-item d-flex align-items-center">
        <a class="nav-link" href="../mundo"><h1 class="menuNav">Mundo</h1></a>
      </li>
    </ul>

    <div class="d-flex cuadroBuscador">
      <input class="cajaBuscar" type="text" placeholder="Escribir ...">
      <img class="imgFlechaBuscar" src="../img/flechaBuscar.png" alt="">
    </div>
   
      <!-- cambiar esta parte para que se inice sesion y en caso de haber iniciado sesion lo dirija a las instrucciones para hacer fecth API -->
      <div class="nav-link cuadroNombrePerfil ml-auto d-flex justify-content-center align-item-center flex-column">
        <h1 class="nombrePerfil mb-0"> <?php echo $nombre; ?> </h1>
        <div class="d-flex justify-content-center align-item-center">
          <img src="../img/flechaPerfil.png" class="flechaPerfil" alt="">
        </div>
      </div>
      <?php 
        echo "<img src='../baches/". $imagenPefil . "' class='ml-2 imagenPefil' alt=''>"; 
      ?>
  </div>
</nav>

<!-- Seccion principal -->
<div class="w-100 d-flex">
  <!-- Seccion Comunidad -->
  <div class="cajaComunidad d-flex flex-column px-4">
    <h1 class="comunidad">Comunidad</h1>

    <div class="barraScroll">
      <?php echo $html; ?>      
    </div>
  </div>

  <!-- Seccion Chat -->
  <div class="cuadroChat d-flex flex-column px-4">
    <div class="cuadroNombresChat d-flex flex-row justify-content-between">
<?php
$consultaAmigo = "SELECT * FROM usuario WHERE id='$idAmigo'";
$resultadoAmigo = mysqli_query($con, $consultaAmigo);
if ($resultadoAmigo && mysqli_num_rows($resultadoAmigo) > 0) {
    $filaAmigo = mysqli_fetch_assoc($resultadoAmigo);
    $nombreCompletoAmigo = explode(' ', $filaAmigo['nombres']);
    $primerNombreAmigo = $nombreCompletoAmigo[0];

} else {
    echo "No hay usuario.";
}
?>
      <h1 class="nombresChat"><?php echo $primerNombreAmigo; ?></h1>
      <h1 class="nombresChat"><?php echo $nombre; ?></h1>
    </div>

      <div class="cajaChat barraScroll" id="contenedor">

      </div>

      <form id="formChat">
        <div class="azulChat d-flex justify-content-center align-items-center">
            <input id="inputChat" class="inputChat" type="text" name="escritoChat" placeholder="Escribir...">
            <button type="submit" class="botonChatear">
                <img class="imgFlechaBuscar" src="../img/flechaBuscar.png" alt="">
            </button>
        </div>
      </form>

  </div>
</div>

<!-- Agrega el formulario y los botones -->
<form id="form2" method="post" action="comunidad.php">
  <input type="hidden" name="boton_id" id="boton_id">
</form>

<script>
var contenedor = document.getElementById("contenedor");
// Función para desplazar la barra de desplazamiento hacia abajo
function desplazarHaciaAbajo() {
  contenedor.scrollTop = contenedor.scrollHeight;
}
// Llamar a la función después de cargar o actualizar la página
window.addEventListener("load", desplazarHaciaAbajo);
</script>

<!-- solucione error con este link el error de $ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
let contenido=''
$(document).ready(function() {
  // Función para cargar la tabla inicialmente y después de cada actualización
  function cargarTabla() {
    $.ajax({
      url: "obtenerChat.php", // Archivo PHP que devuelve el contenido actualizado de la tabla
      method: "GET",
      success: function(data) {
        $("#contenedor").html(data); // Actualizar el contenido de la tabla en el contenedor
        if(contenido!=data){
          desplazarHaciaAbajo();
        }
        contenido=data;
        if(a===1){
          desplazarHaciaAbajo();
          a=0
        }
      },
      error: function() {
        console.log("Error al cargar la tabla");
      }
    });
  }
  // Cargar la tabla al cargar la página
  cargarTabla();

 // Evento que se ejecuta cuando se envía el formulario
    $("#formChat").submit(function(event) {
      event.preventDefault(); // Evita que se realice la acción por defecto del formulario
      // Obtener los datos del formulario
      var formData = $(this).serialize();
      // Realizar la petición AJAX
      $.ajax({
        type: "POST", // Puedes usar "GET" o "POST" según lo necesites
        url: "chatear.php",
        data: formData,
        success: function(resultado) {
            console.log(resultado);
            var inputChat = document.getElementById("inputChat");
            inputChat.value='';
            cargarTabla(); 
            a=1
        },
        error: function() {
          // Manejar errores si es necesario
          console.log("error");
        }
      });
    });

  function actualizarTablaAutomaticamente() {
    setInterval(function() {
        cargarTabla(); // Cargar la tabla después de la actualización
    }, 3000); // Intervalo de tiempo en milisegundos (en este ejemplo, se actualiza cada 5 segundos)
  } 
  
  actualizarTablaAutomaticamente();
});

const persona=document.querySelectorAll('.seleccionarPersona')
persona.forEach((boton) => {
  boton.addEventListener('click', (event) => {
    const botonClicado = event.target;
    console.log(boton.id)
    document.getElementById('boton_id').value = boton.id;
    // Enviar el formulario
    document.getElementById('form2').submit();
  })
});

</script>


<div id="ultimo"></div>
</body>
</html>
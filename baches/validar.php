<?php
// Conexión a la base de datos
include("conexion.php");
$con=conectar();

// Verificar la conexión
if (mysqli_connect_errno()) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}

// Creacion de la clase persona que guarda los datos de esta
class Registro{
    public $correo;
    public $contraseña;
    public function __construct($correo, $contraseña){
        $this->correo=$correo;
        $this->contraseña=$contraseña; //de pronto la ñ genere problemas revisare, ya revise y dice que no
    }
}

// Obtencion de valores del formulario
$registro=new Registro($_POST['correo'], $_POST['contraseña']);

// Escapar el valor del correo para evitar inyección de SQL
$correo = mysqli_real_escape_string($con, $registro->correo); 

// Verificar si el usuario ya existe en la base de datos
$consulta = "SELECT * FROM usuario WHERE email='$correo' AND clave='$registro->contraseña'";

//FORMAS DE HACKEAR CON INJECTION DE SQL
//$consulta = "SELECT * FROM usuarios WHERE correo='' AND contra='' -- ";
//$consulta = "SELECT * FROM usuarios WHERE correo='$email' AND contra='' OR correo='root@gmail.com' -- AND contra=''";

$result = $con->query($consulta);
if ($result->num_rows === 1) {
    // Las credenciales son válidas, obtener el nombre de usuario
    $row = $result->fetch_assoc();

    // Establecer variables de sesión
    session_start();
    $_SESSION['idUsuario'] = $row['id'];
    $_SESSION['correo'] = $row['email'];
    $_SESSION['nombres'] = $row['nombres'];
    $_SESSION['imagen'] = $row['imagen'];

    // Redirigir al usuario a la página de bienvenida
    header("Location: ../chat"); 
    exit();
} else {
    header("Location: ../index.php?error=1");
}

// Cerrar la conexión a la base de datos
$con->close();
?>
<?php
// Conexión sda la base de datos
include("conexion.php");
$con=conectar();

// Verificar la conexión
if (mysqli_connect_errno()) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}

// Creacion de la clase persona que guarda los datos de esta
class Persona{
    public $nombres; //se puso el nombre como atributo privado
    public $apellidos; //se puso la edad como atributo protegido
    public $foto;
    public $correo;
    public $contraseña;

    public function __construct($nombres, $apellidos, $foto, $correo, $contraseña){
        $this->nombres=$nombres;
        $this->apellidos=$apellidos;
        $this->foto=$foto;
        $this->correo=$correo;
        $this->contraseña=$contraseña; //de pronto la ñ genere problemas revisare, ya revise y dice que no
    }
}

// Obtencion de valores del formulario
$persona=new Persona($_POST['nombres'], $_POST['apellidos'], '', $_POST['correo'], $_POST['contraseña']);

// Escapar el valor del correo para evitar inyección de SQL
$correo = mysqli_real_escape_string($con, $persona->correo); 

// Verificar si el usuario ya existe en la base de datos
$existQuery = "SELECT email FROM usuario WHERE email = '$correo'";
$result = mysqli_query($con, $existQuery);

if (mysqli_num_rows($result) > 0) {
  // El usuario ya existe, mostrar mensaje de error
  echo "El usuario ya existe"; //Revisar como se hara esta parte
} else {
  
  // Pone link para la imagen
  $extension = pathinfo(basename($_FILES["foto"]["name"]), PATHINFO_EXTENSION);
  $nombreSinExtension = pathinfo(basename($_FILES["foto"]["name"]), PATHINFO_FILENAME);
  $miStringSinEspacios = preg_replace('/\s+/', '', $nombreSinExtension);

  $palabras = explode(' ', $persona->nombres);
  $primerNombre = $palabras[0];

  $target_file = "uploads/" . "$primerNombre" . "_" . $miStringSinEspacios . "." . $extension;
  // Insertar el nuevo usuario en la base de datos
  $query = "INSERT INTO usuario (nombres, apellidos, imagen, email, clave, fecha_registro) VALUES ('$persona->nombres', '$persona->apellidos', '$target_file', '$correo', '$persona->contraseña', NOW())";

  if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file) and mysqli_query($con, $query)) {
    // Obtener el ID generado automáticamente
    $idUsuario = mysqli_insert_id($con);
    // Establecer variables de sesión
    session_start();
    $_SESSION['idUsuario'] = $idUsuario;
    $_SESSION['correo'] = $correo;
    $_SESSION['nombres'] = $persona->nombres;
    $_SESSION['imagen'] = $target_file;

    header("location: ../chat");
  } else {
    echo "Error con el registro: " . mysqli_error($con);
  }
}

// Cerrar la conexión
mysqli_close($con);
?>

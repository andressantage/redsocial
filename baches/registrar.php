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
    /*  public function getNombres(){
        return $this->nombres;
    }

    public function setNombres($nombres){
        $this->nombres=$nombres;
    }*/
}

// Obtencion de valores del formulario
$persona=new Persona($_POST['nombres'], $_POST['apellidos'], $_POST['foto'], $_POST['correo'], $_POST['contraseña']);

// Escapar el valor del correo para evitar inyección de SQL
$correo = mysqli_real_escape_string($con, $persona->correo); 

// Verificar si el usuario ya existe en la base de datos
$existQuery = "SELECT email FROM usuario WHERE email = '$correo'";
$result = mysqli_query($con, $existQuery);

if (mysqli_num_rows($result) > 0) {
  // El usuario ya existe, mostrar mensaje de error
  echo "El usuario ya existe"; //Revisar como se hara esta parte
} else {
  // Insertar el nuevo usuario en la base de datos
  $query = "INSERT INTO usuario (nombres, apellidos, imagen, email, clave, fecha_registro) VALUES ('$persona->nombres', '$persona->apellidos', '$persona->foto', '$correo', '$persona->contraseña', NOW())";

  if (mysqli_query($con, $query)) {
    // Obtener el ID generado automáticamente
    $idUsuario = mysqli_insert_id($con);

    // Establecer variables de sesión
    session_start();
    $_SESSION['idUsuario'] = $idUsuario;
    $_SESSION['correo'] = $correo;
    $_SESSION['nombres'] = $persona->nombres;
    $_SESSION['imagen'] = $row['imagen'];

    header("location: ../mundo");
  } else {
    echo "Error al guardar el contenido: " . mysqli_error($con);
  }
}

// Cerrar la conexión
mysqli_close($con);
?>

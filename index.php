<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lired</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- comente esta parte porque tenia una version antigua de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" defer=""></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js" defer=""></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" defer=""></script>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="style/index.css">
    <!-- <script src="js/inicio2.js" defer></script> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coiny&display=swap" rel="stylesheet">
</head>
<body>
<style>
  .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
  }
  .modal-content {
    background: #FCFFDD;
    border: 1px solid rgba(0, 0, 0, 0.31);
    border-radius: 53px;
    margin: auto;
    padding: 20px;
    max-width: 600px;
  }
  .close-btn {
    float: right;
    font-size: 30px;
    font-weight: bold;
    cursor: pointer;
  }
  .close-btn:hover {
      color: grey;
  }
</style>
<!-- barra de navegacion -->
<nav class="navbar navbar-expand-lg navbar-dark py-1 navLired">
  <img class="imgLogo" src="img/logo.png" alt="">
  <h1 class="Lired">Lired</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <div class="nav-link cuadroNombrePerfil ml-auto d-flex justify-content-center align-item-center">
        <button class="btn mr-2 nav-buttons-bg" id="abrir2">Registrarse</button>
        <button class="btn nav-buttons-bg" id="abrir">Ingresar</button>
      </div>
  </div>
</nav>

<style>
  .tituloInicioSesion{
    font-family: 'Coiny';
    font-style: normal;
    font-weight: 400;
    font-size: 76px;
    line-height: 84px;
    color: #000000;
  }
  .subtitulosInicioSesion{
    font-family: 'Coiny';
    font-style: normal;
    font-weight: 400;
    font-size: 36px;
    line-height: 40px;
    color: #000000;
  }
  .botonEnviar{
    width: 279px;
    height: 84px;
    background: #000000;
    border-radius: 100px;
    font-family: 'Coiny';
    font-style: normal;
    font-weight: 400;
    font-size: 50px;
    line-height: 55px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #FFFFFF;
    mix-blend-mode: normal;
  }
  .letraInputInicio{
    font-family: 'Comfortaa';
    font-style: normal;
    font-weight: 400;
    font-size: 32px;
    line-height: 36px;
    display: flex;
    align-items: center;
    color: #000000;
    background: rgba(0, 0, 0, 0.07);
    border-radius: 10px;
  }
</style>

<div id="modal1" class="modal">
    <div class="modal-content">
        <span class="pl-4 close-btn" id="cerrar">&times;</span>

<div class="pt-0 px-4 pb-3">
  <h2 class="tituloInicioSesion text-center">
    Iniciar sesión
  </h2>
    <form class="row g-3" action="baches/validar.php" method="post">
      <div class="col-md-12">
        <label for="ipt-correo-sesion" class="subtitulosInicioSesion form-label m-0 pl-2">Correo electrónico</label>
        <input name="correo" type="email" class="letraInputInicio form-control ipt-card" placeholder="Ingresar correo" required>
      </div>
      <div class="col-md-12">
        <label for="ipt-contraseña-sesion" class="subtitulosInicioSesion form-label m-0 pl-2">Contraseña</label>
        <input name="contraseña" type="password" class="letraInputInicio form-control ipt-card" placeholder="Ingresar contraseña" required>
      </div>
      <div class="d-flex justify-content-center col-md-12 text-center">
        <input class="botonEnviar" type="submit" value="Enviar">
      </div>
    </form>
  <div class="pt-4 col-md-12 text-center mt-2">
    <a href="#" class="link-sesion">¿Has olvidado tú contraseña?</a>
  </div>                 
</div>

    </div>
</div>
<script>
const abrir = document.getElementById("abrir");
  //creacion activacion del modal
const modal1 = document.getElementById("modal1");
const closeBtn = document.getElementById("cerrar");
closeBtn.addEventListener("click", function() {
  modal1.style.display = "none";
});
window.addEventListener("click", function(event) {
  if (event.target === modal1) {
    modal1.style.display = "none";
  }
});
function openModal() {
  modal1.style.display = "block";
}
abrir.addEventListener("click", function(event) {
  openModal()
});
</script>

<!-- Seccion principal -->
<main>
    <div class="title-container w-50 p-2 mt-3 mb-3 m-auto ">
        <h1 class="title">
            Lired: La red social concurrente
        </h1>
    </div>
    <div class="d-flex justify-content-center align-items-center h-100">
      <img src="img/trianguloIndex.png" alt="foto de ejemplo" class="rounded-photos">
      <div class="py-4 col-lg-6 main-bg interactive-card">
        <p>¡Descubre la red social que cambiará tu forma de conectarte con el mundo! Únete a nuestra plataforma y experimenta una nueva dimensión de interacción social.</p>
      </div>
    </div>
</main>


<style>
    .tituloInicioSesion2{
    font-family: 'Coiny';
    font-style: normal;
    font-weight: 400;
    font-size: 50px;
    color: #000000;
    margin-bottom: 0;
  }
  .subtitulosInicioSesion2{
    font-family: 'Coiny';
    font-style: normal;
    font-weight: 400;
    font-size: 24px;
    line-height: 40px;
    color: #000000;
  }
  .botonEnviar2{
    width: 200px;
    height: 60px;
    background: #000000;
    border-radius: 100px;
    font-family: 'Coiny';
    font-style: normal;
    font-weight: 400;
    font-size: 27px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #FFFFFF;
    mix-blend-mode: normal;
  }
  .letraInputInicio2{
    font-family: 'Comfortaa';
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 36px;
    display: flex;
    align-items: center;
    color: #000000;
    background: rgba(0, 0, 0, 0.07);
    border-radius: 10px;
  }
</style>
<div id="modal2" class="modal">
  <div class="modal-content">
      <span class="pl-4 close-btn" id="cerrar2">&times;</span>

<div class="pt-0 px-4 pb-3">
  <h2 class="tituloInicioSesion2 text-center">
    Registrarse
  </h2>
  <form class="row g-3" action="baches/registrar.php" method="post" enctype="multipart/form-data">
    <div class="col-md-12 mt-2">
      <label for="ipt-correo-sesion" class="subtitulosInicioSesion2 form-label m-0 pl-2">Nombres</label>
      <input required name="nombres" type="text" class="letraInputInicio2 form-control ipt-card" placeholder="Ingresar nombres" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="ipt-correo-sesion" class="subtitulosInicioSesion2 form-label m-0 pl-2">Apellidos</label>
      <input required name="apellidos" type="text" class="letraInputInicio2 form-control ipt-card" placeholder="Ingresar apellidos" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="ipt-foto-registro" class="subtitulosInicioSesion2 form-label m-0 pl-2">Imagen de perfil</label>
      <input required name="foto" class="form-control ipt-card" type="file" id="ipt-file-registro">
    </div>
    <div class="col-md-12 mt-2">
      <label for="ipt-correo-sesion" class="subtitulosInicioSesion2 form-label m-0 pl-2">Correo electrónico</label>
      <input required name="correo" type="email" class="letraInputInicio2 form-control ipt-card" placeholder="Ingresar correo" required>
    </div>
    <div class="col-md-12 mt-2">
      <label for="ipt-contraseña-sesion" class="subtitulosInicioSesion2 form-label m-0 pl-2">Contraseña</label>
      <input required name="contraseña" type="password" class="letraInputInicio2 form-control ipt-card" placeholder="Ingresar contraseña" required>
    </div>
    <div class="d-flex justify-content-center col-md-12 text-center">
      <input required class="botonEnviar2" type="submit" value="Enviar">
    </div>
  </form>               
</div>

  </div>
</div>
<script>
const abrir2 = document.getElementById("abrir2");
//creacion activacion del modal
const modal2 = document.getElementById("modal2");
const closeBtn2 = document.getElementById("cerrar2");
closeBtn2.addEventListener("click", function() {
modal2.style.display = "none";
});
window.addEventListener("click", function(event) {
if (event.target === modal2) {
  modal2.style.display = "none";
}
});
function openModal2() {
modal2.style.display = "block";
}
abrir2.addEventListener("click", function(event) {
openModal2()
});
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>

<div id="ultimo"></div>
</body>
</html>
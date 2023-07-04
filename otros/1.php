<?php

?>
<!-- HTML -->
<div id="tabla-container">
  <!-- Aquí se mostrará el contenido de la tabla -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Función para cargar la tabla inicialmente y después de cada actualización
  function cargarTabla() {
    $.ajax({
      url: "obtener_tabla.php", // Archivo PHP que devuelve el contenido actualizado de la tabla
      method: "GET",
      success: function(data) {
        $("#tabla-container").html(data); // Actualizar el contenido de la tabla en el contenedor
      },
      error: function() {
        console.log("Error al cargar la tabla");
      }
    });
  }

  // Cargar la tabla al cargar la página
  cargarTabla();

  // Función para realizar la actualización automáticamente cada cierto intervalo de tiempo
  function actualizarTablaAutomaticamente() {
    setInterval(function() {
      $.ajax({
        url: "actualizar_tabla.php", // Archivo PHP que realiza la actualización en la base de datos
        method: "POST",
        success: function() {
          cargarTabla(); // Cargar la tabla después de la actualización
        },
        error: function() {
          console.log("Error al actualizar la tabla");
        }
      });
    }, 5000); // Intervalo de tiempo en milisegundos (en este ejemplo, se actualiza cada 5 segundos)
  }

  // Iniciar la actualización automática de la tabla
  actualizarTablaAutomaticamente();
});
</script>

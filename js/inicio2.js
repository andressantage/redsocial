const subCardTexto = document.getElementById("subCard-texto");
const subCardSesion= document.getElementById('sub-card-sesion');
const btnSesion = document.getElementById('nav-btn-ingresar');
btnSesion.addEventListener('click',function(){
    cambiarContenido(subCardSesion);
})
const subCardRegistro= document.getElementById('sub-card-registro');
const btnRegistro = document.getElementById('nav-btn-registro');
btnRegistro.addEventListener('click',function(){
    cambiarContenido(subCardRegistro);
})

function cambiarContenido(contenido){
    if(contenido.dataset.value==="0"){
        subCardTexto.style.display="none";
        contenido.style.display="block";
        subCardRegistro.style.display="none";
    }else{
        subCardTexto.style.display="none";
        contenido.style.display="block";
        subCardSesion.style.display="none";

    }

}
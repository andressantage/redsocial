const btnFlechaPerfil = document.getElementById('btnFlechaPerfil');
const opcionesContainer = document.getElementById('opcionesContainer');

btnFlechaPerfil.addEventListener('click', (e)=>{
    opcionesContainer.classList.toggle('d-none');
})
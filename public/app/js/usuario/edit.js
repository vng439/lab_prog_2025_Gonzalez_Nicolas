import { userController } from "./controller.js";

document.addEventListener("DOMContentLoaded", () => {

    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get("id"));
    
    if (id) {
        console.log("Cargando datos del usuario con ID:", id);
        userController.load(id); 
    } else {
        console.error("ID no encontrado en la URL");
    }
})


document.addEventListener("DOMContentLoaded", () =>{

    let btnEditar = document.getElementById("btnEditar");
    let btnActualizar = document.getElementById("btnActualizar");
    let btnCancelar = document.getElementById("btnCancelarEditar");
    let btnListado = document.getElementById("btnListado");

    btnEditar.onclick = () => { 

        btnEditar.disabled = true;
        btnActualizar.disabled = false;
        btnCancelar.disabled = false;
        btnListado.disabled = true;
        userController.enableForm(false);
    }

    btnActualizar.onclick = () => {
        btnEditar.disabled = false;
        btnActualizar.disabled = true;
        btnCancelar.disabled = true;
        btnListado.disabled = false;
        userController.enableForm(true);
    }

    btnCancelar.onclick = () => {
        btnEditar.disabled = false;
        btnActualizar.disabled = true;
        btnCancelar.disabled = true;
        btnListado.disabled = false;
        userController.enableForm(true);
}})


document.addEventListener("DOMContentLoaded", () => {

    let btnActualizar = document.getElementById("btnActualizar");
    btnActualizar.onclick = () =>{

      userController.update(idUsuario.value);

    }
}); 

document.addEventListener("DOMContentLoaded", () => { 
    let id = new URLSearchParams(window.location.search).get("id");

    const btnEliminar = document.getElementById("btnEliminar");
    const modalEliminar = new bootstrap.Modal(document.getElementById("modalConfirmarEliminacion"));
    const confirmarEliminarBtn = document.getElementById("confirmarEliminarBtn");

    btnEliminar.onclick = () => {
    modalEliminar.show();
    };

    
    confirmarEliminarBtn.onclick = () => {
        userController.delete(id);
        modalEliminar.hide();

        setTimeout(() => {
            window.location.href = "http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/usuario/index";
        }, 500);
        };
});


/* document.addEventListener("DOMContentLoaded", () => { 
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get("id"));

    let btnEliminar = document.getElementById("btnEliminar");
    btnEliminar.onclick = () => {
        userController.delete(id);

        window.location.href = "http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/usuario/index";
    }
}); */

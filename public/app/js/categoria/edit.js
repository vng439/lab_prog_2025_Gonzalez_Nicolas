import { categoryController } from "./controller.js";

document.addEventListener("DOMContentLoaded", () => {

    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get("id"));
    
    if (id) {
        console.log("Cargando datos de la categoría con ID:", id);
        categoryController.load(id); 
    } else {
        console.error("ID no encontrado en la URL");
    }
})


document.addEventListener("DOMContentLoaded", () =>{

    let btnEditar = document.getElementById("editCategoria");
    let btnActualizar = document.getElementById("updCategoria");
    let btnCancelar = document.getElementById("cancelEditCategoria");
    let btnListado = document.getElementById("btnIndexCategorias");

    btnEditar.onclick = () => { 

        btnEditar.disabled = true;
        btnActualizar.disabled = false;
        btnCancelar.disabled = false;
        btnListado.disabled = true;
        categoryController.enableForm(false);
    }

    btnActualizar.onclick = () => {
        btnEditar.disabled = false;
        btnActualizar.disabled = true;
        btnCancelar.disabled = true;
        btnListado.disabled = false;
        categoryController.enableForm(true);
    }

    btnCancelar.onclick = () => {
        btnEditar.disabled = false;
        btnActualizar.disabled = true;
        btnCancelar.disabled = true;
        btnListado.disabled = false;
        categoryController.enableForm(true);
}})


document.addEventListener("DOMContentLoaded", () => {

    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get("id"));

    let btnActualizar = document.getElementById("updCategoria");
    btnActualizar.onclick = () =>{

      categoryController.update(id);

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
        categoryController.delete(id);
        modalEliminar.hide();

        setTimeout(() => {
            window.location.href = "http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/categoria/index";
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

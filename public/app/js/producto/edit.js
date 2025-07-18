import { itemController } from "./controller.js";

document.addEventListener("DOMContentLoaded", () => {

    const params = new URLSearchParams(window.location.search);
    let id = parseInt(params.get("id"));
    itemController.load(id);

})
document.addEventListener("DOMContentLoaded", () => {

    let btnPrint = document.getElementById("btnExportarPDF");
    
    btnPrint.onclick = () => {
        itemController.exportToPDF();   
    }
});


document.addEventListener("DOMContentLoaded", () =>{

    let editProduct = document.getElementById("editProduct");
    let updProducto = document.getElementById("updProducto");
    let cancelEditProduct = document.getElementById("cancelEditProduct");
    let btnIndexProductos = document.getElementById("btnIndexProductos");

    editProduct.onclick = () => { 

        editProduct.disabled = true;
        updProducto.disabled = false;
        cancelEditProduct.disabled = false;
        btnIndexProductos.disabled = true;
        itemController.enableForm(false);
    }

    updProducto.onclick = () => {
        editProduct.disabled = false;
        updProducto.disabled = true;
        cancelEditProduct.disabled = true;
        btnIndexProductos.disabled = false;
        itemController.enableForm(true);
    }

    cancelEditProduct.onclick = () => {
        editProduct.disabled = false;
        updProducto.disabled = true;
        cancelEditProduct.disabled = true;
        btnIndexProductos.disabled = false;
        itemController.enableForm(true);
}})


document.addEventListener("DOMContentLoaded", () => {

    let params = new URLSearchParams(window.location.search);
    let id = parseInt(params.get("id"));

    let updProducto = document.getElementById("updProducto");
    updProducto.onclick = () =>{

      itemController.update(id);

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
        itemController.delete(id);
        modalEliminar.hide();

        setTimeout(() => {
            window.location.href = "http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/producto/index";
        }, 1000);
        };
});

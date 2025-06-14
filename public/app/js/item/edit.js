document.addEventListener("DOMContentLoaded", () => {


    const params = new URLSearchParams(window.location.search);
    let id = parseInt(params.get("id"));
    itemController.load(id);

})

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

    let updProducto = document.getElementById("updProducto");
    updProducto.onclick = () =>{

      itemController.update(id);

    }
}); 
document.addEventListener("DOMContentLoaded", () => {


    const params = new URLSearchParams(window.location.search);
    let id = parseInt(params.get("id"));
    userController.load(id);

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

      userController.update(id);

    }
}); 


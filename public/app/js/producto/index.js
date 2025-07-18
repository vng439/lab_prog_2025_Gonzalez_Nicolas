import { itemController } from "./controller.js";

document.addEventListener("DOMContentLoaded", () =>{

    itemController.list();

    let btnBuscar = document.getElementById("btnBuscar");
    btnBuscar.addEventListener("click", (e) => {
        e.preventDefault();
        itemController.list();
    });

});

document.addEventListener("DOMContentLoaded", () => {
    let btnEliminarTabla = document.getElementById("btnEliminarTabla");
    if (btnEliminarTabla) {
        btnEliminarTabla.addEventListener("click", (e) => {
            e.preventDefault();
            const params = new URLSearchParams(window.location.search);
            const id = parseInt(params.get("id"));
            itemController.delete(id);
        });
    }
});
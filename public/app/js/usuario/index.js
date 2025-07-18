import { userController } from "./controller.js";

document.addEventListener("DOMContentLoaded", () =>{

    userController.list();
    let btnBuscar = document.getElementById("btnBuscar");
    btnBuscar.addEventListener("click", () => {
        userController.list();
    });

});



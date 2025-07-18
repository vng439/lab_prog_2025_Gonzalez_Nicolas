import { userController } from "./controller.js";

document.addEventListener("DOMContentLoaded", () => {

    let btnGuardarUsuario = document.getElementById("btnGuardarUsuario");
    btnGuardarUsuario.onclick = () =>{

      if(userController.validarFormulario()){
        userController.save();
        userController.resetForm();
      }

    }
}); 

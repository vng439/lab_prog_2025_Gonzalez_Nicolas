import { categoryController } from "./controller.js";

document.addEventListener("DOMContentLoaded", () => {

    let btnGuardarCategoria = document.getElementById("btnGuardarCategoria");
    btnGuardarCategoria.onclick = () =>{

      if(categoryController.validarFormulario()){
        categoryController.save();
        categoryController.resetForm();
      }

    }
}); 

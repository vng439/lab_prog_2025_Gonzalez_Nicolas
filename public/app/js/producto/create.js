import { itemController } from "./controller.js";
document.addEventListener("DOMContentLoaded", () => {

    let btnGuardarProducto = document.getElementById("btnGuardarProducto");
    btnGuardarProducto.onclick = () =>{

      if(itemController.validarFormulario()){
        itemController.save();
        itemController.resetForm();
      }


    }
}); 

document.addEventListener("DOMContentLoaded", () => {
    const btnNoContinuar = document.getElementById("btnNoContinuar");

    if (btnNoContinuar) {
        btnNoContinuar.addEventListener("click", () => {
            window.location.href = "http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/producto/index";
        });
    }
});
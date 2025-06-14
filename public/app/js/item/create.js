document.addEventListener("DOMContentLoaded", () => {

    let btnGuardarProducto = document.getElementById("btnGuardarProducto");
    btnGuardarProducto.onclick = () =>{

      if(validarFormulario()){
        itemController.save();
        itemController.resetForm();
      }

      

    }
}); 
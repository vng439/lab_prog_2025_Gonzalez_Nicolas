document.addEventListener("DOMContentLoaded", () => {

    let btnGuardarUsuario = document.getElementById("btnGuardarUsuario");
    btnGuardarUsuario.onclick = () =>{

      if(validarFormulario()){
        userController.save();
        userController.resetForm();
      }

    }
}); 

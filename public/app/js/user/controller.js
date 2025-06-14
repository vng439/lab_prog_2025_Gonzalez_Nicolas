/* import { userService } from "./service.js"

export */ const userController = {

    load: id => {

        let usuario = userService.load(id);
        let form = document.forms["formEdit"];

        form.nombreUsuario.value = usuario.nombres;
        form.apellidoUsuario.value = usuario.apellido;
        form.cuentaUsuario.value = usuario.cuenta;
        form.perfilUsuario.value = usuario.perfil;
        form.emailUsuario.value = usuario.correo;
        form.passwordUsuario.value = usuario.contraseña;

    },

    save : () => {

        let form = document.forms["formCreate"];
        
        let nuevoUsuario = {
            nombres: form.nombreUsuario.value,
            apellido: form.apellidoUsuario.value,
            cuenta: form.cuentaUsuario.value,
            perfil: form.perfilUsuario.value,
            correo: form.emailUsuario.value,
            contraseña: form.passwordUsuario.value,
        }

        userService.save(nuevoUsuario);
        const modal = new bootstrap.Modal(document.getElementById('modalGuardarUsuario'));
        modal.show();
    },

    update: () => {

        let form = document.forms["formEdit"];
        
        let nuevoUsuario = {
            
            nombres: form.nombreUsuario.value,
            apellido: form.apellidoUsuario.value,
            cuenta: form.cuentaUsuario.value,
            perfil: form.perfilUsuario.value,
            correo: form.emailUsuario.value,
            contraseña: form.passwordUsuario.value,
        }

        userService.update(nuevoUsuario);
        const modal = new bootstrap.Modal(document.getElementById('modalUsuarioActualizado'));
        modal.show();

    },

    delete: id =>{
        
        userService.delete(id);
        userController.list();

    },
    
    list: () =>{

        let usuarios = userService.list();
        let tabla = document.getElementById("tablaUsuarios");

        if(usuarios.length === 0){
           let fila = ' <td colspan="6" class="text-center text-muted"> No hay usuarios cargados actualmente</td>'
           tabla.innerHTML = fila;
        }
        else{
            tabla.innerHTML="";
        }

        usuarios.forEach(usuario => {

            let fila = '<tr>'

            fila += '<td>' + (usuario.apellido) +'</td>'
            fila += '<td>' + (usuario.cuenta) +'</td>'
            fila += '<td>' + (usuario.perfil) +'</td>'
            fila += '<td>' + (usuario.correo) +'</td>'
            fila += '<td> <a href="user/edit.html?id='+usuario.id+'"> Editar </a> | <a href="javascript:userController.delete('+usuario.id+')"> Eliminar </a> </td> '
            fila += '</tr>'
            tabla.insertAdjacentHTML('beforeend', fila);

        })
    },

    exportToPDF : () => {

        const {jsPDF} = window.jspdf;
        const doc = new jsPDF();

        // Obtener los datos del formulario
        const nombre = document.getElementById("nombreUsuario").value;
        const apellido = document.getElementById("apellidoUsuario").value;
        const cuenta = document.getElementById("cuentaUsuario").value;
        const perfil = document.getElementById("perfilUsuario").value;
        const correo = document.getElementById("emailUsuario").value;

        // Construir contenido del PDF
        let y = 10;
        doc.setFontSize(16);
        doc.text("Datos del Usuario Editado", 10, y); y += 10;
        doc.text("Nombre: " +nombre, 10, y); y += 10;
        doc.text("Apellido: " +apellido, 10, y); y += 10;
        doc.text("Cuenta: " +cuenta, 10, y); y += 10;
        doc.text("Perfil: " +perfil, 10, y); y += 10;
        doc.text("Correo: " +correo, 10, y); y += 10;

        // Descargar el archivo
        doc.save(`usuario_${apellido}.pdf`);
    },

    resetForm : () => {

        let inputsForm = document.querySelectorAll("input");
        let selectForm = document.getElementById("perfilUsuario");
        inputsForm.forEach(input => {
            input.value = "";
        })
        selectForm.selectedIndex = 0;
    },

    enableForm: condition => {

        let form = document.getElementById("formEdit")
        let inputs = form.querySelectorAll("input, select");
        inputs.forEach(input => {

        input.disabled = condition;
        });    
    }

}

function validarFormulario() {

  const nombre = document.getElementById('nombreUsuario').value.trim();
  const apellido = document.getElementById('apellidoUsuario').value.trim();
  const cuenta = document.getElementById('cuentaUsuario').value.trim();
  const perfil = document.getElementById('perfilUsuario');
  const correo = document.getElementById('emailUsuario').value;
  const contraseña = document.getElementById('passwordUsuario').value;
  const contraseñaConfirm = document.getElementById('passwordConfirm').value;

  if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre) || nombre === '') {
    alert('Por favor ingrese un nombre válido.');
    return false;
  }

    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(apellido) || apellido === '') {
    alert('Por favor ingrese un apellido válido.');
    return false;
  }

  if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(cuenta) || cuenta === '') {
    alert('Por favor ingrese una cuenta.');
    return false;
  }

  if (perfil.selectedIndex === 0) {
    alert('Seleccione un tipo de Perfil para el Usuario');
    return false;
  }

    if (!/^\S+@\S+\.\S+$/.test(correo)) {
    alert('Ingrese un correo electrónico válido.');
    return false;
  }

  if(!/^(?=.*[0-9]).{6,9}$/.test(contraseña) || contraseña === ''){
    alert('La contraseña ingresada es incorrecta. La contraseña debe estar formada por al menos una letra miníscula, una letra mayúscula y al menos un número');
    return false;
  }

  if(contraseñaConfirm != contraseña){
    alert("La contraseñas no coinciden");
  }

  return true;
  
}





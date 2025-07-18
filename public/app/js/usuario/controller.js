import { userService } from "./service.js"

export const userController = {

    load: (id) => {
      userService.load(id)
        .then((user) => {
          console.log("Datos del usuario:", user);

          // Cargamos los datos en el formulario
          if (user.result.estado == 1) {
            document.getElementById("estadoCuenta").value = "Activo";
          } else {
            document.getElementById("estadoCuenta").value = "Inactivo";
          }

          document.getElementById("fechaCreacion").value = user.result.fechaAlta;
          document.getElementById("apellidoUsuario").value = user.result.apellido;
          document.getElementById("nombreUsuario").value = user.result.nombres;
          document.getElementById("cuentaUsuario").value = user.result.cuenta;
          document.getElementById("emailUsuario").value = user.result.correo;
          document.getElementById("perfilUsuario").value = user.result.perfil;
          document.getElementById("claveUsuario").value = user.result.clave;
        })
        .catch((error) => {
          console.error("Error al cargar usuario:", error);
        });
    },

    save : () => {

        let form = document.forms["formCreate"];
        
        let nuevoUsuario = {

            apellido: form.apellidoUsuario.value,
            nombres: form.nombreUsuario.value,
            cuenta: form.cuentaUsuario.value,
            perfil: form.perfilUsuario.value,
            clave: form.passwordUsuario.value,
            correo: form.emailUsuario.value,
            estado: 1,
        }

        userService.save(nuevoUsuario);
        const modal = new bootstrap.Modal(document.getElementById('modalGuardarUsuario'));
        modal.show();
    },

    update: () => {
      let form = document.forms["formEdit"];

      const params = new URLSearchParams(window.location.search);
      const id = parseInt(params.get("id"));

      let usuarioEditado = {

        id: id,
        apellido: form.apellidoUsuario.value,
        nombres: form.nombreUsuario.value,
        cuenta: form.cuentaUsuario.value,
        perfil: form.perfilUsuario.value,
        correo: form.emailUsuario.value,
        clave: "clave_secreta",
        estado: form.estadoCuenta.value === "Activo" ? 1 : 0,
        fechaAlta: form.fechaCreacion.value,
      };

      console.log("ID enviado:", id);

      userService.update(usuarioEditado)
        .then(() => {
          const modal = new bootstrap.Modal(document.getElementById('modalUsuarioActualizado'));
          modal.show();
        });

        
    },

    /* update: () => {

        let form = document.forms["formEdit"];
        
        let nuevoUsuario = {
            
            nombres: form.nombreUsuario.value,
            apellido: form.apellidoUsuario.value,
            cuenta: form.cuentaUsuario.value,
            perfil: form.perfilUsuario.value,
            correo: form.emailUsuario.value,
            clave: form.passwordUsuario.value,
        }

        userService.update(nuevoUsuario);
        const modal = new bootstrap.Modal(document.getElementById('modalUsuarioActualizado'));
        modal.show();

    }, */

    delete: id =>{
        
        /* if (!confirm("¿Está seguro que desea eliminar este usuario? Esta acción no se puede deshacer.")) {
            return; 
        } */
        userService.delete(id)
        .then(() => userController.list());
    }, 

    list: () =>{

          const perfilFiltro = document.getElementById("filtroTipoUsuario")?.value || "";
          const estadoFiltro = document.getElementById("filtroEstadoUsuario")?.value || "";

          const filtros = {};

          if (perfilFiltro) filtros.perfil = perfilFiltro;
          if (estadoFiltro) filtros.estado = estadoFiltro;

        userService.list(filtros).then(result => {
            const tabla = document.getElementById("tablaUsuarios");

            if (!Array.isArray(result) || result.length === 0) {
                tabla.innerHTML = '<tr><td colspan="6" class="text-center text-muted">No hay usuarios cargados actualmente</td></tr>';
                return;
            }

            tabla.innerHTML = ""; 

            result.forEach(usuario => {

                if (usuario.estado == 1) {
                    usuario.estado = "Activo";
                } else {
                    usuario.estado = "Inactivo";
                }
                let fila = '<tr>';
                fila += `<td>${usuario.nombres} ${usuario.apellido}</td>`;
                fila += `<td>${usuario.cuenta}</td>`;
                fila += `<td>${usuario.perfilNombre}</td>`;
                fila += `<td>${usuario.correo}</td>`;
                fila += `<td>${usuario.estado}</td>`;

                fila += `<td class="text-center">
                    <a class="btn btn-warning" href="usuario/edit?id=${usuario.id}">Editar</a> |
                    <a class="btn btn-danger" href="javascript:userController.delete(${usuario.id})">Eliminar</a> 
                </td>`;
                fila += '</tr>';

                tabla.insertAdjacentHTML('beforeend', fila);
            });
        });
    },

    exportToPDF: () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Datos del formulario
    const nombre = document.getElementById("nombreUsuario").value;
    const apellido = document.getElementById("apellidoUsuario").value;
    const cuenta = document.getElementById("cuentaUsuario").value;
    const perfil = document.getElementById("perfilUsuario").value;
    const correo = document.getElementById("emailUsuario").value;
    const fechaAlta = document.getElementById("fechaCreacion").value;

    let y = 20;

    // Título principal
    doc.setFont("helvetica", "bold");
    doc.setFontSize(18);
    doc.text("Informe del Usuario", 105, y, { align: "center" });
    y += 15;

    // Línea horizontal decorativa
    doc.setDrawColor(100);
    doc.line(20, y, 190, y);
    y += 10;

    // Sección de datos
    doc.setFontSize(12);
    doc.setFont("helvetica", "normal");

    doc.text(`Nombre: ${nombre}`, 20, y); y += 8;
    doc.text(`Apellido: ${apellido}`, 20, y); y += 8;
    doc.text(`Cuenta: ${cuenta}`, 20, y); y += 8;
    doc.text(`Perfil: ${perfil}`, 20, y); y += 8;
    doc.text(`Correo electrónico: ${correo}`, 20, y); y += 8;
    doc.text(`Fecha de alta: ${fechaAlta}`, 20, y); y += 10;

    // Fecha de generación
    y += 10;
    doc.setFontSize(10);
    doc.setTextColor(150);
    doc.text(`Fecha de generación: ${new Date().toLocaleString()}`, 20, y);

    // Guardar el archivo
    doc.save(`usuario_${apellido}.pdf`);

},

    exportToPDFTable: () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    let y = 20;

    // Título
    doc.setFont("helvetica", "bold");
    doc.setFontSize(18);
    doc.text("Listado de Usuarios", 105, y, { align: "center" });
    y += 10;

    // Línea decorativa
    doc.setDrawColor(100);
    doc.line(20, y, 190, y);
    y += 10;

    // Fecha
    doc.setFontSize(10);
    doc.setFont("helvetica", "normal");
    doc.setTextColor(120);
    doc.text(`Fecha de generación: ${new Date().toLocaleString()}`, 20, y);
    y += 10;

    // Clonar tabla original
    const originalTable = document.getElementById("tablaUsers");
    const clonedTable = originalTable.cloneNode(true);

    // Eliminar columna "Opciones" (por cabecera)
    const removeColumnByHeader = (table, headerText) => {
        const headers = table.querySelectorAll("thead th");
        let indexToRemove = -1;

        headers.forEach((th, index) => {
            if (th.textContent.trim().toLowerCase() === headerText.toLowerCase()) {
                indexToRemove = index;
            }
        });

        if (indexToRemove !== -1) {
            table.querySelectorAll("tr").forEach(row => {
                if (row.cells.length > indexToRemove) {
                    row.deleteCell(indexToRemove);
                }
            });
        }
    };

    removeColumnByHeader(clonedTable, "Opciones");

    // Insertar tabla temporalmente al DOM (requerido por autoTable)
    clonedTable.style.display = "none";
    document.body.appendChild(clonedTable);

    // Generar PDF
    doc.autoTable({
        html: clonedTable,
        startY: y,
        headStyles: {
            fillColor: [33, 37, 41],
            textColor: 255,
            fontStyle: 'bold',
        },
        bodyStyles: {
            fontSize: 10,
        },
        styles: {
            halign: 'left',
            valign: 'middle',
        },
        margin: { left: 20, right: 20 },
    });

    // Eliminar tabla temporal del DOM
    document.body.removeChild(clonedTable);

    // Descargar PDF
    doc.save("listado_usuarios.pdf");
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

      let form = document.getElementById("formEdit");
      let inputs = form.querySelectorAll("input, select");

      inputs.forEach(input => {
          if (input.id !== "fechaCreacion") {

              input.disabled = condition;
          }
      });
},

    validarFormulario() {

  const nombre = document.getElementById('nombreUsuario').value.trim();
  const apellido = document.getElementById('apellidoUsuario').value.trim();
  const cuenta = document.getElementById('cuentaUsuario').value.trim();
  const perfil = document.getElementById('perfilUsuario');
  const correo = document.getElementById('emailUsuario').value;
  const clave = document.getElementById('passwordUsuario').value;
  const claveConfirm = document.getElementById('passwordConfirm').value;

  if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre) || nombre === '') {
    alert('Por favor ingrese un nombre válido.');
    return false;
  }

    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(apellido) || apellido === '') {
    alert('Por favor ingrese un apellido válido.');
    return false;
  }

  if (!/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]+$/.test(cuenta) || cuenta === '') {
    alert('Por favor ingrese una cuenta válida (solo letras y números, sin espacios).');
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

  if(!/^(?=.*[0-9]).{6,20}$/.test(clave) || clave === ''){
    alert('La contraseña ingresada es incorrecta. La contraseña debe estar formada por al menos una letra miníscula, una letra mayúscula y al menos un número');
    return false;
  }

  if(claveConfirm != clave){
    alert("La claves no coinciden");
  }

  return true;
  
}


}

window.userController = userController;






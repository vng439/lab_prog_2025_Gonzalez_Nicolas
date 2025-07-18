import { categoryService } from "./service.js"

export const categoryController = {

    load: (id) => {
      categoryService.load(id)
        .then((category) => {
          console.log("Datos de la categoría:", category);

          // Cargamos los datos en el formulario
          document.getElementById("nombreCategoria").value = category.result.nombre;

          })
        .catch((error) => {
          console.error("Error al cargar categoría:", error);
        });
    },

    save : () => {

        let form = document.forms["formCreateCategory"];

        let nuevaCategoria = {

            nombre: form.nombreCategoria.value,
        }

        categoryService.save(nuevaCategoria);
          const modal = new bootstrap.Modal(document.getElementById('modalGuardarCategoria'));
        modal.show();
    },

    update: () => {
      let form = document.forms["formEditCategoria"];

      const params = new URLSearchParams(window.location.search);
      const id = parseInt(params.get("id"));

      let categoriaEditada = {

        id: id,
        nombre: form.nombreCategoria.value,
      };

      console.log("ID enviado:", id);

      categoryService.update(categoriaEditada)
        .then(() => {
          const modal = new bootstrap.Modal(document.getElementById('modalCategoriaActualizada'));
          modal.show();
        });

        
    },

   

    delete: id =>{
        
        /* if (!confirm("¿Está seguro que desea eliminar este usuario? Esta acción no se puede deshacer.")) {
            return; 
        } */
        categoryService.delete(id)
        .then(() => categoryService.list());
    }, 

    list: () =>{
        categoryService.list().then(result => {
            const tabla = document.getElementById("tablaCategorias");

            if (!Array.isArray(result) || result.length === 0) {
                tabla.innerHTML = '<tr><td colspan="6" class="text-center text-muted">No hay categorías cargadas actualmente</td></tr>';
                return;
            }

            tabla.innerHTML = ""; 

            result.forEach(categoria => {
                let fila = '<tr>';
                fila += `<td>${categoria.nombre}</td>`;

                fila += `<td class="text-center">
                    <a class="btn btn-warning" href="categoria/edit?id=${categoria.id}">Editar</a> |
                    <a class="btn btn-danger" href="javascript:categoryController.delete(${categoria.id})">Eliminar</a> 
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
    const nombre = document.getElementById("nombreCategoria").value;

    let y = 20;

    // Título principal
    doc.setFont("helvetica", "bold");
    doc.setFontSize(18);
    doc.text("Informe de la Categoria", 105, y, { align: "center" });
    y += 15;

    // Línea horizontal decorativa
    doc.setDrawColor(100);
    doc.line(20, y, 190, y);
    y += 10;

    // Sección de datos
    doc.setFontSize(12);
    doc.setFont("helvetica", "normal");

    doc.text(`Nombre: ${nombre}`, 20, y); y += 8;
  

    // Fecha de generación
    y += 10;
    doc.setFontSize(10);
    doc.setTextColor(150);
    doc.text(`Fecha de generación: ${new Date().toLocaleString()}`, 20, y);

    // Guardar el archivo
    doc.save(`categoria_${nombre}.pdf`);
},

    resetForm : () => {

        let inputsForm = document.querySelectorAll("input");

        inputsForm.forEach(input => {
            input.value = "";
        })
    },

    enableForm: condition => {

      let form = document.getElementById("formEditCategoria");
      let inputs = form.querySelectorAll("input");

      inputs.forEach(input => {
          input.disabled = condition;
        });  
},

    validarFormulario() {

    const nombre = document.getElementById('nombreCategoria').value.trim();

    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre) || nombre === '') {
      alert('Por favor ingrese un nombre de Categoria válido.');
      return false;
    }
    
    return true;
    
  }

}

window.categoryController = categoryController;


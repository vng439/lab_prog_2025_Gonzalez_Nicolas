import { itemService } from "./service.js"

export const itemController = {

    load: (id) => {
        itemService.load(id)
                .then((item) => {
                  console.log("Datos del item:", item);

                  if(item.result.categoriaId === 3) item.result.categoria = "3";
                  if(item.result.categoriaId === 6) item.result.categoria = "6";
                  if(item.result.categoriaId === 5) item.result.categoria = "5";
                  if(item.result.categoriaId === 4) item.result.categoria = "4"; 

                  // Cargamos los datos en el formulario
                  document.getElementById("idProducto").value = item.result.id; 
                  document.getElementById("nombreProducto").value = item.result.nombre;
                  document.getElementById("codigoProducto").value = item.result.codigo;
                  document.getElementById("descripcionProducto").value = item.result.descripcion;
                  document.getElementById("categoriaProducto").value = item.result.categoria; 
                  document.getElementById("precioProducto").value = item.result.precio;
                  document.getElementById("stockProducto").value = item.result.stock; 

                })
                .catch((error) => {
                  console.error("Error al cargar item:", error);
                }); 
    },

    save: () => {
    let form = document.forms["formCreateProduct"];

    let newProduct = {
        nombre: form.nombreProducto.value,
        codigo: form.codigoProducto.value,
        descripcion: form.descripcionProducto.value,
        categoriaId: parseInt(form.categoriaProducto.value),
        precio: parseFloat(form.precioProducto.value),
        stock: parseInt(form.stockProducto.value),
    };

    itemService.save(newProduct).then(() => {
        const modalPregunta = new bootstrap.Modal(document.getElementById("modalPreguntaContinuar"));
        modalPregunta.show();
    });
},

    /* save : () => {

        let form = document.forms["formCreateProduct"];
        
        let newProduct = {
            nombre: form.nombreProducto.value,
            codigo: form.codigoProducto.value,
            descripcion: form.descripcionProducto.value,
            categoriaId: parseInt(form.categoriaProducto.value), 
            precio: parseFloat(form.precioProducto.value),        
            stock: parseInt(form.stockProducto.value),     
        }

        itemService.save(newProduct);
        const modal = new bootstrap.Modal(document.getElementById('modalGuardarProducto'));
        modal.show();
    }, */

    update: () => {

        let form = document.forms["formEditProducto"];

        const params = new URLSearchParams(window.location.search);
        const id = parseInt(params.get("id"));
        
        let newProduct = {

            id: id,
            nombre: form.nombreProducto.value,
            codigo: form.codigoProducto.value,
            descripcion: form.descripcionProducto.value,
            categoriaId: form.categoriaProducto.value,
            precio: form.precioProducto.value,
            stock: form.stockProducto.value,
        }

        console.log("Datos del producto a actualizar:", newProduct);

        itemService.update(newProduct).then(() => {
            const modal = new bootstrap.Modal(document.getElementById('modalProductoActualizado'));
            modal.show();
        });

    },

    delete: id =>{

        itemService.delete(id).then(() => itemController.list());
    },
    
    list: () =>{

        const categoriaFiltro = document.getElementById("filtroCategoriaProducto")?.value || "";

        const filtros = {};
    
        if (categoriaFiltro) filtros.categoria = categoriaFiltro;

        itemService.list(filtros).then(result => {
                  const tabla = document.getElementById("tablaProductos");

                  if (!Array.isArray(result) || result.length === 0) {
                      tabla.innerHTML = '<tr><td colspan="6" class="text-center text-muted">No hay productos cargados actualmente</td></tr>';
                      return;
                  }

                  tabla.innerHTML = "";

                  result.forEach(producto => {

                      if(producto.categoriaId === 3) producto.categoriaNombre = "CD";
                      if(producto.categoriaId === 6) producto.categoriaNombre = "Vinilo";
                      if(producto.categoriaId === 5) producto.categoriaNombre = "Instrumento";
                      if(producto.categoriaId === 4) producto.categoriaNombre = "Equipo de Sonido";

                      let fila = '<tr>';
                      fila += `<td>${producto.nombre}</td>`;
                      fila += `<td>${producto.codigo}</td>`;
                      fila += `<td>${producto.descripcion}</td>`;
                      fila += `<td>${producto.categoriaNombre}</td>`;
                      fila += `<td>${producto.precio}</td>`;
                      fila += `<td>${producto.stock}</td>`;
                      fila += `<td class="text-center">
                          <a class="btn btn-warning" href="producto/edit?id=${producto.id}">Editar</a> |
                          <a class="btn btn-danger" id="btnEliminarTabla" href="javascript:itemController.delete(${producto.id})">Eliminar</a>
                      </td>`;
                      fila += '</tr>';
      
                      tabla.insertAdjacentHTML('beforeend', fila);
                  });
              });
          

            },

    exportToPDF : () => {

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

        const nombreProducto = document.getElementById("nombreProducto").value;
        const codigo = document.getElementById("codigoProducto").value;
        const descripcion = document.getElementById("descripcionProducto").value;
        const categoria = document.getElementById("categoriaProducto").selectedIndex === 3 ? "CD" : document.getElementById("categoriaProducto").selectedIndex === 6 ? "Vinilo" : document.getElementById("categoriaProducto").selectedIndex === 5 ? "Instrumento" : "Equipo de Sonido";
        const precio = document.getElementById("precioProducto").value;
        const stock = document.getElementById("stockProducto").value;

    let y = 20;

    // Título principal
    doc.setFont("helvetica", "bold");
    doc.setFontSize(18);
    doc.text("Informe del Producto", 105, y, { align: "center" });
    y += 15;

    // Línea horizontal decorativa
    doc.setDrawColor(100);
    doc.line(20, y, 190, y);
    y += 10;

    // Sección de datos
    doc.setFontSize(12);
    doc.setFont("helvetica", "normal");

    
    doc.text(`Codigo: ${codigo}`, 20, y); y += 8;
    doc.text(`Descripción: ${descripcion}`, 20, y); y += 8;
    doc.text(`Categoría: ${categoria}`, 20, y); y += 8;
    doc.text(`Precio: ${precio}`, 20, y); y += 8;
    doc.text(`Stock: ${stock}`, 20, y); y += 10;

    // Fecha de generación
    y += 10;
    doc.setFontSize(10);
    doc.setTextColor(150);
    doc.text(`Fecha de generación: ${new Date().toLocaleString()}`, 20, y);

    // Guardar el archivo
    doc.save(`producto_${nombreProducto}.pdf`);
    },

    exportToPDFTable: () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    let y = 20;

    // Título
    doc.setFont("helvetica", "bold");
    doc.setFontSize(18);
    doc.text("Listado de Productos", 105, y, { align: "center" });
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
    const originalTable = document.getElementById("tablaProd");
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
    doc.save("listado_productos.pdf");
},

    resetForm : () => {

        let inputsForm = document.querySelectorAll("input");
        let selectForm = document.getElementById("categoriaProducto");
        inputsForm.forEach(input => {
            input.value = "";
        })
        selectForm.selectedIndex = 0;
    },

    enableForm: condition => {

        let form = document.getElementById("formEditProducto")
        let inputs = form.querySelectorAll("input, select");
        inputs.forEach(input => {

        input.disabled = condition;
        });    
    },

    validarFormulario() {

  const nombreProducto = document.getElementById('nombreProducto').value.trim();
  const codigo = parseInt(document.getElementById('codigoProducto').value);
  const descripcion = document.getElementById('descripcionProducto').value.trim();
  const categoria = document.getElementById('categoriaProducto');
  const precio = document.getElementById('precioProducto').value;
  const stock = document.getElementById('stockProducto').value;

    if (!/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s\-]+$/.test(nombreProducto) || nombreProducto.trim() === '') {
      alert('Por favor ingrese un nombre de Producto válido.');
      return false;
    }

    if (!/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s\-]+$/.test(codigo) || codigo === '') {
    alert('Por favor ingrese un código de producto válido. (numérico)');
    return false;
  }

    if (!/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s\-]+$/.test(descripcion) || descripcion === '') {
    alert('Por favor ingrese una descripción.');
    return false;
  }

  if (categoria.selectedIndex === 0) {
    alert('Seleccione un tipo de Categoría para el Producto');
    return false;doc.text(`Nombre: ${nombreProducto}`, 20, y); y += 8;
  }

  if (!/^\d+(\.\d{1,2})?$/.test(precio)) {
  alert('Ingrese un precio para el producto válido.');
  return false;
}

if (!/^\d+$/.test(stock) || stock === '') {
  alert('Por favor ingrese una cantidad de stock válida (solo números enteros positivos).');
  return false;
}

  return true;
  
}
}

window.itemController = itemController;

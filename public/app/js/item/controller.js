const itemController = {

    load: id => {

        let item = itemService.load(id);
        let form = document.forms["formEditProducto"];

        form.nombreProducto.value = item.nombreProducto;
        form.codigoProducto.value = item.codigo;
        form.descripcionProducto.value = item.descripcion;
        form.categoriaProducto.value = item.categoria;
        form.precioProducto.value = item.precio;
        form.stockProducto.value = item.stock;
    },

    save : () => {

        let form = document.forms["formCreateProduct"];
        
        let newProduct = {
            nombreProducto: form.nombreProducto.value,
            codigo: form.codigoProducto.value,
            descripcion: form.descripcionProducto.value,
            categoria: form.categoriaProducto.value,
            precio: form.precioProducto.value,
            stock: form.stockProducto.value,
        }

        itemService.save(newProduct);
        const modal = new bootstrap.Modal(document.getElementById('modalGuardarProducto'));
        modal.show();
    },

    update: () => {

        let form = document.forms["formEditProducto"];
        
        let newProduct = {
            nombreProducto: form.nombreProducto.value,
            codigo: form.codigoProducto.value,
            descripcion: form.descripcionProducto.value,
            categoria: form.categoriaProducto.value,
            precio: form.precioProducto.value,
            stock: form.stockProducto.value,
        }

        itemService.update(newProduct);
        const modal = new bootstrap.Modal(document.getElementById('modalProductoActualizado'));
        modal.show();

    },

    delete: id =>{
        
        itemService.delete(id);
        itemController.list();

    },
    
    list: () =>{

        let productos = itemService.list();
        let tabla = document.getElementById("tablaProductos");

        if(productos.length === 0){
           let fila = ' <td colspan="7" class="text-center text-muted"> No hay usuarios cargados actualmente</td>'
           tabla.innerHTML = fila;
        }
        else{
            tabla.innerHTML="";
        }

        productos.forEach(producto => {

            let fila = '<tr>'

            fila += '<td>' + (producto.nombreProducto) +'</td>'
            fila += '<td>' + (producto.codigo) +'</td>'
            fila += '<td>' + (producto.descripcion) +'</td>'
            fila += '<td>' + (producto.categoria) +'</td>'
            fila += '<td>' + (producto.precio) +'</td>'
            fila += '<td>' + (producto.stock) +'</td>'
            fila += '<td> <a href="item/edit.html?id='+producto.id+'"> Editar </a> | <a href="javascript:itemController.delete('+producto.id+')"> Eliminar </a> </td> '
            fila += '</tr>'
            tabla.insertAdjacentHTML('beforeend', fila);

        })
    },

    exportToPDF : () => {

        const {jsPDF} = window.jspdf;
        const doc = new jsPDF();

        // Obtener los datos del formulario
        const nombreProducto = document.getElementById("nombreProducto").value;
        const codigo = document.getElementById("codigoProducto").value;
        const descripcion = document.getElementById("descripcionProducto").value;
        const categoria = document.getElementById("categoriaProducto").value;
        const precio = document.getElementById("precioProducto").value;
        const stock = document.getElementById("stockProducto").value;


        // Construir contenido del PDF
        let y = 15;
        doc.setFontSize(14);
        doc.text("Datos del Producto", 10, y); y += 10;
        doc.text("Nombre de Producto: " +nombreProducto, 10, y); y += 10;
        doc.text("Codigo del Producto: " +codigo, 10, y); y += 10;
        doc.text("Descripción del Producto: " +descripcion, 10, y); y += 10;
        doc.text("Categoría del Producto: " +categoria, 10, y); y += 10;
        doc.text("Precio del Producto: " +precio, 10, y); y += 10;
        doc.text("Stock de Producto: " +stock, 10, y); y += 10;

        // Descargar el archivo
        doc.save(`producto_${nombreProducto}.pdf`);
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
    }
}


function validarFormulario() {

  const nombreProducto = document.getElementById('nombreProducto').value.trim();
  const codigo = parseInt(document.getElementById('codigoProducto').value);
  const descripcion = document.getElementById('descripcionProducto').value.trim();
  const categoria = document.getElementById('categoriaProducto');
  const precio = document.getElementById('precioProducto').value;
  const stock = document.getElementById('stockProducto').value;

  if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombreProducto) || nombreProducto === '') {
    alert('Por favor ingrese un nombre de Producto válido.');
    return false;
  }

    if (!/[0-9]+$/.test(codigo) || codigo === '') {
    alert('Por favor ingrese un código de producto válido. (numérico)');
    return false;
  }

  if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(descripcion) || descripcion === '') {
    alert('Por favor ingrese una descripción.');
    return false;
  }

  if (categoria.selectedIndex === 0) {
    alert('Seleccione un tipo de Categoría para el Producto');
    return false;
  }

    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(precio)) {
    alert('Ingrese un precio para el producto válido.');
    return false;
  }

  if (!/^(?=.*[0-9]).{6,9}$/.test(stock) || stock === '') {
    alert('Por favor ingrese una cantidad de stock de producto válido. (numérico)');
    return false;
}

  return true;
  
}
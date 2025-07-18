<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
</head>
<body>
    <header>
    </header>

    <main>

        <div class="text-center mt-4 mb-4">
            <h1>Página Principal de Productos</h1>
        </div>

        <div class="text-center mt-5 mb-5">
            <a class="btn btn-primary mx-4" href="producto/create">Crear Nuevo Producto</a>
            <button type="button" class="btn btn-primary mx-4" onclick="itemController.exportToPDFTable()">Exportar Listado de Productos</button>
        </div>


        <h5 class="text-center">Filtros de Búsqueda</h5>

        <div class="mb-4 row d-flex justify-content-center">
            <div class="col-2 mb-1">
                <label for="filtroEstadoUsuario"> Tipo de Producto</label>
                <select class="form-select" name="filtroEstadoUsuario" id="filtroCategoriaProducto">
                    <option value="">Seleccione un Tipo de Producto</option>
                    <option value="3">CD</option>
                    <option value="6">Vinilo</option>
                    <option value="5">Instrumento</option>
                    <option value="4">Equipo de Sonido</option>
                </select>
            </div>

            <div class="col-3 mb-1 mt-4">
                <button class="btn btn-primary" id="btnBuscar">Buscar</button>
            </div>
            
        </div>

        <div class="px-5">

            <table class="table table-bordered table-hover table-striped" id="tablaProd">

                <thead class="table-info">
                    <tr>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="tablaProductos">
                
                </tbody>
            </table>

        </div>



        <div class="modal fade" id="btnEliminarTabla" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    ¿Estás seguro de que querés eliminar este usuario? Esta acción no se puede deshacer.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmarEliminarBtn">Eliminar</button>
                </div>
            </div>
        </div>

    </main>

</body>
</html>
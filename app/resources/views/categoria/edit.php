<!DOCTYPE html>
<html lang="es">
<head>
    <title>Edición de Producto</title>
</head>
<body>
    <header>
    </header>

    <main>

        <div class="text-center mt-4 mb-4">
            <h1>Edición de Producto</h1>
        </div>


        <div class="container-sm">
            <form class="form" autocomplete="off" action="javascript:void(0)" id="formEditCategoria">

            <input type="hidden" name="idProducto" id="idProducto" value="">

                
                <div class="row justify-content-center">
                    <div class="col-3 form mb-5">
                        <label class="form-label" for="nombreCategoria">Nombre de la Categoria</label>
                        <input type="text" id="nombreCategoria" class="form-control" disabled/>            
                    </div>                    
                </div>   

                 <div class="text-center mt-5 mb-3">
                    <button type="button" class="btn btn-warning mx-2" id="editCategoria">Editar Categoria</button>
                    <button type="button" class="btn btn-success mx-2" id="updCategoria" disabled>Actualizar Categoria Actual</button>
                    <button type="button" class="btn btn-danger mx-2" id="cancelEditCategoria" disabled>Cancelar Edición de Categoria</button>
                    <button type="button" class="btn btn-primary mx-2" onclick="window.location.href='categoria/index'" id="btnIndexCategorias">Volver al Listado de Categorias</button>
                </div>

                 <div class="text-center mt-5">

                    <button type="button" class="btn btn-danger mx-2" id="btnEliminar">Eliminar Categoria</button>
                    <a type="button" class="btn btn-secondary mx-2" onclick="categoryController.exportToPDF()">Exportar a PDF</a>
                </div>

            </form>
        </div>

    </main>

        <div class="container"> 

            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"> <!-- flex-wrap justify-content-between -->
                <p class="col mb-0 text-body-secondary"> Sistema "EDC Music" </p> 
                <p class="col mb-0 text-body-secondary"> Gonzalez Nicolás </p> 
                <p class="col mb-0 text-body-secondary"> Laboratorio de Programación </p> 
                <p class="col mb-0 text-body-secondary"> Analista de Sistemas </p>
                <p class="col mb-0 text-body-secondary"> UNPA - UACO </p> 
                
            </footer> 
        </div>


        <div class="modal fade" id="modalCategoriaActualizada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">¡ATENCIÓN!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Se ha actualizado el Producto correctamente
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalConfirmarEliminacion" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    ¿Estás seguro de que querés eliminar esta categoria? Esta acción no se puede deshacer.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmarEliminarBtn">Eliminar</button>
                </div>
            </div>
        </div>
</body>
</html>
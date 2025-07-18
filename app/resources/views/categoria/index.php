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
            <h1>Página Principal de Categorias</h1>
        </div>

        <div class="text-center mt-5 mb-5">
            <a class="btn btn-primary mx-4" href="categoria/create">Crear Nueva Categoria</a>
            <button type="button" class="btn btn-primary mx-4">Exportar Listado de Categorias</button>
        </div>


        <div class="container mb-5">

            <table class="table table-bordered table-hover">

                <thead class="table-info">
                    <tr>
                        <th class="text-center">Nombre de la Categoria</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody id="tablaCategorias">

                </tbody>
            </table>

        </div>



        <div class="modal fade" id="modalConfirmarEliminacion" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
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
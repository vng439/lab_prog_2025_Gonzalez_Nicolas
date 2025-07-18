<!DOCTYPE html>
<html lang="es">
<head>
    <title>Creación de Nueva Categoria</title>
</head>
<body class="bg-primary-subtle">
    <header>
    </header>

    <main>

        <div class="text-center mt-4 mb-5">
            <h1>Nueva Categoria</h1>
        </div>

        <div class="container-sm ">
            <form class="form" autocomplete="off" action="javascript:void(0)" id="formCreateCategory">
                <div class="row justify-content-center">
                    <div class="col-3 form mb-5">
                        <label class="form-label" for="nombreCategoria">Nombre de la Categoria</label>
                        <input type="text" id="nombreCategoria" class="form-control"/>            
                    </div>
                </div>      
                <div class="text-center mb-5">
                    <button type="button" class="btn btn-success btn mx-4" id="btnGuardarCategoria">Guardar Categoria</button>
                    <a type="button" class="btn btn-primary btn mx-4" href="categoria/index">Volver al Listado de Categorias</a>
                </div>

            </form>
        </div>

    </main>


        <div>
        <!-- Modal -->
            <div class="modal fade" id="modalGuardarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDC Music - Categorías</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        La categoría ha sido guardada con éxito.
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalPreguntaContinuar" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Producto guardado</h5>
                </div>
                <div class="modal-body">
                    ¿Desea seguir agregando productos?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sí, continuar</button>
                    <button type="button" id="btnNoContinuar" class="btn btn-primary">No, volver al inicio</button>
                </div>
                </div>
            </div>
        </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Creación de Nuevo Producto</title>
</head>
<body class="bg-primary-subtle">
    <header>
    </header>

    <main>

        <div class="text-center mt-4 mb-4">
            <h1>Nuevo Producto</h1>
        </div>

        <div class="container-sm ">
            <form class="form" autocomplete="off" action="javascript:void(0)" id="formCreateProduct">
                <div class="row justify-content-center">
                    <div class="col-3 form mb-5">
                        <label class="form-label" for="nombreProducto">Nombre del Producto</label>
                        <input type="text" id="nombreProducto" class="form-control"/>            
                    </div>

                    <div class="col-3 form mb-5">
                        <label class="form-label" for="codigoProducto">Código</label>
                        <input type="text" id="codigoProducto" class="form-control" name="codigoProducto"/>            
                    </div>
                </div>      

                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="descripcionProducto">Descripción</label>
                        <input type="text" id="descripcionProducto" class="form-control" name="descripcionProducto"/>            
                    </div>

                </div>
                
                
               <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="categoriaProducto">Categoría de Producto</label>
                        <select class="form-select" name="categoriaProducto" id="categoriaProducto" >
                            <option value="">Seleccione una Categoría de Producto</option>
                            <option value="3">CD</option>
                            <option value="6">Vinilo</option>
                            <option value="5">Instrumento</option>
                            <option value="4">Equipo de Sonido</option>
                        </select>         
                    </div>

                </div>
                
                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="precioProducto">Precio:</label>
                        <input type="text" id="precioProducto" class="form-control" name="precioProducto" />            
                    </div>

                </div>

                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="stockProducto">Stock:</label>
                        <input type="text" id="stockProducto" class="form-control" name="stockProducto" />            
                    </div>

                </div>   

                <div class="text-center mt-5 mb-5">
                    <button type="button" class="btn btn-success btn-lg mx-4" id="btnGuardarProducto">Guardar Producto</button>
                    <a type="button" class="btn btn-primary btn-lg mx-4" href="producto/index">Volver al Listado de Productos</a>
                </div>

            </form>
        </div>

    </main>




        <div>
        <!-- Modal -->
            <div class="modal fade" id="modalGuardarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDC Music - Usuarios</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        El producto ha sido guardado con éxito.
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
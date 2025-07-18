<!DOCTYPE html>
<html lang="es">
<head>
    <title>Edicion de Usuario</title>
</head>
<body>
    <header>
        
    </header>

    <main>

        <div class="text-center mt-4 mb-4">
            <h1>Edición de Usuarios</h1>
        </div>


        <div class="container-sm">
            <form class="form" autocomplete="off" action="javascript:void(0)" id="formEdit">

                <input type="hidden" name="idUsuario" id="idUsuario" value="">

                <input type="hidden" name="claveUsuario" id="claveUsuario">

                <div class="row justify-content-center">

                     <div class="col-3 form mb-5">
                        <label class="form-label" for="estadoCuenta">Estado de Cuenta</label>

                        <select class="form-select" name="estadoCuenta" id="estadoCuenta" disabled>
                            <option value="">Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                    <div class="col-3 form mb-5">
                        <label class="form-label" for="fechaCreacion">Fecha de Creación:</label>
                        <input type="text" id="fechaCreacion" name="fechaCreacion" class="form-control" disabled readonly/>            
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-3 form mb-5">
                        <label class="form-label" for="nombreUsuario">Nombres</label>
                        <input type="text" id="nombreUsuario" class="form-control" disabled/>            
                    </div>

                    <div class="col-3 form mb-5">
                        <label class="form-label" for="apellidoUsuario">Apellido</label>
                        <input type="text" id="apellidoUsuario" class="form-control" disabled/>            
                    </div>
                </div>   

                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="cuentaUsuario">Cuenta</label>
                        <input type="text" id="cuentaUsuario" class="form-control" disabled/>            
                    </div>

                </div>
                
                
                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="perfilUsuario">Perfil</label>
                        <select class="form-select" name="" id="perfilUsuario" disabled>
                            <option value="">Tipo de Perfil</option>
                            <option value="2">Operador</option>
                            <option value="1">Administrador</option>
                        </select>         
                    </div>

                </div>
                
                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="emailUsuario">Correo</label>
                        <input type="email" id="emailUsuario" class="form-control" disabled />            
                    </div>

                </div>

                 <div class="text-center mt-5 mb-3">
                    <button type="button" class="btn btn-warning mx-2" id="btnEditar">Editar Usuario</button>
                    <button type="button" class="btn btn-success mx-2" id="btnActualizar" disabled>Actualizar Registro Actual</button>
                    <button type="button" class="btn btn-danger mx-2" id="btnCancelarEditar" disabled>Cancelar Edición de Usuario</button>
                    <button type="button" class="btn btn-primary mx-2" id="btnListado" onclick="window.location.href='usuario/index'">Volver al Listado de Usuarios</button>
                </div>

                 <div class="text-center mt-5">

                    <a type="button" class="btn btn-danger mx-2" id="btnEliminar">Eliminar Usuario</a>
                    <button type="button" class="btn btn-secondary mx-2" onclick="userController.exportToPDF()">Exportar a PDF</button>
                </div>

            </form>
        </div>

    </main>


        <div class="modal fade" id="modalUsuarioActualizado" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">¡ATENCIÓN!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Se ha actualizado el Usuario correctamente
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminación -->
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
</div>


</body>
</html>
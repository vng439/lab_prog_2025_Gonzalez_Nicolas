<!DOCTYPE html>
<html lang="es">
<head>    
    <title>Creacion de Usuarios</title>
</head>
<body class="bg-primary-subtle">
    <header>
    
    </header>

    <main>

        <div class="text-center mt-4 mb-4">
            <h1>Creación de Usuarios</h1>
        </div>

        <div class="container-sm ">
            <form class="form" autocomplete="off" id="formCreate">
                <div class="row justify-content-center">
                    <div class="col-3 form mb-5">
                        <label class="form-label" for="nombreUsuario">Nombres</label>
                        <input type="text" id="nombreUsuario" class="form-control"/>            
                    </div>

                    <div class="col-3 form mb-5">
                        <label class="form-label" for="apellidoUsuario">Apellido</label>
                        <input type="text" id="apellidoUsuario" class="form-control"/>            
                    </div>
                </div>   

                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="cuentaUsuario">Cuenta</label>
                        <input type="text" id="cuentaUsuario" class="form-control"/>            
                    </div>

                </div>
                
                
                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="perfil">Perfil</label>
                        <select class="form-select" name="perfil" id="perfilUsuario" >
                            <option value="">Seleccione un tipo de Perfil</option>
                            <option value="Operador">Operador</option>
                            <option value="Administrador">Administrador</option>
                        </select>         
                    </div>

                </div>
                
                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="email">Correo</label>
                        <input type="email" id="emailUsuario" name="emailUsuario" class="form-control"/>            
                    </div>

                </div>

                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="password">Contraseña</label>
                        <input type="password" id="passwordUsuario" name="passwordUsuario" class="form-control" />            
                    </div>

                </div>

                <div class="row justify-content-center">

                     <div class="col-6 form mb-5">
                        <label class="form-label" for="passwordConfirm">Confirmación Contraseña</label>
                        <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control" />            
                    </div>

                </div>

                <div class="text-center mt-5 mb-5">
                    <button type="button" class="btn btn-success btn-lg mx-4" id="btnGuardarUsuario">Guardar Usuario</button>
                    <a type="button" class="btn btn-primary btn-lg mx-4" href="usuario/index">Volver al Listado de Usuarios</a>
                </div>

            </form>
        </div>

    </main>

        


        <!-- Ventanas modales de la aplicación -->
    <div>
        <!-- Modal -->
        <div class="modal fade" id="modalGuardarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">EDC Music - Usuarios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    El usuario ha sido creado con éxito.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
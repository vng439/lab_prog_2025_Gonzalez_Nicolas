<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de Usuarios</title>
</head>
<body>
   <header>
        
    </header>

    <main>

        <div class="text-center mt-4 mb-4">
            <h1>Página Principal de Usuarios</h1>
        </div>

        <div class="text-center mt-5 mb-5">
            <a class="btn btn-primary mx-4" href="usuario/create">Crear Cuenta Nueva</a>
            <button type="button" class="btn btn-primary mx-4" onclick="userController.exportToPDFTable()">Exportar Listado</button>
        </div>

        <h5 class="text-center">Filtros de Búsqueda</h5>

        <div class="mb-4 row d-flex justify-content-center">
            <div class="col-2 mb-1">
                <label for="filtroEstadoUsuario"> Estado de la Cuenta de Usuario</label>
                <select class="form-select" name="filtroEstadoUsuario" id="filtroEstadoUsuario">
                    <option value="">Estado</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <div class="col-2 mb-1">
                <label for="filtroTipoUsuario"> Tipo de Usuario</label>
                <select class="form-select" name="filtroTipoUsuario" id="filtroTipoUsuario">
                    <option value="">Tipo de Usuario</option>
                    <option value="Operador">Operador</option>
                    <option value="Administrador">Administrador</option>
                </select>
            </div>

            <div class="col-3 mb-1 mt-4">
                <button class="btn btn-primary" id="btnBuscar">Buscar</button>
            </div>
            
        </div>

        <div class="container mb-5">

            <table class="table table-bordered table-hover" id="tablaUsers">

                <thead class="table-info">
                    <tr>
                        <th>Usuario</th>
                        <th>Cuenta</th>
                        <th>Perfil</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="tablaUsuarios">

                    <div id="resultado">

                    </div>
                    
                </tbody>
            </table>

        </div>

    </main>

       
</body>
</html>
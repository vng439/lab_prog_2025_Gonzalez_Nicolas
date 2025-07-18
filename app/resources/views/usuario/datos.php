<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mis Datos</title>
</head>
<body class="bg-light">
   <header>
        
    </header>

    <main>

        <div class="text-center mt-4 mb-4">
            <h1>Mi información personal</h1>
        </div>       

        <div class="container">
            <form method="post">

            <div class="row justify-content-center">

                <div class="mb-3 col-md-4">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" readonly disabled value="<?php echo $_SESSION["usuario"]; ?>">
                </div>
                    
                <div class="mb-3 col-md-4">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" readonly disabled value="<?php echo $_SESSION["apellido"]; ?>">
                </div>
            </div>


            <div class="row justify-content-center">

                <div class="mb-3 col-md-4">
                    <label for="cuenta" class="form-label">Cuenta</label>
                    <input type="text" class="form-control" id="cuenta" name="cuenta" readonly disabled value="<?php echo $_SESSION["cuenta"]; ?>">
                </div>
                    
                <div class="mb-3 col-md-4">
                    <label for="perfil" class="form-label">Perfil</label>
                    <input type="text" class="form-control" id="perfil" name="perfil" readonly disabled value="<?php echo $_SESSION["perfil"]; ?>">
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="mb-3 col-md-4">
                    <label for="nombres" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" readonly disabled  value="<?php echo $_SESSION["correo"]; ?>">
                </div>
                    
                <div class="mb-3 col-md-4">
                    <label for="apellido" class="form-label">Fecha de Alta</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" readonly disabled value="<?php echo $_SESSION["fechaAlta"]; ?>">
                </div>
            </div>
                
            </form>
        </div>
    </main>

       
</body>
</html>
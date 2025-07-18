<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= APP_URL ?>app/js/authentication/AuthenticationService.js"></script>
    <title>Autenticación</title>
</head>
<body>

    <main>

    <div class="bg-image" 
     style="background-image: url('https://static.vecteezy.com/system/resources/previews/005/447/462/non_2x/music-seamless-background-this-design-can-be-used-as-wallpaper-for-a-sound-recording-studio-vector.jpg');
            height: 100vh"> 

        <div class="container-sm rounded-3 p-5 shadow-lg bg-info align-center mb-5" style="width: 500px;">

            <div class="text-center mb-3">
                <h1>Bienvenido a EDC Music</h1>
            </div>
            <form class="form" autocomplete="off" id="loginForm">
               <div data-mdb-input-init class="form-outline mb-5 col-md-6 mx-auto">
                    <label class="form-label" for="email">Cuenta</label>
                    <input type="text" id="userName" name="userName" class="form-control "/>
                </div>

                <div data-mdb-input-init class="form-outline mb-5 col-md-6 mx-auto">
                    <label class="form-label" for="contraseña">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control"/>
                </div>

                 <div class="d-grid gap-2 col-7 mx-auto mt-5">
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-dark col-md-7 mx-auto">Ingresar</button>
                 </div>

            <!--  <p id="errorMsg" style="color: red;"></p> -->

            </form>
        </div>

          </div>

    </main>

   <div class="container mt-5"> 
         <footer class="d-flex flex-wrap justify-content-between align-items-center py-3  border-top fixed-bottom text-center bg-light"> <!-- flex-wrap justify-content-between -->
            <p class="col mb-0 text-body-secondary"> Sistema "EDC Music" </p> 
            <p class="col mb-0 text-body-secondary"> Gonzalez Nicolás </p> 
            <p class="col mb-0 text-body-secondary"> Laboratorio de Programación </p> 
            <p class="col mb-0 text-body-secondary"> Analista de Sistemas </p>
            <p class="col mb-0 text-body-secondary"> UNPA - UACO </p> 
        
        </footer> 
    </div>


    <!-- Modal de error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="errorModalLabel">Error de inicio de sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="errorModalBody">
        <!-- Acá se carga el mensaje dinámico -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
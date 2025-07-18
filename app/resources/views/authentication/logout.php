<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    <script src="<?= APP_URL ?>app/js/authentication/AuthenticationService.js"></script>
    <title>Autenticación</title>
</head>
<body>

    <main>
        <div class="text-center mt-4 mb-4">
            <h1>Sistema EDC Music</h1>
        </div>
        <div class="container text-center mt-5">
            <h2>Sesión finalizada</h2>
            <p>Serás redirigido al inicio de sesión en unos segundos...</p>
            <p><a href="<?= APP_URL ?>authentication/index">Redirigir ahora</a></p>
        </div>  
    </main>
    
</body>
</html>
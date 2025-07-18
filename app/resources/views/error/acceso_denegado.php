<div class="container text-center mt-5">
    <h1 class="display-4 text-danger">403 - Acceso denegado</h1>
    <p class="lead">No tiene permisos para acceder a esta sección.</p>
    <a href="<?= APP_URL ?>home/index" class="btn btn-primary mt-3">Volver al inicio</a>

    <script>
    setTimeout(function() {
        window.location.href = "<?= APP_URL ?>home/index";
    }, 3000);
</script>
</div>
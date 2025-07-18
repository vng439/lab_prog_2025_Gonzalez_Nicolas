<!DOCTYPE html>
<html lang="es">
<head>
    <?php

        require_once APP_DIR_TEMPLATE . "includes/head.php";
        if(isset($this->scripts) && is_array($this->scripts)){
            foreach($this->scripts as $script){
                echo '<script defer type="module" src=' . APP_URL . $script . '> </script>' ;
            }
        }
    ?>

</head>
<body>

    <header> 
        <?php
        require_once APP_DIR_TEMPLATE . "includes/menu.php"; 
        //ACA DEBERIAMOS TAMBIEN AGREGAR EL BREADCRUMB EN CASO DE QUE LO TENGAMOS HECHO
        //         require_once APP_DIR_TEMPLATE . "includes/breadcrub.php"; 

        ?>
    </header>

    <main>
        <?php 
        require_once APP_DIR_VIEWS . $this->view;
        ?> 
    </main>


    <div class="container"> 
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 text-center bg-light">
            <?php
                require_once APP_DIR_TEMPLATE . "includes/footer.php"; 
            ?>
        </footer>
    </div>



</body>
</html>
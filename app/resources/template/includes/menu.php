        <nav class="nav nav-underline justify-content-evenly bg-dark">
            <a class="nav-link text-white fs-5" aria-current="page" href="home/index">Inicio</a>
            <a class="nav-link text-white fs-5" href="producto/index">Productos</a>
            <a class="nav-link text-white fs-5" href="categoria/index">Categorias</a>
            <?php if ($_SESSION['perfil'] === 'Administrador'): ?>
            <a class="nav-link text-white fs-5" href="usuario/index">Usuarios</a>  
             <?php endif; ?>
            <div class="dropdown text-end " bis_skin_checked="1"> 
                <a href="#" class="d-block  dropdown-toggle nav-link text-white fs-5" data-bs-toggle="dropdown" aria-expanded="false"> Mi Cuenta</a> 
                <ul class="dropdown-menu text-small "> 
                    <li><a class="dropdown-item" href="#">Hola, <?php echo $_SESSION['usuario'] ?? 'Invitado'; ?></a></li> 
                    <li><hr class="dropdown-divider"></li> 
                    <li><a class="dropdown-item" href="usuario/datos">Mis Datos</a></li> 
                    <li><hr class="dropdown-divider"></li> 
                    <li><a class="dropdown-item" href="authentication/logout">Cerrar Sesión</a></li> 
                </ul> 
            </div>
        </nav>
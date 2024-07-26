<?php
session_start();

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['nombre'])) {
    // Redirigir a la página principal si está autenticado
    header("Location: bienvenida.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="headerPrincipal">
        <img src="images/logos/logopage.png" alt="Logo Header">
        <a href="home.php">Inicio</a>
        <div class="searchBox">
            <input class="searchInput" type="text" name="" placeholder="Buscar algo">
            <button class="searchButton" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                    <g clip-path="url(#clip0_2_17)">
                        <g filter="url(#filter0_d_2_17)">
                            <path
                                d="M23.7953 23.9182L19.0585 19.1814M19.0585 19.1814C19.8188 18.4211 20.4219 17.5185 20.8333 16.5251C21.2448 15.5318 21.4566 14.4671 21.4566 13.3919C21.4566 12.3167 21.2448 11.252 20.8333 10.2587C20.4219 9.2653 19.8188 8.36271 19.0585 7.60242C18.2982 6.84214 17.3956 6.23905 16.4022 5.82759C15.4089 5.41612 14.3442 5.20435 13.269 5.20435C12.1938 5.20435 11.1291 5.41612 10.1358 5.82759C9.1424 6.23905 8.23981 6.84214 7.47953 7.60242C5.94407 9.13789 5.08145 11.2204 5.08145 13.3919C5.08145 15.5634 5.94407 17.6459 7.47953 19.1814C9.01499 20.7168 11.0975 21.5794 13.269 21.5794C15.4405 21.5794 17.523 20.7168 19.0585 19.1814Z"
                                stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                shape-rendering="crispEdges"></path>
                        </g>
                    </g>
                    <defs>
                        <filter id="filter0_d_2_17" x="-0.418549" y="3.70435" width="29.7139" height="29.7139"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                            <feOffset dy="4"></feOffset>
                            <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                            <feComposite in2="hardAlpha" operator="out"></feComposite>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0">
                            </feColorMatrix>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_17"></feBlend>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_17" result="shape">
                            </feBlend>
                        </filter>
                        <clipPath id="clip0_2_17">
                            <rect width="28.0702" height="28.0702" fill="white"
                                transform="translate(0.403503 0.526367)"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>
        <div class="iniciar-sesion">
            <a class="hidden" href="home.php"><i class="fa fa-home"></i></a>
        </div>

    </header>

    <div class="inicio">
        <h1 class="tituloLogin">Iniciar Sesión</h1>
        <h2>Descubre un mundo de posibilidades y beneficios.<br> ¡Conectate Ahora!</h2>
        <div class="wrapper">
            <div class="card-switch">
                <label class="switch">
                    <input type="checkbox" class="toggle">
                    <span class="slider"></span>
                    <span class="card-side"></span>
                    <div class="flip-card__inner">
                        <div class="flip-card__front">
                            <div class="title">Iniciar Sesión</div>
                            <form class="flip-card__form" action="logueo.php" method="post">
                                <input class="flip-card__input" name="email" placeholder="Usuario" type="email" required>
                                <input class="flip-card__input" name="password" placeholder="Contraseña" type="password" required>
                                <button class="flip-card__btn" type="submit">Acceder</button>
                            </form>
                        </div>
                        <div class="flip-card__back">
                            <div class="title">Registrarse</div>
                            <form class="flip-card__form" action="registro.php" method="post">
                                <input class="flip-card__input" placeholder="Nombre" type="name" name="nombre" required>
                                <input class="flip-card__input" name="email" placeholder="Email" type="email" required>
                                <input class="flip-card__input" name="password" placeholder="Contraseña" type="password" required>
                                <input class="flip-card__input" name="confirmPassword" placeholder="Confirmar Contraseña" type="password" required>
                                <button class="flip-card__btn" type="submit">Registrarse</button>
                            </form>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="single_footer">
                        <img src="images/logos/logogusoft.png" alt="">
                        <ul>
                            <li><a href="https://gusoft.com.mx/#nosotros">Nosotros</a></li>
                            <li><a href="https://gusoft.com.mx/#pricing">Servicios</a></li>
                            <li><a href="https://gusoft.com.mx/#proyectos">Proyectos </a></li>
                            <li><a href="https://gusoft.com.mx/#contacto">Contacto</a></li>
                        </ul>
                    </div>
                </div><!--- END COL -->

            </div><!--- END ROW -->
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <p class="copyright">Copyright © 2024 <a href="https://gusoft.com.mx/"><strong>Gusoft</strong></a>.</p>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </div>
</body>

</html>
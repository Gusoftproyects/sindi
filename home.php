<?php
session_start(); // Iniciar la sesión
include 'conexion.php'; // Incluir la conexión a la base de datos

// Consulta para obtener todos los servicios
$sql = "
SELECT servicios.*, usuarios.nombre 
FROM servicios 
JOIN usuarios ON servicios.user_id = usuarios.id";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Sindi</title>
</head>

<body>
    <header class="headerPrincipal">
        <img src="images/logos/logopage.png" alt="Logo Header">
        <a href="#">Inicio</a>
        <a href="#funcionamiento">Funcionamiento</a>
        <a href="#servicios">Servicios</a>
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
            <a href="login.php"><i class="fa fa-user"></i></a>
        </div>

    </header>
    <div class="inicio">
        <img class="imagen" src="images/iconos/IconoDeIntercambio.png" alt="Logo IconoDeIntercambio">
        <h1>ADQUIERE SERVICIOS SIN<br>GASTAR DINERO</h1>
        <h2>OFRECE SERVICIOS A CAMBIO DE OTROS SERVICIOS</h2>
        <h3 id="funcionamiento"> ¿CÓMO FUNCIONA? </h3>
        <p> Encuentra algunos servicios de tu interés a cambio de algun servicio tuyo o alguna habilidad que tengas para
            ofrecer, dicha persona decidirá comunicarte contigo si sea de su interés. Finalmente cerrarán un trato en
            privado para beneficio de ambos sin necesidad de gastar un solo peso, solamente tiempo. </p>
        <h3> ¿CÓMO OFREZCO MIS SERVICIOS? </h3>
        <p> Inicia sesión en nuestra plataforma y completa la información de tu servicio o habilidades, añade una
            descripción y tu información de contacto. Una vez hecho esto se publicará automáticamente en la plataforma
            para que si una persona este interesado en tus servicios te pueda contactar.</p>
    </div>
    <div class="btnLogin">
        <button>
        <a href="login.php">regístrate aquí</a>
        </button>
    </div>
    <div class="categorias">
        <h1>CATEGORÍAS</h1>
        <div class="tipos">
            <a href=""> Tecnología </a>
            <a href=""> Música </a>
            <a href=""> Arte </a>
            <a href=""> Deportes </a>
            <a href=""> Educación </a>
            <a href=""> Diseño </a>
            <a href=""> Marketing </a>
            <a href=""> Escritura </a>
            <a href=""> Salud </a>
            <a href=""> Industrial </a>

        </div>
    </div>
    <div class="servicios">
        <h1 id="servicios">SERVICIOS</h1>
        <div class="tarjetas">

            <?php
            if ($result->num_rows > 0) {
                // Salida de datos por cada fila
                while ($row = $result->fetch_assoc()) {
            ?>


                    <div class="card">
                        <div class="img">
                            <img src="<?php echo $row['imagen'] ?>" alt="Perfil">
                        </div>
                        <span><?php echo $row['nombre'] ?></span>
                        <h3><?php echo $row['servicio'] ?></h3>
                        <p class="info"><?php echo $row['descripcion'] ?></p>
                        <div class="share">
                            <a href="<?php echo $row['facebook'] ?>"> <i class="fa fa-facebook"></i>
                            </a>

                            <a href="<?php echo $row['instagram'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="26" fill="currentColor"
                                    class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                    </path>
                                </svg></a>

                        </div>
                    </div>
            <?php
                }
            }
            ?>

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
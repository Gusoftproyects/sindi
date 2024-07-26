<?php
session_start();
include 'conexion.php';
// proteger pagina, solo acceden usuarios logueados
if (!isset($_SESSION['nombre'])) { // si existe algo en esa variable de sesion y luego el ! cambia el booleano (si no estoy logueado)
    header('Location: login.php'); // redireccionar
    exit; // se interrumpe el codigo
}
$id = isset($_POST['id']) ? $_POST['id'] : null;
$user_id = $_SESSION['user_id']; // Suponiendo que el ID del usuario está almacenado en la sesión
$servicio = '';
$descripcion = '';
$facebook = '';
$instagram = '';
$imagen = '';
// Cargar los datos actuales del servicio
$sql = "SELECT * FROM servicios WHERE user_id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $id = htmlspecialchars($row['id']);
    $servicio = htmlspecialchars($row['servicio']);
    $descripcion = htmlspecialchars($row['descripcion']);
    $facebook = htmlspecialchars($row['facebook']);
    $instagram = htmlspecialchars($row['instagram']);
    $imagen = htmlspecialchars($row['imagen']);
}
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bienvenida</title>
</head>

<body>
    <header class="headerPrincipal">
        <img src="images/logos/logopage.png" alt="Logo Header">

        <a href="home.php#servicios">Servicios</a>
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
            <a href="logout.php"><i class="fa fa-sign-out"></i></a>
            
        </div>
    </header>
    <div class="bienvenida">
        <img class="imagen" src="images/iconos/IconoDeBienvenida.png" alt="Logo IconoDeBienvenida">
        <h1>¡Bienvenido <?php echo $_SESSION['nombre']; ?>! </h1>
        <h2>Ya seas un experto en tu campo o un entusiasta del aprendizaje,<br>aquí encontrarás una comunidad diversa lista para colaborar.<br><br> Rellena o actualiza la información para mostrarle al público que es lo que haces.</h2>
    </div>
    <div class="wrapper">
        <div class="flip-card__inner">
            <div class="flip-card__front">
                <div class="title">Tú Información</div>
                <form class="flip-card__form" action="update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                    <label class="txtImage">Nombre del servicio / habilidad</label>
                    <input class="flip-card__input" name="servicio" placeholder="Desarrollador Web" type="text" value="<?php echo htmlspecialchars($servicio); ?>" required>
                    <label class="txtImage">Descripción de tu servicio</label>
                    <textarea class="flip-card__input" name="descripcion" placeholder="Soy una persona con habilidades en..." maxlength="205" required><?php echo htmlspecialchars($descripcion); ?></textarea>
                    <label class="txtImage">Link a tu Facebook</label>
                    <input class="flip-card__input" name="facebook" placeholder="https://www.facebook.com/gusoftoficial/" type="text" value="<?php echo htmlspecialchars($facebook); ?>">
                    <label class="txtImage">Link a tu Instagram</label>
                    <input class="flip-card__input" name="instagram" placeholder="https://www.instagram.com/gusoft_oficial/" type="text" value="<?php echo htmlspecialchars($instagram); ?>">
                    <label class="txtImage">Sube la imagen de tu perfil</label>
                    <?php if ($imagen): ?>
                        <img src="<?php echo htmlspecialchars($imagen); ?>" alt="Imagen de perfil" style="max-width: 150px;">
                    <?php endif; ?>
                    <input class="flip-card__input" name="imagen" type="file">
                    <button class="flip-card__btn" type="submit">Guardar</button>
                </form>
            </div>
        </div>
        </label>
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
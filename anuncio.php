<?php 
    //optener el id
    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id) {
        header("location: /");
    }
    // inportar la coneción de la base de datos
    require "includes/config/database.php";
    $db = conectarDB();

    mysqli_set_charset($db, "utf8");

    //hacer la consulta
    $consulta = "SELECT * FROM propiedades WHERE id=${id}";
    //optener los resultados
    $resultado = mysqli_query($db, $consulta);
    if(!$resultado -> num_rows) {
        header("location: /");

    }
    $propiedad = mysqli_fetch_assoc($resultado);
    require "includes/funciones.php";
    incluirTemplate("header");
?>


    <main class="contenedor seccion contenido-centrado">

        
        <h1><?php echo $propiedad["titulo"] ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $propiedad["imagen"] ?>" alt="Imagen de la pripiedad">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad["precio"] ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono"  loading="lazy"  src="build/img/icono_wc.svg" alt="icono ws">
                    <p><?php echo $propiedad["wc"] ?></p>
                </li>

                <li>
                    <img  class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad["estacionamiento"] ?></p>
                </li>

                <li>
                    <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad["habitaciones"] ?></p>
                </li>
            </ul>
            <p>
            <?php echo $propiedad["descripcion"] ?>
            </p>
        </div>

    </main>

<?php 
    //cerrar la conexión
    mysqli_close($db);
    incluirTemplate("footer");
?>

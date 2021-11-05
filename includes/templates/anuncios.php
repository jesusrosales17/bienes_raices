<?php 
    //inportar la conexion de la base de datos
    require __DIR__ . "/../config/database.php";
    $db = conectarDB();
    mysqli_set_charset($db, "utf8");
    //consultar
    $sql = "SELECT * FROM propiedades LIMIT ${limite}";
    //leer los resultados
    $resultado = mysqli_query($db, $sql);
?>
<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)) : ?>
    <div class="anuncio">
        <img loading="lazy" width="200" height="300" src="/imagenes/<?php echo $propiedad["imagen"] ?>" alt="anuncio">
        <div class="contenido-anuncio">
            <h3><?php echo $propiedad["titulo"] ?></h3>
            <p><?php echo $propiedad["descripcion"] ?></p>
            <p class="precio">$<?php echo $propiedad["precio"] ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono ws">
                    <p><?php echo $propiedad["wc"] ?></p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad["estacionamiento"] ?></p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad["habitaciones"] ?></p>
                </li>
            </ul>

            <a href="anuncio.php?id=<?php echo $propiedad["id"] ?>" class="boton-amarillo">Ver Propiedad</a>
        </div>
        <!--.contenido-anuncio-->
    </div>
    <!--.anuncio-->
    <?php endwhile; ?>

    <!-- <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpg">
                    <img loading="lazy" width="200" height="300" src="build/img/anuncio1.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa Terminados de Lujo</h3>
                    <p>Casa en el lago con exelente vista, acabados de lujo a un exelente precio</p>
                    <p class="precio">$3,000,000</p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy"  src="build/img/icono_wc.svg" alt="icono ws">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p>4</p>
                        </li>
                    </ul>

                    <a href="anuncio.php" class="boton-amarillo">Ver Propiedad</a>
                </div> 
            </div> 

            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpg">
                    <img loading="lazy" width="200" height="300" src="build/img/anuncio1.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa con alberca</h3>
                    <p>Casa en el lago con exelente vista, acabados de lujo a un exelente precio</p>
                    <p class="precio">$3,000,000</p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy"  src="build/img/icono_wc.svg" alt="icono ws">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p>3</p>
                        </li>

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p>4</p>
                        </li>
                    </ul>

                    <a href="anuncio.php" class="boton-amarillo">Ver Propiedad</a>
                </div> <!--.contenido-anuncio-->
    <!-- </div>  -->
</div>

<?php 
    //cerrar la conexión
    mysqli_close($db);
?>
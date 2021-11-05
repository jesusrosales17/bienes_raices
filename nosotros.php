<?php 
    require "includes/funciones.php";
    incluirTemplate("header");
?>


    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpg">
                    <img loading="lazy"  src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error quasi accusantium nostrum iusto doloribus blanditiis illum! Magni cupiditate, labore mollitia dolore saepe odit officiis, deserunt ipsum iure aperiam, facilis voluptatem!
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat itaque quasi aliquid accusamus nisi magnam provident minus molestias exercitationem veritatis nemo laboriosam mollitia qui dolores id cupiditate quisquam, voluptatum natus?
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae suscipit ex, corporis reiciendis quas pariatur veniam natus ipsum dolorem deserunt laboriosam eligendi ad expedita alias similique amet voluptatem perferendis distinctio!
                    Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi.
                    
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h2>Más Sobre Nosotros</h2>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>
                  Maxime reprehenderit at excepturi ipsa eum dicta voluptatibus sed explicabo laboriosam? Voluptatibus quos aspernatur debitis autem? Quod perspiciatis aut aliquam magni accusantium!
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>
                  Maxime reprehenderit at excepturi ipsa eum dicta voluptatibus sed explicabo laboriosam? Voluptatibus quos aspernatur debitis autem? Quod perspiciatis aut aliquam magni accusantium!
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>
                  Maxime reprehenderit at excepturi ipsa eum dicta voluptatibus sed explicabo laboriosam? Voluptatibus quos aspernatur debitis autem? Quod perspiciatis aut aliquam magni accusantium!
                </p>
            </div>
        </div>
    </section>
    <?php incluirTemplate("footer"); ?>


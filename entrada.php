<?php 
    require "includes/funciones.php";
    incluirTemplate("header");
?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoración de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la pripiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum odio aliquid dolorum autem officia. Ipsa, error dolorem, aliquid a libero sit blanditiis omnis aspernatur magni ex amet accusantium architecto odio?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, labore! Recusandae dolor ad doloribus, expedita optio ea repudiandae, impedit dolore magni beatae at debitis exercitationem iste illum voluptate quae quia.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati inventore magnam sapiente, quasi perferendis nemo. Magni porro nobis sed similique fugiat earum quisquam? Placeat velit ratione alias libero veritatis facilis!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo hic, voluptatum tempora quae, cum velit porro officiis ratione harum recusandae eligendi dolorum unde deleniti doloremque commodi ipsam iure nobis explicabo!
            </p>
        </div>
    </main>

    <?php incluirTemplate("footer"); ?>


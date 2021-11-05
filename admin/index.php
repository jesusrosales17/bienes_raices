<?php
require "../includes/funciones.php";

$auth = estaAutenticado();

if(!$auth) {
    header("location: /");
}
//importar la conexión
require "../includes/config/database.php";
$db = conectarDB();
mysqli_set_charset($db, "utf8");
//escribir el query
$query = "SELECT * FROM propiedades";
//consultar la BD
$resultadoConsulta = mysqli_query($db, $query);
//Muestra mensaje condicional
$resultado = $_GET["resultado"] ?? null;


if($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id) {
        //elimina el archivo
        $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
        $resultado = mysqli_query($db, $query);

        $propiedad = mysqli_fetch_assoc($resultado);
        unlink("../imagenes/" . $propiedad["imagen"]);
        
        //elimina la propiedad
        $query = "DELETE FROM propiedades WHERE id = ${id}";
        $resultado = mysqli_query($db, $query);

        if($resultado) {
            header("location: /admin?resultado=3");
        }
    }
}

//incluye un template
// require "../includes/funciones.php";
incluirTemplate("header");

?>


<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif(intval($resultado) === 2) : ?>
        <p class="alerta exito">Anuncio Actualizar Correctamente</p>
    <?php elseif(intval($resultado) === 3) : ?>
        <p class="alerta exito">Anuncio Eliminado Correctamente</p>
    <?php endif ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- mostrar los resultados -->
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td><?php echo $propiedad["id"] ?></td>
                    <td><?php echo $propiedad["titulo"] ?></td>
                    <td> <img class="imagen-tabla" src="/imagenes/<?php echo $propiedad["imagen"] ?>" alt="imagen propiedad"> </td>
                    <td><?php echo $propiedad["precio"] ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad["id"] ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="admin/propiedades/actualizar.php?id=<?php echo$propiedad["id"] ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<!-- Cerrar la conexión -->


<?php 
    mysqli_close($db);
    incluirTemplate("footer"); 
?>
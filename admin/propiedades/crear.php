<?php
require "../../includes/funciones.php";

$auth = estaAutenticado();

if(!$auth) {
    header("location: /");
}
//Base de datos
require "../../includes/config/database.php";
$db = conectarDB();

mysqli_set_charset($db, "utf8");

// consultar para optener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);



//arreglo con mensajes de error
$errores = [];

$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = "";
// ejecutar el codigo despues de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";
    // exit;

    $precio = mysqli_real_escape_string($db, $_POST["precio"]);
    $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
    $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
    $habitaciones = mysqli_real_escape_string($db, $_POST["habitaciones"]);
    $wc = mysqli_real_escape_string($db, $_POST["wc"]);
    $estacionamiento = mysqli_real_escape_string($db, $_POST["estacionamientos"]);
    $vendedorId = mysqli_real_escape_string($db, $_POST["vendedor"]);
    $creado = date("y/m/d");

    // asignar files asia una variable
    $imagen = $_FILES["imagen"];
    
    if (!$titulo) {
        $errores[] = "Deves añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "El precio es obligatorio";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "La descripción es obligatorio y debe tener almenos 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "El numero de habitaciones es obligatorio";
    }
    if (!$wc) {
        $errores[] = "El numero de baños es obligatorio";
    }
    if (!$estacionamiento) {
        $errores[] = "El numero de lugares de estacionamiento es obligatorio";
    }
    if (!$vendedorId) {
        $errores[] = "Elige un vendedor";
    }
    if(!$imagen["name"] || $imagen["error"]) {
        $errores[] = "La imagen es obligatoria";
    }

    //validar por tamaño 100kb maximo
    $medida = 1000 * 1000;

    if($imagen["size"] > $medida) {
        $errores[] = "la imagen es muy pesada peso maximo de 1M";
    }
    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";
    // var_dump($vendedorId);
    // exit;

    // Revisar que el arreglo de errores este vacio
    if (empty($errores)) {
        //ssubida de archivos

        //crear carpetas
        $carpetaImagenes = "../../imagenes";
        
        if(!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        //generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        var_dump($nombreImagen);

    // echo "<pre>";
    // var_dump($imagen);
    // echo "</pre>";

        //subir la imagen
        move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . "/" . $nombreImagen);
        


        //insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', $habitaciones, $wc, $estacionamiento, '$creado', $vendedorId)";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            // Redireccionar al usuario
            header("Location: /admin?resultado=1");
        }
    }



    // echo $query;
}
incluirTemplate("header");
?>



<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data" >
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="descripcion">descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" placeholder="Ej: 3" name="wc" min="1" max="9" value="<?php echo $wc ?>">

            <label for="estacionamientos">Estacionamientos:</label>
            <input type="number" id="estacionamientos" name="estacionamientos" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select id="vendedor" name="vendedor">
                <option value="">-- Seleccione --</option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado)):?>
                    <option <?php echo $vendedorId === $vendedor["id"] ? "selected" : "" ?> value="<?php echo $vendedor["id"] ?>"><?php echo $vendedor["nombre"] . " " . $vendedor["apellido"] ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate("footer"); ?>
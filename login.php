<?php
require "includes/config/database.php";
$db = conectarDB();

//actutentica el usuario
$errores = [];

if($_SERVER["REQUEST_METHOD"] === "POST" ) {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) );
    $password = mysqli_real_escape_string($db, $_POST["password"] );

    if(!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }
    if(!$password) {
        $errores[] = "El password es obligatorio";
    }
    if(empty($errores)) {
        //revisar si existe el usuario
        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);
        // var_dump($resultado);

        if($resultado -> num_rows) {
            //revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            //verificar si el usuario el correcto o no
            $auth = password_verify($password, $usuario["password"]);

            if($auth) {
                //el usuario esta autenticado
                session_start();
                //llenar el arreglo de la sesión
                $_SESSION["usuario"] = $usuario["email"];
                $_SESSION["login"] = true;

                header("location: /admin");
                
            } else {
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }

    // echo '<pre>';
    // var_dump($errores);
    // echo '</pre>';
}

// incluye el header
require "includes/funciones.php";
incluirTemplate("header");
?>


<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu Correo" name="email" id="email">

            <label for="email">Password</label>
            <input type="password" placeholder="Tu Password" name="password" id="password">

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </fieldset>
    </form>
</main>

<?php incluirTemplate("footer"); ?>
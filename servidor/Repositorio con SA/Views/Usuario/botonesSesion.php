<?php
if(isset($_SESSION["usuario"])){
    ?>
    <form action="../APP/Controller/ControllerUsuario.php" method="post">
        <input type="submit" name="CerrarSesion">
    </form>
<?php
} else {
?>
    <a href="./login.php">Login</a>
    <a href="./registro.php">Registro</a>
<?php
}
?>
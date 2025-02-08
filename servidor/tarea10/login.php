<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<div><p>admin</p><p>admin_password</p></div>
<div><p>user</p><p>user_password </p></div>
<form method="post" action="procesar_login.php">
    <input type="text" name="nombre" placeholder="Nombre de Usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <input type="submit" value="Iniciar Sesión">
</form>
</body>
</html>

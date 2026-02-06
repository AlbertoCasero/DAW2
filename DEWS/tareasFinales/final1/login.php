<?php
session_start();
$token = uniqid();
$_SESSION['token'] = $token;
if(isset($_POST["datos"])){
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        try{
            $con = new PDO('mysql:host=localhost;dbname=cursoscp;charset=utf8', 'admin', '1234');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $con->prepare("SELECT usuario,contraseña FROM administradores WHERE usuario=? AND contraseña=?");
            $query->execute([$username, $password]);
            if ($query->rowCount() > 0) {
                header("Location: panelAdmin.php?token=$token");
                exit();
            }
            $query = $con->prepare("SELECT dni, correo, contrasena FROM solicitantes WHERE correo=? AND contrasena=?");
            $query->execute([$username, $password]);
            if ($query->rowCount() > 0) {
                $fila = $query->fetch(PDO::FETCH_ASSOC);
                $_SESSION['dni'] = $fila['dni'];
                header("Location: panelUsuario.php?token=$token");
                exit();
            }
            echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos.</div>";
            $con = null;
        }catch(PDOException $e){
            die("Error de conexión: " . $e->getMessage());
        }
        $strsql2 = "SELECT usuario,contraseña FROM usuarios WHERE usuario='$username' AND contraseña='$password'";
    } else {
        echo "Por favor, ingresa tu usuario y contraseña.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="estilos.css">
    <title>Cursos</title>
</head>
<body>
    <h1 class='text-center'>LOGIN</h1><br><br>
    <form id="loginForm" action="login.php" method="post">
        <label for="username">Usuario/Email:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <input id="boton-login" name='datos' type="submit" value="Iniciar Sesión">
    </form>
    <div class="text-center"><br>
        <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p><br>
        <a href="listaCursos.php">Volver al Menu Principal</a>
    </div>
</body>
</html>
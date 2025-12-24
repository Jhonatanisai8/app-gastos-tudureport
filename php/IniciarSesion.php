<?php
require_once __DIR__ . '/ValidarData.php';
require_once __DIR__ . '/DataBase.php';
require_once __DIR__ . '/../helpers/Mensaje.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return;
}

$login_usuario  = isset($_POST["nombre_usuario"]) ? limpiarCadena($_POST["nombre_usuario"]) : "";
$login_password = isset($_POST["password"]) ? limpiarCadena($_POST["password"]) : "";

if ($login_usuario === "" || $login_password === "") {
    echo mensajePlantilla("¡Error!", "Todos los campos son obligatorios.");
    return;
}

if (verificarDatos("^(?=.*[A-Z])[A-Za-z0-9]+$", $login_usuario)) {
    echo mensajePlantilla("¡Error!", "Usuario inválido.");
    return;
}

if (verificarDatos(
    "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$",
    $login_password
    )) {
        echo mensajePlantilla("¡Error!", "Contraseña inválida.");
        return;
    }
    
$pdo = conexion();

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
$stmt->execute(['nombre' => $login_usuario]);

if ($stmt->rowCount() !== 1) {
    echo mensajePlantilla("¡Error!", "Usuario o contraseña incorrectos.");
    return;
}

$datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!password_verify($login_password, $datosUsuario["password"])) {
    echo mensajePlantilla("¡Error!", "Usuario o contraseña incorrectos.");
    return;
}

session_regenerate_id(true);
$_SESSION['id_usuario'] = $datosUsuario['id'];
$_SESSION['nombre_usuario'] = $datosUsuario['nombre'];

header("Location: index.php?vista=home");
exit;

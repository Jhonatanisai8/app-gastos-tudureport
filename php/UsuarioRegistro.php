<?php
require_once "DataBase.php";
require_once "ValidarData.php";
require_once __DIR__ . '/../helpers/Mensaje.php';


//capturamos los datos 
$nombre = limpiarCadena($_POST["nombre_usuario"]);
$email = limpiarCadena($_POST["email"]);
$password = limpiarCadena($_POST["password"]);

//verificamos los campos obligatorios
if ($nombre == "" || $email == "" || $password == "") {
    echo mensajePlantilla("Error de Registro", "Todos los campos son obligatorios.");
    exit();
}

//intigridad de los datos 
if (verificarDatos("^(?=.*[A-Z])[A-Za-z0-9]+$", $nombre)) {
    echo mensajePlantilla("Error de Registro", "El nombre no cumple con el formato requerido.");
    exit;
}

if (verificarDatos("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$", $password)) {
    echo mensajePlantilla("Error de Registro", "La contraseña no cumple con el formato requerido.");
    exit;
}

//verificamos si el email ya existe
if ($email != "") {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailConsultar = conexion();
        $emailConsultar = $emailConsultar->query("SELECT email FROM usuarios WHERE email='$email'");
        if ($emailConsultar->rowCount() > 0) {
            echo mensajePlantilla("Error de Registro", "El correo electrónico ya está registrado.");
            exit;
        }
        $emailConsultar = null;
    } else {
        echo mensajePlantilla("Error de Registro", "El correo electrónico no es válido.");
        exit;
    }
}

$usuarioConsultar = conexion();
$usuarioConsultar = $usuarioConsultar->query("SELECT nombre FROM usuarios WHERE nombre='$nombre'");
if ($usuarioConsultar->rowCount() > 0) {
    echo mensajePlantilla("Error de Registro", "El nombre de usuario ya está en uso.");
    exit;
}
$usuarioConsultar = null;


//has de la contraseña
$passwordHas = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);

//guardamos los datos
$guardarUsuario = conexion();
$dataUsuario = [
    "nombre" => $nombre,
    "email" => $email,
    "password" => $passwordHas
];
$guardarUsuario = $guardarUsuario->prepare("INSERT INTO usuarios (nombre, email,password) VALUES (:nombre, :email, :password)");
$resultado = $guardarUsuario->execute($dataUsuario);
if ($resultado) {
    echo mensajePlantilla("Registro Exitoso", "Tu cuenta ha sido creada exitosamente. Ahora puedes iniciar sesión.");
} else {
    echo mensajePlantilla("Error de Registro", "Hubo un problema al crear tu cuenta. Por favor, intenta nuevamente.");
}

$guardarUsuario = null;

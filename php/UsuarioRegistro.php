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
    } else {
        echo mensajePlantilla("Error de Registro", "El correo electrónico no es válido.");
        exit;
    }
}

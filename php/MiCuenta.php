<?php
require_once "DataBase.php";
require_once "ValidarData.php";
require_once __DIR__ . '/../helpers/Mensaje.php';
$idUsuario = $_SESSION['id_usuario'];

try {
    $SQL = "SELECT nombre, email, password, activo, fecha_creacion FROM usuarios WHERE id = :id_usuario;";
    $usuarioConsulta = conexion();
    $usuarioConsulta = $usuarioConsulta->prepare($SQL);
    $usuarioConsulta->execute([":id_usuario" => $idUsuario]);
    $usuario = $usuarioConsulta->fetch(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    echo mensajePlantilla("¡Error!", "No se pudieron cargar los datos de la cuenta.");
    exit();
}

<?php
require_once __DIR__ . '/ValidarData.php';
require_once __DIR__ . '/DataBase.php';
require_once __DIR__ . '/../helpers/Mensaje.php';

try {
    $SQL = "SELECT id,nombre FROM categorias;";
    $categorias_consulta = conexion();
    $categorias_consulta = $categorias_consulta->prepare($SQL);
    $categorias_consulta->execute();
    $categorias = $categorias_consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    echo mensajePlantilla("¡Error!", "No se pudieron cargar las categorías.");
    exit();
}

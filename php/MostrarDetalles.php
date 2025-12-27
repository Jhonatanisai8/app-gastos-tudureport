<?php
require_once "DataBase.php";
require_once "ValidarData.php";
require_once __DIR__ . '/../helpers/Mensaje.php';

$idUsuario = $_SESSION['id_usuario'];
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');

if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha)) {
    $fecha = date('Y-m-d');
}

try {
    $SQL = "SELECT id, descripcion, monto, created_at, id_categoria 
            FROM gastos 
            WHERE id_usuario = :id_usuario 
            AND DATE(created_at) = :fecha
            ORDER BY created_at DESC";

    $gastosConsulta = conexion();
    $gastosConsulta = $gastosConsulta->prepare($SQL);
    $gastosConsulta->execute([
        ":id_usuario" => $idUsuario,
        ":fecha" => $fecha
    ]);
    $detallesGastos = $gastosConsulta->fetchAll(PDO::FETCH_ASSOC);

    $totalDia = 0;
    foreach ($detallesGastos as $gasto) {
        $totalDia += $gasto['monto'];
    }
} catch (\Throwable $th) {
    echo mensajePlantilla("¡Error!", "No se pudieron cargar los detalles de los gastos.");
}

<?php
require_once "DataBase.php";
require_once "ValidarData.php";
require_once __DIR__ . '/../helpers/Mensaje.php';
$idUsuario = $_SESSION['id_usuario'];
try {
    $SQL = "SELECT SUM(g.monto) AS total_diario
            FROM gastos g
            INNER JOIN usuarios u ON g.id_usuario = u.id
                WHERE g.created_at >= CURDATE()
                AND g.created_at < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
                AND g.id_usuario = :id_usuario
            GROUP BY u.id;";

    $gastosConsulta = conexion();
    $gastosConsulta = $gastosConsulta->prepare($SQL);
    $gastosConsulta->execute([":id_usuario" => $idUsuario]);
    $gastos = $gastosConsulta->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    echo mensajePlantilla("¡Error!", "No se pudieron cargar los gastos.");
    exit();
}

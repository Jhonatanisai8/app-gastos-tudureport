<?php
require_once "DataBase.php";

$idUsuario = $_SESSION['id_usuario'];

try {
    $SQL = "SELECT 
                DAYOFWEEK(fecha) as dia_semana,
                SUM(monto) as total_monto,
                COUNT(*) as cantidad_gastos
            FROM gastos 
            WHERE id_usuario = :id_usuario 
            GROUP BY DAYOFWEEK(fecha)
            ORDER BY DAYOFWEEK(fecha)";

    $conexion = conexion();
    $consulta = $conexion->prepare($SQL);
    $consulta->execute([":id_usuario" => $idUsuario]);
    $gastosPorDia = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $diasSemana = [
        1 => ['nombre' => 'Domingo', 'total' => 0, 'cantidad' => 0],
        2 => ['nombre' => 'Lunes', 'total' => 0, 'cantidad' => 0],
        3 => ['nombre' => 'Martes', 'total' => 0, 'cantidad' => 0],
        4 => ['nombre' => 'Miércoles', 'total' => 0, 'cantidad' => 0],
        5 => ['nombre' => 'Jueves', 'total' => 0, 'cantidad' => 0],
        6 => ['nombre' => 'Viernes', 'total' => 0, 'cantidad' => 0],
        7 => ['nombre' => 'Sábado', 'total' => 0, 'cantidad' => 0],
    ];

    foreach ($gastosPorDia as $gasto) {
        $dia = (int)$gasto['dia_semana'];
        $diasSemana[$dia]['total'] = (float)$gasto['total_monto'];
        $diasSemana[$dia]['cantidad'] = (int)$gasto['cantidad_gastos'];
    }

    $labelsChart = [];
    $datosChart = [];
    $cantidadesChart = [];

    $ordenDias = [2, 3, 4, 5, 6, 7, 1]; // Lunes a Domingo
    foreach ($ordenDias as $diaNum) {
        $labelsChart[] = $diasSemana[$diaNum]['nombre'];
        $datosChart[] = $diasSemana[$diaNum]['total'];
        $cantidadesChart[] = $diasSemana[$diaNum]['cantidad'];
    }

    $totalGeneral = array_sum($datosChart);
} catch (\Throwable $th) {
    $labelsChart = [];
    $datosChart = [];
    $cantidadesChart = [];
    $totalGeneral = 0;
}

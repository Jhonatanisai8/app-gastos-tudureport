<?php
require_once __DIR__ . '/ValidarData.php';
require_once __DIR__ . '/DataBase.php';
require_once __DIR__ . '/../helpers/Mensaje.php';

//datos 
$idUsuario = $_SESSION['id_usuario'];
$monto = limpiarCadena(isset($_POST['monto']) ? floatval($_POST['monto']) : 0);
$idCategoria = limpiarCadena(isset($_POST['id_categoria']) ? intval($_POST['id_categoria']) : 0);
$descripcion = limpiarCadena(isset($_POST['descripcion']) ? $_POST['descripcion'] : '');
$fecha = limpiarCadena(isset($_POST['fecha']) ? $_POST['fecha'] : '');
//validamos
if ($monto <= 0) {
    echo mensajePlantilla("¡Error!", "El monto del gasto debe ser mayor a cero.");
    return;
}

if ($idCategoria <= 0) {
    echo mensajePlantilla("¡Error!", "La categoría del gasto debe ser válida.");
    return;
}

if ($descripcion == "") {
    echo mensajePlantilla("¡Error!", "La descripción del gasto debe ser válida.");
    return;
}
if ($fecha == "") {
    echo mensajePlantilla("¡Error!", "La fecha del gasto es obligatoria.");
    return;
}

if (!strtotime($fecha)) {
    echo mensajePlantilla("¡Error!", "La fecha tiene un formato inválido.");
    return;
}

$fechaActual = date('Y-m-d');
if ($fecha > $fechaActual) {
    echo mensajePlantilla("¡Error!", "La fecha del gasto no puede ser mayor a la fecha actual.");
    return;
}
//guardamos los datos 
try {
    $guardarGasto = conexion();
    $SQL = "INSERT INTO gastos (id_usuario, monto, id_categoria, descripcion, fecha) 
            VALUES (:id_usuario, :monto, :id_categoria, :descripcion, :fecha);";
    $data = [
        ":id_usuario" => $idUsuario,
        ":monto" => $monto,
        ":id_categoria" => $idCategoria,
        ":descripcion" => $descripcion,
        ":fecha" => $fecha
    ];
    $guardarGasto = $guardarGasto->prepare($SQL);
    $guardarGasto->execute($data);
    if ($guardarGasto->rowCount() === 1) {
        echo mensajePlantilla("¡Éxito!", "Gasto registrado correctamente. " . $idUsuario);
    } else {
        echo mensajePlantilla("¡Error!", "No se pudo registrar el gasto.");
    }
} catch (\Throwable $th) {
    echo mensajePlantilla("¡Error!", "Ocurrió un error al registrar el gasto.");
    return;
}

$guardarGasto = null;

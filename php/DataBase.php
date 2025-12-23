<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
// Cargar las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

function conexion()
{
    try {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db   = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];

        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

        $PDO = new PDO($dsn, $user, $pass);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $PDO;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}

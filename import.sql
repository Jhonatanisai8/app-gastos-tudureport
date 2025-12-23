CREATE DATABASE demo_app_gastos;
USE demo_app_gastos;
CREATE TABLE usuarios
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    nombre   VARCHAR(50)         NOT NULL,
    email    VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255)        NOT NULL,
    activo   TINYINT(1) DEFAULT 1
);
ALTER TABLE usuarios
    add fecha_creacion timestamp default CURRENT_TIMESTAMP;
CREATE TABLE categorias
(
    id     INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    tipo   ENUM ('gasto', 'ingreso') DEFAULT 'gasto'
);
CREATE TABLE gastos
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario   INT,
    id_categoria INT,
    monto        DECIMAL(10, 2) NOT NULL,
    descripcion  VARCHAR(255),
    fecha        DATE           NOT NULL,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id),
    FOREIGN KEY (id_categoria) REFERENCES categorias (id)
);

CREATE DATABASE IF NOT EXISTS restapi;
USE restapi;

CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO clientes (nombre, email) VALUES ('Juan Perez', 'juan.perez@email.com');
INSERT INTO clientes (nombre, email) VALUES ('Maria Garcia', 'maria.garcia@email.com');

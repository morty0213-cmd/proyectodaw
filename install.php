<?php
require_once("config.php");

try {
    // Conectamos al servidor MySQL sin seleccionar la base de datos específica todavía
    $pdo = new PDO("mysql:host=" . SERVIDOR, USUARIO, CONTRASENA);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Leemos el archivo SQL
    $sqlFile = __DIR__ . '/database.sql';
    if (!file_exists($sqlFile)) {
        die("No se encuentra el archivo database.sql");
    }
    
    $sql = file_get_contents($sqlFile);

    // Ejecutamos el SQL (crear DB, tabla e inserts)
    $pdo->exec($sql);
    
    echo "<h1>Base de datos instalada correctamente</h1>";
    echo "<p>Se ha creado la base de datos, la tabla 'clientes' y se han insertado datos de prueba.</p>";
    echo "<a href='clientes/seleccionar.php'>Ver Clientes</a>";
    
} catch (PDOException $e) {
    echo "<h1>Error</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
    // Si el error es que la base de datos ya existe, intentamos insertar solo los datos
    if (strpos($e->getMessage(), 'database exists') !== false) {
        echo "<p>Intenta borrar la base de datos 'restapi' manualmente o revisa tu configuración.</p>";
    }
}
?>

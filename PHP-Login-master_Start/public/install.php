<?php
require "config.php";

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    
    // Read and execute SQL only if the file exists
    $sqlFile = '../data/init.sql';
    if (file_exists($sqlFile)) {
        $sql = file_get_contents($sqlFile);
        $connection->exec($sql);
        echo "Database and table users created successfully.";
    } else {
        echo "Error: SQL file not found.";
    }
} catch(PDOException $error) {
    echo $error->getMessage();
}

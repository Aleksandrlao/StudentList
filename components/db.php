<?php


/*
 * Получаем объект для работы с базой данных
 * */
function getConnection() {
    try {
        $dbConfig = include('config/db.php');
        $host = $dbConfig['host'];
        $db   = $dbConfig['db'];
        $user = $dbConfig['user'];
        $pass = $dbConfig['pass'];
        $charset = $dbConfig['charset'];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        return $pdo = new PDO($dsn, $user, $pass, $opt);



    } catch (Exception $e) {
        die ('disconnect ' . $e->getMessage());
    }
}

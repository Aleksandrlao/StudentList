<?php

include('db.php');
$dbConnection = getConnection();

function insertNewStudent($newStudent) {
    $stmt = $dbConnection->prepare("INSERT 
          INTO student (`name`, `age`, `university_id`) 
          VALUES (:name, :age, :university_id);");
    $stmt -> execute(array(
        'name' => $newStudent['name'],
        'age' => $newStudent['age'],
        'university_id' => $newStudent['university_id']
    ));
    return $stmt;
}
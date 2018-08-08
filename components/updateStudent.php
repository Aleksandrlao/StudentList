<?php

function updateStudent($dbConnection, $studentId = NULL, $studentInfo) {
    $updateStudent = $dbConnection->prepare("UPDATE student SET `name` = :name, `age` = :age,
        WHERE :id");
    $updateStudent -> execute(array(
        ':id' => $studentId,
        ':name' => $studentInfo['name'],
        ':age' => $studentInfo['age']));
    return $updateStudent;
}
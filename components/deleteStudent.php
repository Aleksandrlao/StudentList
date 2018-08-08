<?php

function deleteStudent($dbConnection, $studentId = NULL) {
    $deleteStudent = $dbConnection->prepare("DELETE FROM student WHERE :id");
    $deleteStudent -> execute(array(':id' => $studentId ));
    return $deleteStudent;
}
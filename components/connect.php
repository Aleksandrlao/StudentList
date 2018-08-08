<?php
// database connection
include('db.php');
$dbConnection = getConnection();

// get all university on select
include('getAllUniversity.php');

// get list of student
include('getAllStudent.php');

// get list of student
include('updateStudent.php');

// delete student
include('deleteStudent.php');

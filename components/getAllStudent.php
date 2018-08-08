<?php

function getAllStudent($dbConnection, $order = 'name') {
    $allStudent = '';
    if( $order == 'age' ) {
        $orderName = 'student.age';
    } elseif( $order == 'university' ) {
        $orderName = 'university.name';
    } else {
        $orderName = 'student.name';
    }
    $getAllStudent = $dbConnection->prepare("SELECT student.name, student.age, university.name AS university_name
    FROM student 
    INNER JOIN university ON student.university_id = university.id ORDER BY :order");
    var_dump($orderName);
    $getAllStudent -> execute(array(':order' => $orderName ));

    foreach ($getAllStudent as $item) {
        $allStudent .= '<div class="student_item">';
        $allStudent .= '<div class="student_item-name">'.$item['name'].'</div>';
        $allStudent .= '<div class="student_item-age">'.$item['age'].'</div>';
        $allStudent .= '<div class="student_item-university">'.$item['university_name'].'</div>';
        $allStudent .= '</div>';
    }
    return $allStudent;
}
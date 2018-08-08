<?php

// Очистка данных
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

if( !empty($_POST["name"]) && !empty($_POST["age"]) ) {
    $inputArray = array(
        'name' => clean( $_POST['name'] ),
        'age' => clean( $_POST['age'] ),
        'university_id' => clean( $_POST['university_id'] )
    );
    echo "Студент добавлен успешно!\n","Включите JavaScript в браузере!";
} else {
    echo "Заполните все поля!\n","Включите JavaScript в браузере!";
}

if (isset($_POST['send']) && $inputArray[0] != '') {
    include('components/insertNewStudent.php');
    insertNewStudent($inputArray);
}
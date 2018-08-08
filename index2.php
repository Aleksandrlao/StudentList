<?php

include('components/db.php');

$dbConnection = getConnection();
//var_dump($dbConnection);

$universityAll = $dbConnection->query("SELECT * FROM university");



if (isset($_POST['send'])) {
    $success = true;
    $stmt = $dbConnection->prepare("INSERT 
      INTO student (`name`, `age`, `university_id`) 
      VALUES (:name, :age, :university_id);");
    $stmt -> execute(array(
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'university_id' => $_POST['university_id']
    ));

    if( $stmt ) {
        $message = 'Пользователь '.$_POST['name'].' добавлен';
    } else {
        $message = 'Ошибка добавления пользователя';
        $success = false;
    }

    header("Location: /?success=$success&message=$message");

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Study list</title>
</head>
<body>
    <div id="app">

        <p v-if="errors.length">
            <b>Пожалуйста исправьте указанные ошибки:</b>
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
        </p>

        <form @submit="checkForm"
              action="/"
              method="post">
            <p>Имя студента:
                <input id="name" v-model="name" type="text" name="name"></p>
            <p>Возраст:
                <input id="age" v-model="age"  type="text" name="age"></p>
            <p>ВУЗ:
                <select id="university_id"
                        v-model="universityId"
                        name="university_id">
                    <?php foreach ($universityAll as $item) {
                        echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                    } ?>
                </select></p>
            <input type="submit" name="send" value="Отправить">
        </form>


    </div>




<script src="js/vue.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>


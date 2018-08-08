<?php
include('components/connect.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Study list</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="app">

    <div class="add-student">
        <form action="sendForm.php" method="post" class="c_form">
            <p><label for="name">Имя студента:</label>
                <input id="name" type="text" name="name"></p>
            <p><label for="name">Возраст:</label>
                <input id="age" type="text" name="age"></p>
            <p><label for="name">ВУЗ:</label>
                <select id="university_id" name="university_id">
                    <?php echo getAllUniversity($dbConnection); ?>
                </select></p>
            <input type="submit" name="send" value="Отправить">
        </form>
    </div>

    <div class="student-list">
        <?php echo getAllStudent($dbConnection, 'name'); ?>
    </div>


</div>

<div class="popup-thy popup">
    <div class="popup-close"></div>
    <div class="popup-head">
        <div class="popup-title">Студент добавлен!</div>
    </div>
</div>

<div class="overlay"></div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery.forms.js"></script>
<script src="js/jquery.main.js"></script>
</body>
</html>


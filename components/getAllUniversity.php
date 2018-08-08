<?php

function getAllUniversity($dbConnection) {
    $optionAllUniversity = '';
    $getAllUniversity = $dbConnection->query("SELECT * FROM university");
    foreach ($getAllUniversity as $item) {
        $item['id'] == 1 ? $selected = ' selected' : $selected = '';
        $optionAllUniversity .= '<option value="' . $item['id'] . '"' . $selected . '>' . $item['name'] . '</option>';
    }
    return $optionAllUniversity;
}
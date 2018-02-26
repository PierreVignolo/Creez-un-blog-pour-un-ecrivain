<?php
$categoryTable = App::getInstance()->getTable('Category');
if (!empty($_POST)) {
    $result = $categoryTable->delete($_POST['id']);
    header('location: admin.php');
}

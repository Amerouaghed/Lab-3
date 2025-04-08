<?php
session_start();
require '../config/database.php';
require '../app/models/BmiModel.php';
require '../app/controllers/BmiController.php';

$model = new BmiModel($db);
$controller = new BmiController($model);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $controller->calculateBmi($_SESSION['user_id'], $_POST['name'], $_POST['weight'], $_POST['height']);
}
require '../app/views/bmi_form.php';
require '../app/views/bmi_result.php';
?>
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/carproject"."/controllers/CarController.php";

$result = "";
$controller = new CarController;
//var_dump($_POST);
header('Content-type:application/json;charset=utf-8');

if (isset($_GET["function"]) && ! empty($_GET["function"])) {
    switch ($_GET["function"]) {
        case "showCars" : $result =  $controller->showCars();break;
        case "deleteCar" : $result =  $controller->deleteCar($_GET["id"]);break;
        case "updateCar" : 
            $_POST = json_decode($_POST['json'],true);
            $result = $controller->updateCar($_POST["id"]);
            break;
        case "addCar" : 
            $result =  $controller->addCar($_POST);
            break;
    }
}

function utf8ize($d) {
    if (is_array($d) || is_object($d)) {
        foreach ($d as &$v) $v = utf8ize($v);
    } else {
        $enc   = mb_detect_encoding($d);

        $value = iconv($enc, 'UTF-8', $d);
        return $value;
    }

    return $d;
}

echo json_encode($result);
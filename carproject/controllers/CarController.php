<?php
require $_SERVER['DOCUMENT_ROOT'] . '/carproject'.'/Autoloader.php';

class CarController {

    private $carDAO;

    function __construct()
    {
        Autoloader::register();
        $this->carDAO = new Car;
    }

    public function showCars()
    {
        
        $cars = $this->carDAO->findAll();
        $result = [];
        foreach ($cars as $car) {
            array_push($result, ["id" => $car->getId(),
                                 "color" => $car->getColor(),
                                 "brand" => $car->getBrand(),
                                 "model" => $car->getModel(),
                                 "registration" => $car->getRegistration() ]);
        }
        
        return ["status" => "OK", "result" => $result];
    }

    public function deleteCar ($id) {
        $isDeleted = ($this->carDAO->deleteCar($id))? "OK" : "KO";
        return ["status" => $isDeleted];
    }

    public function updateCar ($id) {
        $car = $this->carDAO->findById($id);
        
        switch ($_POST["name"]) {
            case "registration" : $car->setRegistration($_POST["value"]); break;
            case "color" : $car->setColor($_POST["value"]); break;
            case "brand" : $car->setBrand($_POST["value"]); break;
            case "model" : $car->setmodel($_POST["value"]); break;
        }
        $isModified = ($this->carDAO->updateCar($car))? "OK" : "KO";
        return ["status" => $isModified];
    }

    public function addCar ($datas) {
        $id = $this->carDAO->insertCar($datas["registration"], $datas["color"], $datas["brand"], $datas["model"]);
        return ["status" => ($id)? "OK" : "KO", 
                "result" => ["id" => $id,
                             "Registration" => $datas["registration"],
                             "color" => $datas["color"],
                             "brand" => $datas["brand"],
                             "model" => $datas["model"]]];
    }
}
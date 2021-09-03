<?php
// include_once($_SERVER['DOCUMENT_ROOT'] ."/carproject"."/models". "/Car.php");
// $carDao = new Car;
//  $cars = $carDao->findAll();

// var_dump($cars);

?>
<table>


    <?php

function displayCars($cars){
    echo "<thead>
    <th>Registration</th>
    <th>Color</th>
    <th>Brand</th>
    <th>Model</th>
</thead>
<tbody>";

    foreach($cars as $car){
        echo "<tr>";
        echo "<td>".$car->getRegistration() . "</td>\n";
        echo "<td>".$car->getColor() . "</td>\n";
        echo "<td>".$car->getBrand() . "</td>\n";
        echo "<td>".$car->getModel() . "</td>\n";
        echo "</tr>";
        
    
    }

}


// displayCars($cars);




// $carDao->deleteCar(10);

// $carTest = $cars[0];

// $carTest->setBrand($carTest->getBrand().'ferrari');
// $carDao->updateCar($carTest);









// $carDao->insertCar("CV-953-DJ","blue","renault","clio");
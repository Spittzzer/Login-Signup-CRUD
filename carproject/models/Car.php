<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/carproject"."/models/DAO/car.dao.php");

/**
 * Class Voiture
 */
class Car extends CarDAO
{

  public function findAll () {
    $sql="SELECT * FROM cars";
    return $this->getSelfObjects($sql);
    
  }
  
  public function findById($id) {
      $request="SELECT * FROM cars WHERE id= :id";
      $sth = $this->db->prepare($request);
      $sth->bindParam(':id',$id);
      return $this->getSelfObjectPS($sth);
  }
  
  public function updateCar($car) {
      $request = "UPDATE cars SET color= :color, registration = :registration, brand= :brand, model= :model WHERE id = :id;";
      $sth = $this->db->prepare($request);
      $id = $car->getId();
      $c = $car->getColor();
      $br = $car->getbrand();
      $mo = $car->getModel();
      $reg = $car->getRegistration();
      $sth->bindParam(':id',$id);
      $sth->bindParam(':color', $c);
      $sth->bindParam(':brand', $br);
      $sth->bindParam(':model', $mo);
      $sth->bindParam(':registration', $reg);
      
      return $sth->execute();
  }
  
 public function deleteCar ($id) {
     $request = "DELETE FROM cars WHERE id= :id";
     $sth = $this->db->prepare($request);
     $sth->bindParam(':id',$id);
     return $sth->execute();
 }

 public function insertCar ($registration, $color, $brand, $model) {
  $request = "INSERT INTO cars (`registration`, `color`, `brand`, `model`) VALUES (:registration, :color, :brand, :model);";
  $sth = $this->db->prepare($request);
  $sth->bindParam(':registration',$registration);
  $sth->bindParam(':color',$color);
  $sth->bindParam(':brand',$brand);
  $sth->bindParam(':model',$model);
  $sth->execute();
  
  return $this->db->lastInsertId();
}
  
}
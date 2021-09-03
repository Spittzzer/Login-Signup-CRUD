<?php

include_once($_SERVER['DOCUMENT_ROOT']."/carproject"."/models/DAO/DAO.php");

/**
 * Class VoitureDAO
*/
abstract class CarDAO extends EntityBase
{
    
   /**
     * Protected variable
     * (PK)->Primary key
     * @var int $id
     */
   protected $id;
    
   public function getId() {return $this->id;}
    
   public function setId($id) {$this->id=$id;}

  /**
   * Protected variable
   * @var varchar $regist
   */
  protected $registration;

  public function getRegistration() {return $this->registration;}

  public function setRegistration($registration) {$this->registration=$registration;}

  /**
   * Protected variable
   * @var varchar $color
   */
  protected $color;

  public function getColor() {return $this->color;}

  public function setColor($color) {$this->color=$color;}
  
  
  protected $brand;
  
  public function getBrand() {return $this->brand;}
  public function setBrand($brand) {$this->brand=$brand;}
  
  protected $model;
  
  public function getModel() {return $this->model;}
  public function setmodel($model) {$this->model=$model;}
  
  /**
   * Constructor
   * @var mixed $id
   */
  public function __construct($id=0)
  {
    parent::__construct();
    $this->table='cars';
    $this->primkeys=['id'];
    $this->fields=['registration','color','brand','model'];
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR OWN CLASS CONTAINING YOUR BUSINESS LOGIC //
  //  BECAUSE THIS CLASS FILE WILL BE OVERWRITTEN UPON EACH NEW PHPDAO BUILD  //
  // ======================================================================== //
}
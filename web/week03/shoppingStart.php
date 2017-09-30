<?php 
// Initialize the session
session_start();

  class Horses {
    public $name;
    public $desc;
    public $image;
    public $price;
    public $quantity;


    public function __construct($name, $desc, $image, $price, $quantity) {
      $this->name = $name;
      $this->desc = $desc;
      $this->image = $image;
      $this->price = $price;
      $this->quantity = $quantity;
    }
  }

  //Assign items to new horse objects
  $quaterHorse = new Horses("American Quarter Horse", "The American Quarter Horse is well known both as a race horse and for its performance in rodeos, horse shows and as a working ranch horse.", "quarter", "1500.00", "1");
  $thoroughbred = new Horses("Thoroughbred", "Thoroughbreds are used mainly for racing, but are also bred for other riding disciplines such as show jumping, combined training, dressage, polo, and fox hunting.", "thoroughbred", "1000.00", "1");
  $arabian = new Horses("Arabian", "The Arabian has these traits, an ability to form a cooperative relationship with humans that is good-natured, quick to learn, and willing to please.", "arabian", "1250.00", "1");

  // create an array of horse objects
  $horseList = array($quaterHorse, $thoroughbred, $arabian);
?>
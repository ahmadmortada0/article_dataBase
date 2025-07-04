<?php
require_once("Model.php");

  class Catogry extends Model{
    private ?int $id = null;
    private string $name;
    private string $description;
    private int $price;

     public function __construct(array $data){
        if (isset($id)){
            $this->id = $data["id"];
        }
        $this->name = $data["name"];
        $this->description = $data["description"];
        $this->price = $data["price"];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    
    public function getDescription(): string {
        return $this->description;
    }
    
    public function getPrice(): int {
        return $this->price;
    }
    public function setName(string $name){
        $this->name = $name;
    }

    
    public function setDescription(string $description){
        $this->description = $description;
    }
    
    public function setPrice(int $price){
        $this->price = $price;
    }
    public function toArray(){
        return [$this->id, $this->name,  $this->description,$this->price];
    }
  }
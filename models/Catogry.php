<?php
require_once("Model.php");

  class Catogry extends Model{
    private ?int $id = null;
    private string $title;
    private string $description;
    private int $price;

    protected static string $table = "category";
     public function __construct(array $data){
        if (isset($id)){
            $this->id = $data["id"];
        }
        $this->title = $data["title"];
        $this->description = $data["description"];
        $this->price = $data["price"];
    }

    public function getId(): int {
        return $this->id;
    }

    public function gettitle(): string {
        return $this->title;
    }

    
    public function getDescription(): string {
        return $this->description;
    }
    
    public function getPrice(): int {
        return $this->price;
    }
    public function settitle(string $title){
        $this->title = $title;
    }

    
    public function setDescription(string $description){
        $this->description = $description;
    }
    
    public function setPrice(int $price){
        $this->price = $price;
    }
    public function toArray(){
        return [$this->id, $this->title,  $this->description,$this->price];
    }
    public function updateCatogry(mysqli $mysqli ,int $id,string $title,string $description,int $price){
        $stmt="UPDATE category SET title=? , description=? , price=?  where id=?";
        $query=$mysqli->prepare($stmt);
        $query->bind_param("ssii",$title,$description,$price,$id);
        $query->execute();
    }
    public function insertCatogry(mysqli $mysqli,string $title,string $description,int $price){
        $stmt="INSERT INTO category  (title,description,price) values (?,?,?)";
        $query=$mysqli->prepare($stmt);
        $query->bind_param("ssi",$title,$description,$price);
        $query->execute();
    }
  }
<?php
require_once("Model.php");

class Article extends Model{

    private int $id; 
    private string $name; 
    private string $author; 
    private string $description; 
    
    protected static string $table = "articles";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->author = $data["author"];
        $this->description = $data["description"];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setAuthor(string $author){
        $this->author = $author;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function toArray(){
        return [$this->id, $this->name, $this->author, $this->description];
    }
      public  function update(mysqli $mysqli,int $id,array $values){
        // $column=array_map(fn($col)=>"`$columns`",$columns);
        // $speratedcolumn=implode(",",$column);
        // $placeHolders=implode(",",array_fill(0,count($values),"?"));
        $sql ="UPDATE  articles set name = ? , author = ?, description = ?, where id=?";
        $query=$mysqli->prepare($sql);
        $query->bind_Param("sssi",$values,$primary_key);
        $query->excute();
        $data = $query->get_result();
        return $data;
    }

    
}

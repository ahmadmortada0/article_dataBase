<?php
require_once("Model.php");

class Article extends Model{

    private int $id; 
    private string $name; 
    private string $author; 
    private string $description; 
    private int $catogryId; 
    
    protected static string $table = "articles";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->author = $data["author"];
        $this->description = $data["description"];
        $this->catogryId = $data["catogry"];
    }

    public function getId(): int  {
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
    public function getCatogryId(): int  {
        return $this->catogryId;
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
        return [$this->id, $this->name, $this->author, $this->description,$this->catogryId];
    }
    //////////////////////////////////



public static function findcatogry(mysqli $mysqli, int $id){
        $sql =("Select catogry_id from articles WHERE id = ?");
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ;
    }

    public static function allArticles(mysqli $mysqli, int $id){
        $sql = sprintf("Select * from articles where catogry_id=?");
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while($row = $data->fetch_assoc()){
            $objects[] = new static($row);
        }

        return $objects; 
    }









    ///////////////////////////////////////////
      public  function updateArticle(mysqli $mysqli,int $id,string $name,string $author,string $description){
        // $column=array_map(fn($col)=>"`$columns`",$columns);
        // $speratedcolumn=implode(",",$column);
        // $placeHolders=implode(",",array_fill(0,count($values),"?"));
        $found=static::find($mysqli,$id);
        if($found!==null){
            $sql ="UPDATE  articles set name = ? , author = ?, description = ? where id=?";
            $query=$mysqli->prepare($sql);
            $query->bind_param("sssi",$name,$author,$description,$id);
            $query->execute();
            echo "User updated";
            return;
        }
        echo "user not found";
    }
      public  function insertArticle(mysqli $mysqli,string $name , string $author ,string $description ){
        // $column=array_map(fn($col)=>"`$columns`",$columns);
        // $speratedcolumn=implode(",",$column);
        // $placeHolders=implode(",",array_fill(0,count($values),"?"));
        $sql ="INSERT INTO articles  (name,author,description) Values (?,?,?); ";
        $query=$mysqli->prepare($sql);
        $query->bind_param("sss",$name,$author,$description);
        $query->execute();
        return "USERE Inserted";
    }    
}
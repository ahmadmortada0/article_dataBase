<?php
class CatogrySeeder{
   public static function  seed($mysqli){
    $catogry = [
    ['title' => 'Popcorn', 'description' => 'Large salted popcorn', 'price' => 50000],
    ['title' => 'Cola', 'description' => '500ml chilled cola', 'price' => 30000],
    ['title' => 'Nachos', 'description' => 'Cheese nachos with dip', 'price' => 60000],
    ['title' => 'Chocolate Bar', 'description' => 'Sweet and crunchy', 'price' => 25000],
];

$stmt ="INSERT INTO category (title, description, price) VALUES (?, ?, ?)";
$query=$mysqli->prepare($stmt);


foreach ($catogry as $a) {
    $query->bind_param("ssi", $a['title'], $a['description'], $a['price']);
    $query->execute();
}
echo "catogry seeded successfully!";
}}
<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = filter_var(trim($_GET["country"]), FILTER_SANITIZE_STRING);
if($country){
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}else{
  $stmt = $conn->query("SELECT * FROM countries");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<ul>';
  foreach ($results as $row){
    echo '<li>'.$row['name'] . ' is ruled by ' . $row['head_of_state'].'</li>';
  }
  echo '</ul>';




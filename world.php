<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if(isset($_GET["context"])){
  $country = filter_var(trim($_GET["country"]), FILTER_SANITIZE_STRING);
    //$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $stmt = $conn->query("SELECT * FROM countries JOIN cities ON cities.country_code=countries.code WHERE countries.name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<table>';
      echo '<thead>';
        echo '<tr>';
          echo "<th>Name</th>";
          echo "<th>District</th>";
          echo "<th>Population</th>";
        echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      foreach($results as $row){
        echo "<tr>";
          echo "<td>".$row['name']."</td>";
          echo "<td>".$row['district']."</td>";
          echo "<td>".$row['population']."</td>";
        echo "</tr>";
      }
      echo '</tbody>';
    echo '</table>';

}elseif(isset($_GET["country"])){
  $country = filter_var(trim($_GET["country"]), FILTER_SANITIZE_STRING);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  display_country_table($results);

}

function display_country_table($results){
  echo '<table>';
    echo '<thead>';
      echo '<tr>';
        echo "<th>Name</th>";
        echo "<th>Continent</th>";
        echo "<th>Independence</th>";
        echo "<th>Head of State</th>";
      echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach($results as $row){
      echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['continent']."</td>";
        echo "<td>".$row['independence_year']."</td>";
        echo "<td>".$row['head_of_state']."</td>";
      echo "</tr>";
    }
    echo '</tbody>';
  echo '</table>';
}







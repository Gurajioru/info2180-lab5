<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country=filter_input(INPUT_GET, 'country',FILTER_SANITIZE_STRING);
$context=filter_input(INPUT_GET, 'context',FILTER_SANITIZE_STRING);

//$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<?php if($context=="none"):?>
 <?php $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
  <table>
    <caption> List of countries </caption>
    <thead>
      <tr>
        <th> Name </th>
        <th> Continent </th>
        <th> Independence </th>
        <th> Head of State </th>
      </tr>
    </thead>
    <?php foreach ($results as $row): ?>
      <tr>
          <td><?= $row['name']; ?></td>
          <td><?= $row['continent']; ?></td>
          <td><?= $row['independence_year']; ?></td>
          <td><?= $row['head_of_state']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif;?>



<?php if($context=="cities"):?>
  <?php $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  //$code = $conn->query("SELECT DISTINCT code FROM countries WHERE name='$country'");
  //$codeList = $code->fetchALL(PDO::FETCH_ASSOC);
  //$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  
  //$codeForSearch=$codeList[0]['code'];
  
  //$cityQuery= $conn->query("SELECT * FROM cities WHERE country_code='$codeForSearch'");
  $cityQuery= $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code=countries.code WHERE countries.name LIKE '%$country%'");
  $results = $cityQuery->fetchALL(PDO::FETCH_ASSOC);

  //$results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
  <table>
    <caption> City Info </caption>
    <thead>
      <tr>
        <th> Name </th>
        <th> District </th>
        <th> Population </th>
      </tr>
    </thead>
    <?php foreach ($results as $row): ?>
      <tr>
          <td><?= $row['name']; ?></td>
          <td><?= $row['district']; ?></td>
          <td><?= $row['population']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif;?>



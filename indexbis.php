<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

echo 'Celie';

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchALL(PDO::FETCH_ASSOC);
var_dump($friends);

echo '<br> <br> <br>';

foreach($friends as $friend) {
    echo $friend['firstname'] . ' ' . $friend['lastname'];
}

/*$query = "INSERT INTO friend (firstname, lastname) VALUES ('Chandler', 'Bing')";
$statement = $pdo->exec($query);*/
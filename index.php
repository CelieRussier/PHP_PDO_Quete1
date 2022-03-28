<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

echo 'Celie';

/*$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();

echo '<br> <br> <br>';

$query = "INSERT INTO friend (firstname, lastname) VALUES ('Chandler', 'Bing')";
$statement = $pdo->exec($query);*/

?>

<form  action="index.php" method="post">
    <div>
      <label  for="firstname">Prénom :</label>
      <input  type="text"  id="prenom"  name="firstname">
            <p><?php if (empty($_POST['firstname'])) {
            echo 'Veuillez renseigner votre prénom';
            } ?>
            </p>
    </div>
    <div>
      <label  for="lastname">Nom :</label>
      <input  type="text"  id="nom"  name="lastname">
            <p><?php if (empty($_POST['lastname'])) {
            echo 'Veuillez renseigner votre nom';
            } ?>
            </p>
    </div>
    <div  class="button">
      <button  type="submit">Envoyer votre message></button>
    </div>

<?php

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$query = "INSERT INTO friend (firstname, lastname) VALUES ('$firstname', '$lastname')";
$statement = $pdo->prepare($query);

$statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

$statement->execute();

$friends = $statement->fetchAll();
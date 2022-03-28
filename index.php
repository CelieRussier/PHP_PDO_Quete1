<?php 

require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchALL(PDO::FETCH_ASSOC);

//Création liste HTML de tous les friends :

foreach($friends as $friend) {
?>

<div>
    <ul>
        <li><?php echo $friend['firstname'] . ' ' . $friend['lastname']; ?></li>
    </ul>
</div>

<?php
}
?>

<form  action="index.php" method="post">
    <div>
        <h1>Ajoute un ami !</h1>
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
</form>

    <?php

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
if ( !empty($firstname) && !empty($lastname)) {
    if (strlen($firstname) < 45 && strlen($lastname) < 45) {
        $newQuery = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
        $statement = $pdo->prepare($newQuery);

        $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

        $statement->execute();
    }
}


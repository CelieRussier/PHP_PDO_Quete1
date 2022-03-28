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
        </form>

    <?php

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
$statement = $pdo->prepare($query);

$statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

$statement->execute();

$friends = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($friends as $friend) {
    echo $friend['firstname'] . ' ' . $friend['lastname'];
}

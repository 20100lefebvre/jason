<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/ico" href="images/favicon.ico"><!--favicon-->
  <link rel="stylesheet" href="style/challenge.css" /><!--CSS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><!-- jquery -->
  <script src='script/challenge.js' async></script><!-- js -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- http://vincent.developpeur.free.fr/Challenge-Wild/challenge.php -->
  <title>Challenge</title>
</head>
<body>


<!-- Header section -->
<header>
    <h1>Les Argonautes</h1>
</header>

  <!-- Main section -->
  <main>

    <!-- New member form -->
    <h2>Ajouter un(e) Argonaute</h2>
    <form class="new-member-form" action="challenge.php" method="post">
      <label for="name">Nom de l&apos;Argonaute</label>
      <input id="name" name="name" type="text" placeholder="Charalampos" />
      <button id="add" type="submit">Envoyer</button>
    </form>
    <h2>Membres de l'équipage</h2>
    <section class="member-list">

<?php
// connect

    $server = 'sql.free.fr';
    $login = 'vincent.developpeur';
    $password = 'Motdepasse';
    $nameTable = 'argonautes';

    try{
  $bdd = new PDO("mysql:host = $server; dbname = $nameTable; charset=utf8", $login, $password);
    }
    catch (Exception $e)
    {
      die('Erreur: ' . $e->getMessage());
    }
//************************************************************************************************************************************ */
// insert data in div
// $error = "il faut saisir un nom, s'il vous plaît !";
// if(isset($_POST['name'])){
$req = $bdd -> prepare('INSERT INTO argonautes (name) VALUES(?)');
$req -> execute(array($_POST['name']));
// }else{
//   echo '<div id="er">' . $error . "</div>";
// }
//************************************************************************************************************************************ */
// recuperation data
  $response = $bdd->query('SELECT id, name FROM argonautes ORDER BY id LIMIT 51');
  while($data = $response->fetch())
  {
    // add 0 with number less 10 ex: 01, 02, 03...
    if($data['id']<10){
      $data['id'] = "0". $data['id'];
    }
  echo '<div class="member-item"><div class="member-list-child"><ul><li>' . $data['id'] . " : " . htmlspecialchars($data['name']) . '</li></ul></div></div>';
  }

  $response -> closeCursor();

?>

</section>
</main>
<footer>
    <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC & Vincent Lefebvre</p>
  </footer>
</body>
</html>
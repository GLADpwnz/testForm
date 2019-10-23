<?php

require_once __DIR__.'/../core/config.php';
require_once __DIR__.'/../vendor/autoload.php';

if (isset($_POST['lastName']) ||
  isset($_POST['firstName']) ||
  isset($_POST['middleName']) ||
  isset($_POST['sex']) ||
  isset($_POST['bday']) ||
  isset($_POST['weight']) ||
  isset($_POST['height'])
) {
  $putSql = 'INSERT INTO user_props (lastName, firstName, middleName, sex, bday, weight, height) VALUES (:lastName, :firstName, :middleName, :sex, :bday, :weight, :height)';

  try {
    $sqlData = $conn->prepare($putSql);
    $sqlData->bindParam(':lastName',$_POST['lastName'],PDO::PARAM_STR);
    $sqlData->bindParam(':firstName',$_POST['firstName'],PDO::PARAM_STR);
    $sqlData->bindParam(':middleName',$_POST['middleName'],PDO::PARAM_STR);
    $sqlData->bindParam(':sex',$_POST['sex'],PDO::PARAM_STR);
    $sqlData->bindParam(':bday',$_POST['bday'],PDO::PARAM_STR);
    $sqlData->bindParam(':weight',$_POST['weight'],PDO::PARAM_STR);
    $sqlData->bindParam(':height',$_POST['height'],PDO::PARAM_STR);

    $status = $sqlData->execute();
    if ($status) {
      $lastSql = $conn->query('SELECT * FROM user_props WHERE id= LAST_INSERT_ID()');
      $lastRow = $lastSql->fetchAll(\PDO::FETCH_ASSOC);

      $diffYears = date_diff(new \DateTime(), new \DateTime($lastRow[0]['bday']));
      $lastRow[0]['years'] = $diffYears->y;

      // Specify our Twig templates location
      $loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
      $twig = new Twig_Environment($loader);

      echo $twig->render('userModal.html.twig', ['prop' => $lastRow[0]] );
    }

  } catch(\PDOException $pdo) {
    echo $pdo->getMessage();
  }
} else {
  echo "pls fill all fields";
}
<?php
session_start();

header("Access-Control-Allow-Origin: *");

// require_once '/Model/login.php';
$HOTE = "localhost";	// nom du serveur de données : localhost ou serv-wamp1 ou serv-wamp1
$PORT = '3306';			// numéro du port
$USER = "root";			// nom de l'utilisateur
$PWD  = "root";		// son mot de passe
// nom de la base de données
$BDD  = "Simeon";
//$BDD  = "testCarpeto";

try
{
	$cnx = new PDO('mysql:host='.$HOTE.';port='.$PORT.';dbname='.$BDD,$USER,$PWD);
}
// récupération et affichage d'un message en cas d'erreur de connexion
catch (Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'</br/>';
	echo 'N° : '.$e->getCode();
}


$email = $_POST['email'];
$pswd = $_POST['pswd'];
if ( empty($email) || empty($pswd)) {
  echo 'Failed';
  exit();
} else {
  $req = $cnx->prepare('SELECT * FROM Users WHERE User_email = :User_email');
  $req->bindValue(':User_email', $email, PDO::PARAM_STR);
  $req->execute();
  $resultat=$req->fetch();

  if(password_verify($pswd, $resultat['User_password'])== false)
  {
      echo 'Failed';
      exit();
  }
  else
  {
                $_SESSION['User_id']= $resultat['User_id'];
                $_SESSION['User_icon']= $resultat['User_icon'];
    echo 'Success';
  }
}
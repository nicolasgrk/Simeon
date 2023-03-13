<?php
header("Access-Control-Allow-Origin: http://localhost:5173");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$pswd = $_POST['pswd'];

if (empty($nom) || empty($prenom) || empty($email) || empty($pswd)) {
  echo 'Failed';
  exit();
} else {
  echo 'Success';
}
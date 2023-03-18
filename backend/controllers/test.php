<?php

$password = "SimeonTest123";
$password2 =password_hash($password, PASSWORD_DEFAULT);
echo $password2;
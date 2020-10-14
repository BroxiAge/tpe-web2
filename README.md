#TASKS
javito@javito.com
123456



<?php

$pass = "123456";
$hash = password_hash($pass, PASSWORD_DEFAULT);
echo $hash;
echo "</br>";


//lo que ingresa el usuario
$passwordInput = "12345";
if (password_verify($passwordInput, $hash))
     echo "Credenciales válidas";
else
     echo "Credenciales invalidas";


?>

<?php
// Fontes:

//  https://www.w3schools.com/php/php_mysql_connect.asp
//  https://www.w3schools.com/php/php_mysql_create.asp

extract($_POST);

if (isset($enviar)) {
    include "banco.php";
    $consulta1 = "INSERT INTO `login` (`identificador`, `senha`) VALUES ('" . $matricula . "','" . $senha . "');";;
    $consulta2 = "INSERT INTO `discente` (`matricula`, `nome`, `senha`, `email`, `curso`) VALUES ('" . $matricula . "','" . $nome . "','" . $senha . "','" . $email . "','" . $curso . "');";
    banco($consulta1);
    banco($consulta2);

    header("Location: pagdiscente.html");
    exit;
}
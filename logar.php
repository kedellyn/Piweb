<?php
// Fontes:

//  https://www.w3schools.com/php/php_mysql_connect.asp
//  https://www.w3schools.com/php/php_mysql_create.asp
//  https://www.php.net/manual/en/mysqli-result.fetch-assoc.php
//  https://chat.openai.com/share/cf15bc38-8d28-4f68-a2c0-5b4da97595b8

extract($_POST);

if (isset($butao)) {
    include "banco.php";

    function checksenha($senha, $tipo)
    {
        if ($_POST["senha"] == $senha) {
            if ($tipo == 0) {
                header("Location: pagdiscente.html");
            } else if ($tipo == 1) {
                header("Location: pagcod.html");
            } else if ($tipo == 2) {
                header("Location: pagcoordenador.html");
            }
        } else {
            header("Location: paglogin.html");
        }
        exit;
    }

    $pesquisa1 = "SELECT senha FROM discente WHERE matricula = '" . $matricula . "'";
    $pesquisa2 = "SELECT senha FROM docente WHERE siap = '" . $matricula . "'";
    $pesquisa3 = "SELECT senha FROM coordenador WHERE siap = '" . $matricula . "'";

    $resultado1 = banco($pesquisa1);
    $resultado2 = banco($pesquisa2);
    $resultado3 = banco($pesquisa3);

    $dados1 = mysqli_fetch_assoc($resultado1);
    $dados2 = mysqli_fetch_assoc($resultado2);
    $dados3 = mysqli_fetch_assoc($resultado3);

    if ($dados1 != null) {
        checksenha($dados1["senha"], 0);
    } elseif ($dados2 != null) {
        checksenha($dados2["senha"], 1);
    } elseif ($dados3 != null) {
        checksenha($dados3["senha"], 2);
    } else {
        header("Location: paglogin.html");
    }
}
?>
<?php
    extract($_POST);
    include "banco.php";
    $consulta = "INSERT INTO requerimento (data, requerente, endereco, cidade, telefone, email, curso, requerimento_Matricula, campus, motivos, observacoes)
     VALUES ('$data', '$requerente', '$endereco', '$cidade', '$telefone', '$email', '$curso', '$matricula', '$campus', '$motivos', '$observacoes')";
     banco($consulta);
     header("Location: requerimento.html");

?>
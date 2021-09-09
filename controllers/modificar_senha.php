<?php
require("../model/persistency/db.php");
print_r($_POST);
// recebe e-mail e nova senha
if (isset($_POST['chave']) && $_POST['chave'] != "" && isset($_POST['senha']) && $_POST['senha'] != "" ) {
    $chave = pg_escape_string($_POST['chave']);
    $senha = pg_escape_string($_POST['senha']);
// modifica a senha relacionada ao e-mail
    $sql = "UPDATE usuario SET senha = '$senha' WHERE chave = '$chave';" ;
    $resultado = banco($sql);

    $sql = "UPDATE usuario SET chave = '' WHERE chave = '$chave';" ;
    $resultado = banco($sql);
// redireciona para uma mensagem de sucesso.
header('Location: ../senha_alterada.html');

}
?>
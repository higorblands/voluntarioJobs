<?php 
/* SOLICITANDO ARQUIVO DE CONEXÃO COM O BANCO */
require("persistency/db.php");

if (isset($_POST['nome']) && $_POST['nome'] != "" &&
    isset($_POST['tipoUsuario']) && $_POST['tipoUsuario'] != "" &&
    isset($_POST['email']) && $_POST['email'] != "" &&
    isset($_POST['senha']) && $_POST['senha'] != "" ) {
    
    $nome = pg_escape_string($_POST['nome']);
    $tipoUsuario =pg_escape_string($_POST['tipoUsuario']);
    $email =pg_escape_string($_POST['email']);
    $senha = pg_escape_string($_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE email='$email'";
    $resultado = banco($sql);

    if (pg_num_rows($resultado) == 0) {
        $sql = "INSERT INTO usuario (nome, tipoUsuario, email, senha)";
        $sql .= " VALUES ('$nome','$tipoUsuario' , '$email', '$senha');";
        $resultado = banco($sql);

        header("Location: ../login.php");
    } else {
        header("Location: ../erro_email.html");
    }
} else {
    header("Location: ../erro_formulario.html");
}
?>
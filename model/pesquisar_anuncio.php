<?php
require("persistency/db.php");

if (!isset($_POST['busca']) || $_POST['busca'] == "") {
  // Se não tem busca, retorna todos os anuncios
  $sql = "SELECT * FROM anuncios INNER JOIN usuario ON usuario.codigo = codigo_usuario WHERE data_vencimento > TIMESTAMP 'yesterday' ORDER BY data_insercao DESC";
} else {
  // Se tiver busca, faz a pesquisa
  $sql = "SELECT * FROM anuncios INNER JOIN usuario ON usuario.codigo = codigo_usuario WHERE precisase ILIKE '%" . $_POST["busca"] . "%' AND data_vencimento > TIMESTAMP 'yesterday' ORDER BY data_insercao DESC";
}

$resultado = banco($sql);

$vagas = pg_num_rows($resultado);


?>
<?php 
/* SOLICITANDO ARQUIVO DE CONEXÃO COM O BANCO */
require("model/persistency/db.php");

/* DELETAR TABELA CASO EXISTIR usuario */
banco("DROP TABLE IF EXISTS usuario CASCADE");
/* PRINTAR SE A TABELA FOI APAGADA */
echo "<p>Tabela usuario apagada com sucesso !</p>";
/* CRIAR TABELA E POPULAR COM VALORES */
$sql ="CREATE TABLE usuario(";
$sql .= "codigo SERIAL NOT NULL,";
$sql .= "tipoUsuario VARCHAR(50),";
$sql .= "nome VARCHAR(250),";
$sql .= "email VARCHAR(100),";
$sql .= "senha VARCHAR(150),";
$sql .= "chave VARCHAR(255),";
$sql .= "PRIMARY KEY(codigo)";
$sql .= ");";
/* PASSANDO O PARAMETRO SQL PARA FUNÇÃO BANCO */
banco($sql);
echo "<p>Tabela Usuário criada com sucesso !</p>";


/* DELETAR TABELA CASO EXISTIR anuncios */
banco("DROP TABLE IF EXISTS anuncios");
/* PRINTAR SE A TABELA FOI APAGADA */
echo "<p>Tabela Anuncios apagada com sucesso !</p>";
$sql ="CREATE TABLE anuncios(";
$sql .="codigo SERIAL NOT NULL,";
$sql .="codigo_usuario INTEGER NOT NULL,";
$sql .="precisase VARCHAR(250),";
$sql .="descricao VARCHAR(400),";
$sql .="telefone VARCHAR(100),";
$sql .="email VARCHAR(100),";
$sql .="endereco VARCHAR(255),";
$sql .="site VARCHAR(255),";
$sql .="data_insercao DATE NOT NULL DEFAULT CURRENT_DATE,";
$sql .="data_vencimento DATE NOT NULL,";
$sql .="PRIMARY KEY(codigo), ";
$sql .="FOREIGN KEY (codigo_usuario) REFERENCES usuario (codigo)";
$sql .=");";
/* PASSANDO O PARAMETRO SQL PARA FUNÇÃO BANCO */
banco($sql);
echo "<p>Tabela Anuncios criada com sucesso !</p>";


/* DELETAR TABELA CASO EXISTIR favbusca*/
banco ("DROP TABLE IF EXISTS favbusca");
/* PRINTAR SE A TABELA FOI APAGADA  */
echo "<p>Tabela Busca Favorita(favbusca) apagada com sucesso !</p>";
$sql ="CREATE TABLE favbusca(";
$sql .="email VARCHAR(100),";
$sql .="buscaFavorita VARCHAR(100)";
$sql .=");";
/* PASSANDO O PARAMETRO SQL PARA FUNÇÃO BANCO */
banco($sql);
echo "<p>Tabela Busca Favorita(favbusca) criada com sucesso ! </p>";


?>
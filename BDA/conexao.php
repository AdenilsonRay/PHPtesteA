<?php

//Recuperando dados de acesso a banco
require_once '../../config.php';

try {
  //Realizando conexao
  $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Erro: " . $e->getMessage();
}

<?php
//Recebendo dados do form
$email = filter_input(INPUT_POST,'email',FILTER_DEFAULT);
$senha = filter_input(INPUT_POST,'senha',FILTER_DEFAULT);

//Fazendo conexao com oo banco
require_once('../../BDA/conexao.php');

//Criando e exesultando consulta
$consulta = $conn->prepare("SELECT codigo FROM usuario WHERE email=:email AND senha=MD5(:senha)");
$consulta->bindParam(':email',$email,PDO::PARAM_STR);
$consulta->bindParam(':senha',$senha,PDO::PARAM_STR);
$consulta->execute();

//Passando o resultado da consulta para array
$result = $consulta->fetchAll();

//Se houve resultado
if (count($result)==1) {
    //Redirtecionar para outra tela
    $resultado['msg']='Usuário Localizado...';
    $resultado['cod']=1;
}else{
    //Define dados que geram resposta na tela
    $resultado['msg']='Usuário Não Localizado...';
    $resultado['cod']=0;
}
  
//Fecha conexao com o banco
$conn=NULL;

//Re envia a mesma tela com dados gerados para dar resposta
require_once '../../index.php';




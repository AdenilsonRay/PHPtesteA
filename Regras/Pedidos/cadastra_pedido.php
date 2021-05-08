<?php
//Obtendo informacoes 
$nome_produto=FILTER_INPUT(INPUT_POST,'nome_produto',FILTER_DEFAULT);
$qtd_produto=filter_input(INPUT_POST,'qtd_produto',FILTER_DEFAULT);
$obs_produto=filter_input(INPUT_POST,'obs_produto',FILTER_DEFAULT);
$preco_produto=filter_input(INPUT_POST,'preco_produto',FILTER_DEFAULT);

//Criando conexao com o banco
require_once('../../BDA/conexao.php');

//Preparando sql 
$Consulta = $conn->prepare("insert into item_pedido (nome_produto,quantidade,preco_und,observacao,cod_usuario,data_hora) values (':nome_produto',':quamtidade',':preco_und',':observacao',':cod_usuario',':data_hora')");
$Consulta->bindParam(':nome_produto',$nome_produto,PDO::PARAM_STR);
$Consulta->bindParam(':qtd_produto',$qtd_produto,PDO::PARAM_INT);
$Consulta->bindParam(':obs_produto',$obs_produto,PDO::PARAM_STR);
$Consulta->bindParam(':preco_produto',$preco_produto,PDO::PARAM_INT);

//Executa query
$Consulta->execute();

//Recupera informacao
$resultado=$Consulta->fetchAll();

if (count($resultado)>0) {
    # code...
}else{

}



        










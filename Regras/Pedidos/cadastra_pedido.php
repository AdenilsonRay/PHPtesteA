<?php
//Obtendo informacoes 
$nome_produto=FILTER_INPUT(INPUT_POST,'nome_produto',FILTER_DEFAULT);
$qtd_produto=filter_input(INPUT_POST,'qtd_produto',FILTER_DEFAULT);
$obs_produto=filter_input(INPUT_POST,'obs_produto',FILTER_DEFAULT);
$preco_produto=filter_input(INPUT_POST,'preco_produto',FILTER_DEFAULT);
$cod_usuario=1;

//Criando conexao com o banco
require_once('../../BDA/conexao.php');

//Preparando sql 
$Consulta = $conn->prepare("insert into item_pedido (nome_produto,quantidade,preco_und,observacao,cod_usuario) "
                                          . "values ('$nome_produto','$qtd_produto','$preco_produto','$obs_produto','$cod_usuario')");
//$Consulta->bindParam(':nome_produto',$nome_produto,PDO::PARAM_STR);
//$Consulta->bindParam(':qtd_produto',$qtd_produto,PDO::PARAM_INT);
//$Consulta->bindParam(':preco_produto',$preco_produto,PDO::PARAM_STR); 
//$Consulta->bindParam(':obs_produto',$obs_produto,PDO::PARAM_STR);


try {
    //Executa query
    $Consulta->execute();

    $resultado['cod']=1;
    $resultado['msg']='Item inserido com sucesso!';
    $resultado['style']="alert-success";
    
} catch (\Throwable $th) {
    $resultado['cod']=0;
    $resultado['msg']= $th->getMessage().'Item não inserido com sucesso!';
    $resultado['style']="alert-danger";
}

require_once '../../index.php';



        










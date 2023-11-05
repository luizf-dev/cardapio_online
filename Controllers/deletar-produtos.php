<?php

//*Namespaces
use application\DB\Sql;
use application\Models\Produtos;
use application\Mensagens;

//* ====== Rota para deletar produtos ============**/
$app->get('/deletar-produto/:id/', function($id){

    //*conexao com a base de dados
    $connect = Sql::getDatabase();

    //* Instancia o objeto de modelo de produtos
    $produto = new Produtos($connect);

    //*verifica se o produto foi excluido com sucesso
    if($produto->deletarProduto($id)){

        Mensagens::getMsgSucesso('Produto excluído com sucesso!');
        header('Location: /cardapio_online/listar-produtos');
        exit;
    }else{
        Mensagens::setMsgSucesso('Não foi possível deletar este produto! Tente novamente!');
        header('Location:  /cardapio_online/listar-produtos ');
        exit;
    }

});
<?php

//*Namespaces
use application\DB\Sql;
use application\Models\Produtos;
use application\Page; 
use application\Mensagens;



//* ====== Rota listar todos os produtos ======**/
$app->get('/listar-produtos', function(){

    //*conexao com a base de dados
    $connect = Sql::getDatabase();

    //* instancia de um novo objeto Produtos, passando a conexao com o banco de dados
    $produto = new Produtos($connect);
    $produtos = $produto->listarProdutos();
    
    //* Renderiza o template passando a lista de produtos
    $page = new Page();
    $page->renderPage("listar-produtos", [
        "produtos" => $produtos,
        "msgSucesso" => Mensagens::getMsgSucesso(),
        "msgErro" => Mensagens::getMsgErro()
    ]);


});
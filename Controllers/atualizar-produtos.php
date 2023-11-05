<?php

//*Namespaces
use application\DB\Sql;
use application\Models\Produtos;
use application\Page; 
use application\Mensagens;


//* ====== Rota para página de atualização de produtos ============**/
$app->get('/atualizar-produto/:id/', function($id){

    //*conexao com a base de dados
    $connect = Sql::getDatabase();

    //* Instancia de um novo objeto Produtos, passando a conexao com o banco de dados
    $produto = new Produtos($connect);
    $detalhesProduto = $produto->detalhesProduto($id);

    //* Renderiza o template passando a lista de produtos
    $page = new Page();
    $page->renderPage("atualizar-produto", [
        "produtos" => $detalhesProduto,
        "msgErro" => Mensagens::getMsgErro()
    ]);

});

//* ====== Rota via post para atualizar os produtos no banco ======**/
$app->post('/atualizar-produto/:id/', function($id){

   
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];

    //*conexao com a base de dados
    $connect = Sql::getDatabase();
    $produto = new Produtos($connect);

    if($produto->atualizarProduto($id, $nome, $preco, $imagem, $descricao, $categoria)){
        Mensagens::setMsgSucesso('Produto atualizado com sucesso!');
        header('Location: /cardapio_online/listar-produtos');
        exit;
    }else{
        //* Exibe a mensagem de erro
        Mensagens::setMsgErro('Não foi possível atualizar o produto!');
        header('Location: /cardapio_online/listar-produtos');
        exit();
    }    
    
});


<?php

//*Namespaces
use application\DB\Sql;
use application\Models\Produtos;
use application\Page; 
use application\Mensagens;


//* ====== Rota para página de cadastro de produtos ============**/
$app->get('/cadastrar-produto', function(){

    $page = new Page();
    $page->renderPage("cadastrar-produto",[
        "msgErro" => Mensagens::getMsgErro()
    ]);

});

//* ====== Rota via post para inserir os produtos no banco======**/
$app->post('/cadastrar-produto/', function(){

    $imagem = 'imagem-padrao.jpeg';

    //*conexao com a base de dados
    $connect = Sql::getDatabase();

    $produto = new Produtos($connect);
    $produto->__set('nome', $_POST['nome']);
    $produto->__set('preco', $_POST['preco']);
    $produto->__set('imagem', $imagem);
    $produto->__set('descricao', $_POST['descricao']);
    $produto->__set('categoria', $_POST['categoria']);

    if($_POST == 'nome' || $_POST['preco'] == '' || $_POST['descricao'] == '' || $_POST['categoria'] == ''){
        Mensagens::setMsgErro('Preencha os campos corretamente!');
        header('Location: /cardapio_online/cadastrar-produto');
        exit;
    }


   if($produto->cadastrarProduto()){

    Mensagens::setMsgSucesso('Produto cadastrado com sucesso!');
    header('Location: /cardapio_online/listar-produtos');
    exit;

   }else{

    Mensagens::setMsgErro('Não foi possível cadastrar o produto! Tente novamente!');
    header('Location: /cardapio_online');
   }   
});


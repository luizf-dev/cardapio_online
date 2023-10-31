<?php

//*Carregamento automatico das classes
require_once("./vendor/autoload.php");

//*Namespaces
use Slim\Slim;
use application\DB\Sql;
use application\Models\Produtos;
use application\Page;

require 'funcoes.php';

$app = new Slim();

$app->config('debug', true);

//* ====== Rota Index ================**/
$app->get('/', function(){

    //*conexao com a base de dados
    $connect = Sql::getDatabase();

    //* instancia de um novo objeto Produtos, passando a conexao com o banco de dados
    $produto = new Produtos($connect);
    $produtos = $produto->listarProdutos();    

    //* Renderiza o template passando a lista de produtos
    $page = new Page();
    $page->renderPage("index", [
        "produtos" => $produtos
    ]);

});

//* ====== Rota listar produtos ======**/
$app->get('/listar-produtos', function(){

    //*conexao com a base de dados
    $connect = Sql::getDatabase();

    //* instancia de um novo objeto Produtos, passando a conexao com o banco de dados
    $produto = new Produtos($connect);
    $produtos = $produto->listarProdutos();

    if($produtos == 0){
         echo 'Nenhum produto cadastrado!';
    }else{
    //* Renderiza o template passando a lista de produtos
    $page = new Page();
    $page->renderPage("listar-produtos", [
        "produtos" => $produtos
    ]);
    
    }
    //* Renderiza o template passando a lista de produtos
    $page = new Page();
    $page->renderPage("listar-produtos", [
        "produtos" => $produtos
    ]);

});

//* ====== Rota para página de cadastro de produtos ============**/
$app->get('/cadastrar-produto', function(){

    $page = new Page([]);
    $page->renderPage("cadastrar-produto");

});

//* ====== Rota via post para inserir os produtos no banco======**/
$app->post('/cadastrar-produto', function(){

    //*conexao com a base de dados
    $connect = Sql::getDatabase();

    $produto = new Produtos($connect);
    $produto->__set('nome', $_POST['nome']);
    $produto->__set('preco', $_POST['preco']);
    $produto->__set('imagem', $_POST['imagem']);
    $produto->__set('descricao', $_POST['descricao']);
    $produto->__set('categoria', $_POST['categoria']);


   if($produto->cadastrarProduto()){

    header('Location: /cardapio_online/listar-produtos');
    exit;

   }else{
    header('Location: /cardapio_online');
   }   
});


$app->run();
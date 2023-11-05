<?php 

//*Namespaces
use application\DB\Sql;
use application\Models\Produtos;
use application\Page;


//* ====== Rota Index ================**/
$app->get('/', function(){

    //*conexao com a base de dados
    $connect = Sql::getDatabase();

    //* instancia de um novo objeto Produtos, passando a conexao com o banco de dados
    $produto = new Produtos($connect);
    $lanches = $produto->listarLanches();
    $massas = $produto->listarMassas();
    $sobremesas = $produto->listarSobremesas();
    $bebidas = $produto->listarBebidas();
    
      

    //* Renderiza o template passando a lista de produtos
    $page = new Page();
    $page->renderPage("index", [
        "lanches" => $lanches,
        "massas" => $massas,
        "sobremesas" => $sobremesas,
        "bebidas" => $bebidas
    ]);

});

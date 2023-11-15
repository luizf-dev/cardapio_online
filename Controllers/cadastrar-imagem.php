<?php

//*Namespaces
use application\DB\Sql;
use application\Models\Produtos;
use application\Page; 
use application\Mensagens;

//* ====== Rota para página de cadastro de imagem do produto ============**/
$app->get('/cadastrar-imagem/:id/new/', function($id){

    //*conexao com a base de dados
    $connect = Sql::getDatabase();

    //* Instancia de um novo objeto Produtos, passando a conexao com o banco de dados
    $produto = new Produtos($connect);
    $detalhesProduto = $produto->detalhesProduto($id);

    $page = new Page();
    $page->renderPage('cadastrar-imagem', [
        "produtos"=> $detalhesProduto,
        "msgErro" => Mensagens::getMsgErro()
    ]);

});

//* ====== Rota via post para  cadastro de imagem do produto ============**/
$app->post('/cadastrar-imagem/:id/new/', function($id){

    $imagem = $_FILES['imagem'];
    $id = $_POST['id'];

    //*obtem a data atual para gerar um código e renomear a imagem
    $codigoImagem = date('YmdHis');

    //*obtem a extensao do arquivo
    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

    $novoNomeImagem = $codigoImagem . '.' .$extensao;

    

    //* caminho completo para a pasta de uploads
    $pasta = './assets/img/uploads/'.$novoNomeImagem;

    //var_dump($novoNomeImagem);
    //exit;

    //* Mover a imagem para a pasta de uploads
     move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta );

   

    /*//* Retornar o nome do arquivo para ser utilizado no banco de dados
    return $novoNomeImagem;   */

    //*conexao com a base de dados
    $connect = Sql::getDatabase();
    $produto = new Produtos($connect);

    if($produto->cadastrarImagem($id, $novoNomeImagem)){

        Mensagens::setMsgSucesso('A imagem foi cadastrada com sucesso!');
        header('Location: /cardapio_online/listar-produtos');
        exit;
    }else{

        Mensagens::setMsgErro('Erro ao cadastrar a imagem!');
        header('Location: /cardapio_online/listar-produtos');
        exit;
    }  


});

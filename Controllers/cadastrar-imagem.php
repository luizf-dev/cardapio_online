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
    //  $id = $_POST['id'];

    //*conexao com a base de dados
    $connect = Sql::getDatabase();
    $produto = new Produtos($connect);

    //*obtem a extensao do arquivo
    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);    

    //*adiciona uma data de cadastro para a imagem
    $data = date('dmYHis');

    //*verifica se a extensão da imagem é válida(jpeg, jpg, png);
    $extensoesPermitidas = array('jpeg', 'jpg', 'png');
    if(!in_array(strtolower($extensao), $extensoesPermitidas)){
        
        Mensagens::setMsgErro('Apenas arquivos JPEG, JPG e PNG são permitidos!');
        header('Location: /cardapio_online/listar-produtos');
        exit;
    }

    //*renomeia a imagem com o id do produto correspondente
    $novoNomeImagem = 'imagemProduto'.$id.'-'.$data.'.'.$extensao;    

    //* caminho completo com o novo nome do arquivo
    $urlArquivo = './assets/img/uploads/'.$novoNomeImagem;

   //*caminho da pasta uploads
   $urlPastaUploads = './assets/img/uploads/';

    //*consulta o banco de dados para ver se já existe uma imagem com o id do produto
    $imagemAnterior = $produto->obterNomeImagem($id);

    //*quebra a string do nome da imagem anterior usando o hifen '-' como delimitador
    $stringImagemAnterior = explode('-', $imagemAnterior);

    //*obtem apenas o nome do arquivo anterior sem a extensão
    $nomeImagemAnterior = implode('-', array_slice($stringImagemAnterior, 0, -1));

    //*quebra a string do nome da imagem atual usando o hifen '-' como delimitador
    $stringImagemAtual = explode('-', $novoNomeImagem);
    
    //*obtem apenas o nome do arquivo atual sem a extensão
    $nomeImagemAtual = implode('-', array_slice($stringImagemAtual, 0, -1));


    //*compara os nomes do qrquivos exclui a imagem anterior se existir para
    //*evitar encher a pasta de uploads
    if($nomeImagemAnterior == $nomeImagemAtual){

        unlink($urlPastaUploads.$imagemAnterior);
    }       

    //* Move a nova imagem para a pasta de uploads
    $movidoComSucesso =  move_uploaded_file($_FILES['imagem']['tmp_name'], $urlArquivo );   

    if(!$movidoComSucesso){
        Mensagens::setMsgErro('Erro ao mover a imagem!');
    }
    
    //*cadastra a string com o nome da imagem no banco de dados
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

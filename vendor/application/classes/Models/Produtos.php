<?php

namespace application\Models;

use application\DB\Connection;
use PDO;
use PDOException;

class  Produtos extends Connection{

    private  $id;
    private  $nome;
    private  $preco;
    private  $imagem;
    private  $descricao;
    private  $categoria;


    //*getters & setters
    public function __get($atributo){

        return $this->$atributo;

    }

    public function __set($atributo, $valor){

        $this->$atributo = $valor;
    }
  

    //* método listar produtos
    public function listarProdutos(){

        $query = "select * from tb_produtos where categoria = 'Lanche'";
        $stmt = $this->database->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{

            return false;
        }

        return $produtos;
    } 
    
    public function cadastrarProduto(){
        try {
            $query = "INSERT INTO tb_produtos (nome, preco, imagem, descricao, categoria) VALUES (:nome, :preco, :imagem, :descricao, :categoria)";
    
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':nome', $this->__get('nome'));
            $stmt->bindValue(':preco', $this->__get('preco'));
            $stmt->bindValue(':imagem', $this->__get('imagem'));
            $stmt->bindValue(':descricao', $this->__get('descricao'));
            $stmt->bindValue(':categoria', $this->__get('categoria'));
    
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Erro no banco de dados: " . $e->getMessage();
        }
    }    
    
}
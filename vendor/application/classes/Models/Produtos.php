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


    //* getters mágicos
    public function __get($atributo){

        return $this->$atributo;

    }

    //* setters mágicos
    public function __set($atributo, $valor){

        $this->$atributo = $valor;
    }

    //* método listar todos os Produtos
    public function listarProdutos(){

        $query = "select * from tb_produtos";
        $stmt = $this->database->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{

            return false;
        }

        return $produtos;
    } 
  

    //* método listar Lanches
    public function listarLanches(){

        $query = "select * from tb_produtos where categoria = 'lanches'";
        $stmt = $this->database->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{

            return false;
        }

        return $produtos;
    } 

     //* método listar Massas
     public function listarMassas(){

        $query = "select * from tb_produtos where categoria = 'massas'";
        $stmt = $this->database->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{

            return false;
        }

        return $produtos;
    } 

    //*método listar Sobremesas
    public function listarSobremesas(){

        $query = "select * from tb_produtos where categoria = 'sobremesas'";
        $stmt = $this->database->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;
        }
        
        return $produtos;

    }

    //*método listar Bebidas
    public function listarBebidas(){

        $query = "select * from tb_produtos where categoria = 'bebidas'";
        $stmt = $this->database->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }else{

            return false;
        }
        
        return $produtos;

    }    

    //*método para cadastrar um novo produto
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
    
    //* método que traz os detalhes dos produtos com base em seu id
    public function detalhesProduto($id) {

        $query = "SELECT id, nome, preco, imagem, descricao, categoria FROM tb_produtos WHERE id = :id";
        $stmt = $this->database->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        return null;
        //* Retornar null em caso de erro ou nenhum resultado encontrado
    }

    //*método para atualizar produtos
    public function atualizarProduto($id, $nome, $preco, $imagem, $descricao, $categoria){

        try {
            $query = "UPDATE tb_produtos SET nome = :nome, preco = :preco , imagem = :imagem, descricao = :descricao, categoria = :categoria WHERE id = :id";
    
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':preco', $preco);
            $stmt->bindValue(':imagem', $imagem);
            $stmt->bindValue(':descricao', $descricao);
            $stmt->bindValue(':categoria', $categoria);
            $stmt->execute();
    
            $result = $stmt->rowCount();
            if($result == 0){
                return false;
            }
            return true;

        } catch (PDOException $e) {
            return "Erro no banco de dados: " . $e->getMessage();
        }


    }

    //* método para deletar produtos
    public function deletarProduto($id){
        try {
            $query = 'DELETE FROM tb_produtos WHERE id = :id';
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result == 0){
                return false;
            }
            return true;

        } catch (PDOException $e) {
            return "Erro no banco de dados: " . $e->getMessage();
        }
    }

    //* método cadastrar uma imagem para o produto
    public function cadastrarImagem($id, $imagem){

        $query = 'UPDATE tb_produtos SET imagem = :imagem WHERE id = :id';
        $stmt = $this->database->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':imagem', $imagem);
        $stmt->execute();

        $result = $stmt->rowCount();

        if($result == 0){
            return false;
        }

        return true;
    }
    
}
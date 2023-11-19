<?php 

//*método para formatar o preço do produto
    function formatarPreco($preco){

        if(!$preco > 0) $preco = 0;
    
        return "R$ " .number_format($preco, 2 , ",", ".");
    
    }
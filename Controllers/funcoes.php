<?php 

//*método para formatar o preço do produto
    function formatarPreco($vlprice){

        if(!$vlprice > 0) $vlprice = 0;
    
        return "R$ " .number_format($vlprice, 2 , ",", ".");
    
    }
<?php

namespace application;

class Mensagens{

    const SUCESSO  = 'msgSucesso';
    const ERRO = 'msgErro';
    const INFO = 'msgInfo';

    //? ----------------------Mensagens de sucesso ao usuário(inicio)---------------------------//

    //* pega a mensagem de sucesso que foi passada no método setMsgSucesso
    public static function getMsgSucesso(){
        
        $msg =  (isset($_SESSION[Mensagens::SUCESSO]) && $_SESSION[Mensagens::SUCESSO]) ? $_SESSION[Mensagens::SUCESSO] : "";           

        Mensagens::clearMsgSucesso();
        return $msg;
    }

    //* Recebe a mensagem de sucesso passada no controller
    public static function setMsgSucesso($msg){

        $_SESSION[Mensagens::SUCESSO] = $msg;
    }

    //* limpa a sessão da mensagem
    public static function clearMsgSucesso(){

        $_SESSION[Mensagens::SUCESSO] = NULL;
    }
    //? ----------------------Mensagens de sucesso ao usuário(fim) ---------------------------//


    
    //? ----------------------Mensagens de erro ao usuário(inicio)---------------------------//

        //* pega a mensagem de erro que foi passada no método setMsgSucesso
        public static function getMsgErro(){
            
            $msg =  (isset($_SESSION[Mensagens::ERRO]) && $_SESSION[Mensagens::ERRO]) ? $_SESSION[Mensagens::ERRO] : "";           

            Mensagens::clearMsgErro();
            return $msg;
        }

        //* Recebe a mensagem de erro passada no controller
        public static function setMsgErro($msg){

            $_SESSION[Mensagens::ERRO] = $msg;
        }
        

        //* limpa a sessão da mensagem
        public static function clearMsgErro(){

            $_SESSION[Mensagens::ERRO] = NULL;
        }
        //? ----------------------Mensagens de erro ao usuário(fim) ---------------------------//

        //? ----------------------Mensagens de informação ao usuário(inicio)---------------------------//

        //* pega a mensagem de info que foi passada no método setMsgInfo
        public static function MsgInfo($msg){
            
            $msg =  (isset($_SESSION[Mensagens::INFO]) && $_SESSION[Mensagens::INFO]) ? $_SESSION[Mensagens::INFO] : "";           

            
            return $msg;
        }

        
        //? ----------------------Mensagens de informação ao usuário(fim) ---------------------------//

}
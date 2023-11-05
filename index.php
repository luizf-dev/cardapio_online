<?php

session_start();

//*Carregamento automatico das classes
require_once("./vendor/autoload.php");

//*Namespaces
use Slim\Slim;

$app = new Slim();

$app->config('debug', true);

require './Controllers/funcoes.php';
require './Controllers/home.php';
require './Controllers/cadastrar-produtos.php';
require './Controllers/listar-produtos.php';
require './Controllers/atualizar-produtos.php';
require './Controllers/deletar-produtos.php';

$app->run();
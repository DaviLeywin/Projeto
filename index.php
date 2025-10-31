<?php
require_once "class.Rotas.php";

$rotas = new Rotas();

$rotas->get("/","LoginController@LoginView",0);//essa rota que carrega a tela de login ao entrar no site
$rotas->post("/verificar/{cpf}/{senha}","LoginController@VerificarLogin",0);//essa aqui manda os parametros do login para veriificar
$rotas->get("/inicio","InicioController@InicioView",1);//essa rota carrega a tela inicial apos o login
$rotas->executar();
?>
<?php
require_once "config/class.Banco.php";

class LoginDAO{ 
    public static function getFuncionarios($usuario, $senha){
        if($usuario == "05536815083" && $senha === "123456789"){
            header("Location: /backend.Napne.com/inicio");
            exit;
        }
        return ["Erro" => True, "Mensagem" => "CPF ou Senha inválida!"];
    } 

}


?>
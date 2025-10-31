<?php
session_start();
require_once "dao/class.LoginDAO.php";

class LoginController {

    static function LoginView(){
        include "views/login.php";
    }
    static function VerificarLogin($cpf, $senha){ 

        if($cpf == "VAZIO" || $senha == "VAZIO"){
            $_SESSION['ErrGeral'] = "Todos os campos são obrigatórios!";
            header("Location: /backend.Napne.com/");
            exit;
        } 

        $CpfValidado = self::validarCPF($cpf);
        $SenhaValidada = self::validarSenha($senha);

        if($CpfValidado['Erro'] || $SenhaValidada['Erro']) {
            $_SESSION['ErrCpf'] = $CpfValidado['Mensagem'];
            $_SESSION['ErrSenha'] = $SenhaValidada['Mensagem'];
            header("Location: /backend.Napne.com/");
            exit;
        }
        else{
            $dao = new LoginDAO();
            $resposta = $dao::getFuncionarios($cpf, $senha);
            if ($resposta['Erro']) {
                $_SESSION['ErrGeral'] = $resposta['Mensagem'];
                header("Location: /backend.Napne.com/");
                exit;
            }  
        }
        
    }
    static function validarCPF($cpf){
        $cpf = preg_replace('/\D/', '', $cpf);
        if(preg_replace('/\D/', '', $cpf) === ''){
            return ["Erro" => true, "Mensagem" => "CPF inválido!"];
        }
        if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
            return ["Erro" => true, "Mensagem" => "CPF inválido!"];
        }

        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($i = 0; $i < $t; $i++) {
                $soma += $cpf[$i] * (($t + 1) - $i);
            }

            $d = ($soma * 10) % 11;
            $d = ($d == 10) ? 0 : $d;

            if ($cpf[$t] != $d) {
                return ["Erro" => true, "Mensagem" => "CPF inválido!"];
            }
        }

        return ["Erro" => false, "CPF" => $cpf , "Mensagem" => ""];
    }

    static function validarSenha($senha) {
        if(empty($senha)){
            return ["Erro" => True,
                    "Mensagem" => "Senha vazia!"];
        }
        else if(strlen($senha) < 8 || strlen($senha) > 200){
            return ["Erro" => True,
                    "Mensagem" => "A senha deve ter entre 8 e 200 caracteres"];
            }
        else {
            return ["Erro" => False,
                    "Senha" => $senha,
                    "Mensagem" => ""
                ];
        }
    }
}

?>
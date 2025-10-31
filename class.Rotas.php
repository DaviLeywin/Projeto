<?php
//tendi
class Rotas {
    private $rotas;
    function __construct(){$this->rotas = [];}

    function get($url, $acao){ $this->add('GET', $url, $acao); }
    function post($url, $acao) { $this->add('POST', $url, $acao); }
    function put($url, $acao) { $this->add('PUT', $url, $acao); }
    function delete($url, $acao) {$this->add('DELETE', $url, $acao); }

    private function add($metodo, $url, $acao) {$this->rotas[] = compact('metodo', 'url', 'acao');}

    function executar(){
        $metodo = $_SERVER['REQUEST_METHOD'];//metodo do formulario
        $urlBase = '/backend.Napne.com'; //ajuste conforme a pasta do projeto // OBS_BACKEND_ROTAS001: Por conta da urlBase ser estática, o repositório precisa ser clonado sempre no mesmo caminho de arquivo.
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_ireplace($urlBase,'',$uri);//tira a url base da uri e query string se nessesario
        $valor = $metodo === 'GET' ? $_GET : $_POST;//pega os parametros conforme o metodo(put e delete nao tem parametros ent nao faz diferença)
        $uri .= !empty($valor) ? '/'. implode('/', array_map(fn($v) => ($v == "" || trim($v) == "" )? "VAZIO":$v , $valor)):''; //transforma os parametros em url dinamica e coloca VAZIO se o parametro for vazio para a validação de dados
        foreach($this->rotas as $rota){
            if($rota['metodo'] != $metodo) continue;
            $regex = "#^".preg_replace('/\{[^\}]+\}/', '([^/]+)', $rota['url'])."$#";
            if(preg_match($regex, $uri, $parametros) || ($rota['url'] ==  $uri )){
                array_shift($parametros);
                [$controller, $acao] = explode('@', $rota['acao']);
                require_once "controllers/class.$controller.php";
                $objeto = new $controller();
                call_user_func_array([$objeto, $acao], $parametros);
                exit;
            }
        }
        http_response_code(404);
        echo "Rota não encontrada!";
    }
}

?>
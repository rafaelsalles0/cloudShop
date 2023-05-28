<?php
    include_once("config.php"); 

    require_once ROOT.'model/conexaoModel.php';
    require_once ROOT.'model/sessaoModel.php';
    require_once ROOT.'model/clienteModel.php';

    class clienteController {
        private $cliente;
        private $conexao;
        private $sessao;

        public function __construct(){
            $this->conexao = new Conexao();
            $this->conexao->conectar();
        }

        public function view($result){
            header("location: ../view/login.php?cadastro=".$result);
        }
        public function viewAlterar(){
            $query = $this->conexao->query($this->cliente->select("all"));
            $data = mysqli_fetch_assoc($query);

            $this->cliente->preencher($data);

            if($this->cliente->getPessoa() == "fisica"){
                $this->cliente->setRadioPessoa("checked", "");
            }else{
                $this->cliente->setRadioPessoa("", "checked");
            }

            include (ROOT.'view/alterar_usuario.php');
        }

        public function viewDeletar($result){
            header("location: ../view/login.php?deletar=".$result);
        }

        public function cadastrarCliente() {
            $this->criarCliente();
            
            if($this->conexao->query($this->cliente->insert())){
                $this->view("sucesso");
            }
        }

        public function alterarCliente() {
            $this->criarCliente();
            
            $this->sessao = new Sessao();
            $this->sessao->sessao($this->cliente);
            
            if($this->conexao->query($this->sessao->getCliente()->update())){
                $this->viewAlterar("sucesso");
            }
        }

        public function deletarCliente() {
            $this->criarCliente();
            
            $this->sessao = new Sessao();
            $this->sessao->sessao($this->cliente);

            if($this->conexao->query($this->sessao->getCliente()->delete())){
                $this->viewDeletar("sucesso");
            }
        }

        public function login(){
            $this->cliente = new Cliente($_POST["email"], $_POST["senha"]);

            $this->sessao = new Sessao();

            $query = $this->conexao->query($this->cliente->select("login"));
            $data = mysqli_fetch_assoc($query);

            if(($data["email"] == $this->cliente->getEmail()) && ($data["senha"] == $this->cliente->getSenha())){
                $this->sessao->login($this->cliente, $data["id"]);
                $this->viewAlterar();
            }else{
                $this->sessao->logout();
                header('location: ../view/login.php');
            }
        }

        public function sessao($cliente){
            $this->sessao = new Sessao($cliente);
        }

        public function criarCliente(){
            $this->cliente = new Cliente(
                $_POST["email"], 
                $_POST["senha"], 
                $_POST["nome"], 
                $_POST["pessoa"], 
                $_POST["cpf"], 
                $_POST["cnpj"], 
                $_POST["nascimento"], 
                $_POST["telefone"],
                $_POST["endereco"],
                $_POST["cep"],
                $_POST["cartao"],
                $_POST["titular"],
                $_POST["codigo"],
                $_POST["vencimento"]
            );
        }
    }

    $clienteController = new clienteController();

    if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];

        if($tipo == "cadastrar"){
            $clienteController -> cadastrarCliente();
        }else if($tipo == "login"){
            $clienteController -> login();
        }else if($tipo == "alterar"){
            $clienteController -> alterarCliente();
        }else if($tipo == "deletar"){
            $clienteController -> deletarCliente();
        }else{
            //$clienteController -> sessao();
        }
    }
    
?>
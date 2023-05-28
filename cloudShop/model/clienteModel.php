<?php
    class Cliente{
        private $id;
        private $email;
        private $senha;
        private $nome;
        private $pessoa;
        private $cpf;
        private $cnpj;
        private $nascimento;
        private $telefone;
        private $endereco;
        private $cep;
        private $cartao;
        private $titular;
        private $codigo;
        private $vencimento;
        private $radioPessoa;

        public function __construct(){
            $parameters = func_get_args();

            if(func_num_args() > 3){
                $this->email = $parameters[0];
                $this->senha = $parameters[1];
                $this->nome = $parameters[2];
                $this->pessoa = $parameters[3];
                $this->cpf = $parameters[4];
                $this->cnpj = $parameters[5];
                $this->nascimento = $parameters[6];
                $this->telefone = $parameters[7];
                $this->endereco = $parameters[8];
                $this->cep = $parameters[9];
                $this->cartao = $parameters[10];
                $this->titular = $parameters[11];
                $this->codigo = $parameters[12];
                $this->vencimento = $parameters[13];
            }else if(func_num_args() == 2){
                $this->email = $parameters[0];
                $this->senha = $parameters[1];
            }else if(func_num_args() == 3){
                $this->id = $parameters[0];
                $this->email = $parameters[1];
                $this->senha = $parameters[2];
            }
        }

        // Setter e Getter para o atributo $id
        public function setId($id) {
            $this->id = $id;
        }
    
        public function getId() {
            return $this->id;
        }

        // Setter e Getter para o atributo $email
        public function setEmail($email) {
            $this->email = $email;
        }
    
        public function getEmail() {
            return $this->email;
        }
    
        // Setter e Getter para o atributo $senha
        public function setSenha($senha) {
            $this->senha = $senha;
        }
    
        public function getSenha() {
            return $this->senha;
        }

        // Setter e Getter para o atributo $nome
        public function setNome($nome) {
            $this->nome = $nome;
        }
    
        public function getNome() {
            return $this->nome;
        }

        // Setter e Getter para o atributo $pessoa
        public function setPessoa($pessoa) {
            $this->pessoa = $pessoa;
        }
    
        public function getPessoa() {
            return $this->pessoa;
        }
    
        // Setter e Getter para o atributo $cpf
        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }
    
        public function getCpf() {
            return $this->cpf;
        }
    
        // Setter e Getter para o atributo $cnpj
        public function setCnpj($cnpj) {
            $this->cnpj = $cnpj;
        }
    
        public function getCnpj() {
            return $this->cnpj;
        }

        // Setter e Getter para o atributo $nascimento
        public function setNascimento($nascimento) {
            $this->nascimento = $nascimento;
        }
    
        public function getNascimento() {
            return $this->nascimento;
        }
    
        // Setter e Getter para o atributo $telefone
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
    
        public function getTelefone() {
            return $this->telefone;
        }
    
        // Setter e Getter para o atributo $endereco
        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }
    
        public function getEndereco() {
            return $this->endereco;
        }
    
        // Setter e Getter para o atributo $cep
        public function setCep($cep) {
            $this->cep = $cep;
        }
    
        public function getCep() {
            return $this->cep;
        }
    
        // Setter e Getter para o atributo $cartao
        public function setCartao($cartao) {
            $this->cartao = $cartao;
        }
    
        public function getCartao() {
            return $this->cartao;
        }
    
        // Setter e Getter para o atributo $titular
        public function setTitular($titular) {
            $this->titular = $titular;
        }
    
        public function getTitular() {
            return $this->titular;
        }
    
        // Setter e Getter para o atributo $codigo
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
    
        public function getCodigo() {
            return $this->codigo;
        }
    
        // Setter e Getter para o atributo $vencimento
        public function setVencimento($vencimento) {
            $this->vencimento = $vencimento;
        }
    
        public function getVencimento() {
            return $this->vencimento;
        }

        // Setter e Getter para o atributo $radioPessoa
        public function setRadioPessoa($fisica, $juridica) {
            $this->radioPessoa = array(
                $fisica,
                $juridica
            );
        }
        public function getRadioPessoa($pos) {
            return $this->radioPessoa[$pos];
        }

        public function insert(){
            $insert = "INSERT INTO clientes (email, senha, nome, pessoa, cpf, cnpj, nascimento, telefone, endereco, cep, cartao, titular, codigo, vencimento) VALUES 
                ('".
                    $this->getEmail()."', '".
                    $this->getSenha()."', '".
                    $this->getNome()."', '".
                    $this->getPessoa()."', '".
                    $this->getCpf()."', '".
                    $this->getCnpj()."', '".
                    $this->getNascimento()."', '".
                    $this->getTelefone()."', '".
                    $this->getEndereco()."', '".
                    $this->getCep()."', '".
                    $this->getCartao()."', '".
                    $this->getTitular()."', '".
                    $this->getCodigo()."', '".
                    $this->getVencimento().
                "');";
                
            return $insert;
        }

        public function update(){
            $update = "UPDATE clientes SET email = '".$this->getEmail()."', senha = '".$this->getSenha()."', nome = '".$this->getNome()."', pessoa = '".$this->getPessoa()."', cpf = '".$this->getCpf()."', cnpj = '".$this->getCnpj()."', nascimento = '".$this->getNascimento()."', telefone = '".$this->getTelefone()."', endereco = '".$this->getEndereco()."', cep = '".$this->getCep()."', cartao = '".$this->getCartao()."', titular = '".$this->getTitular()."', codigo = '".$this->getCodigo()."', vencimento = '".$this->getVencimento()."' WHERE id = '".$this->getId()."'";
                
            return $update;
        }

        public function delete(){
            $delete = "DELETE FROM clientes WHERE id = '".$this->getId()."'";

            return $delete;
        }

        public function select($tipo){
            if($tipo == "login"){
                $select = "SELECT * FROM clientes WHERE email = '".$this->email."' && senha = '".$this->senha."'";

                return $select;
            }else if($tipo == "all"){
                $select = "SELECT * FROM clientes WHERE id = ".$this->id;

                return $select;
            }
        }

        public function preencher($data){
            $this->setNome($data["nome"]);
            $this->setPessoa($data["pessoa"]);
            $this->setCpf($data["cpf"]);
            $this->setCnpj($data["cnpj"]);
            $this->setNascimento($data["nascimento"]);
            $this->setTelefone($data["telefone"]);
            $this->setEndereco($data["endereco"]);
            $this->setCep($data["cep"]);
            $this->setCartao($data["cartao"]);
            $this->setTitular($data["titular"]);
            $this->setCodigo($data["codigo"]);
            $this->setVencimento($data["vencimento"]);
        }
    }
?>
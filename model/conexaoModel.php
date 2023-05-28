<?php
    class Conexao{
        private $host;
        private $user;
        private $base;
        private $pass;
        private $conexao;

        public function __construct(){
            /*$this->host = "localhost";
            $this->user = "id20800988_admin";
            $this->base = "id20800988_cloudshop";
            $this->pass = "123deOliveira4*";*/

            $this->host = "localhost";
            $this->user = "root";
            $this->base = "cloudShop";
            $this->pass = "123deOliveira4*";

            /*$cliente = new Cliente(
                "TCHAU", 
                "TCHAU", 
                "TCHAU", 
                "TCHAU", 
                "TCHAU", 
                "TCHAU", 
                "2022-05-06", 
                "TCHAU",
                "TCHAU",
                "TCHAU",
                "TCHAU",
                "TCHAU",
                123,
                "2022-05-06",
            );*/
            
            //$this->conectar();
            //$this->query($this->inserirCliente($cliente));
        }

        public function conectar(){
            $this->conexao = mysqli_connect($this->host, $this->user, $this->pass, $this->base) or die ("Sem conexão com o servidor");
            $this->conexao -> set_charset("utf8");
        }

        public function select($select){
            $this->query($select);
        }
        
        public function atualizar(){

        }

        public function deletar(){

        }

        public function query($query){
            return mysqli_query($this->conexao, $query);
        }
    }
?>
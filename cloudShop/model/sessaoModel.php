<?php
    class Sessao{
        private $cliente;

        public function __construct(){
            session_start();
        }

        public function login(){
            $parameters = func_get_args();

            if(func_num_args() == 2){
                $this->cliente = $parameters[0];
                $this->cliente->setId($parameters[1]);
                $this->setSession();
            }else{
                $this->cliente = new Cliente($parameters[0], $parameters[1], $parameters[2]);
                $this->setSession();
            }
        }

        public function sessao($cliente){
            if((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["email"]) == true) and (!isset($_SESSION["senha"]) == true)){
                $this->logout();
            }else{
                $this->cliente = $cliente;
                $this->cliente->setId($_SESSION["id"]);
            }
        }

        public function logout(){
            $this->unsetSession();
            $this->cliente = null;

            session_destroy();
            header("location: ../view/login.php");
            exit;
        }

        public function setSession(){
            $_SESSION["id"] = $this->cliente->getId();
            $_SESSION["email"] = $this->cliente->getEmail();
            $_SESSION["senha"] = $this->cliente->getSenha();
        }

        public function unsetSession(){
            unset($_SESSION["id"]);
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
        }

        public function setCliente($cliente){
            $this->cliente = $cliente;
        }
        public function getCliente(){
            return $this->cliente;
        }
    }
?>
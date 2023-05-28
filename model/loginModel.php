<?php
    class Login{
        private $email;
        private $senha;

        public function __construct($email, $senha){
            $this->email = $email;
            $this->senha = $senha;
        }
    }
?>
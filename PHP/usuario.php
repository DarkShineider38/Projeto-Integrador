<?php

    class usuario{
        public $nome;
        public $email;
        public $senha;
        public $senhaConfirm;
        private $dbconn;
        public function __construct($connection) {
            $this->dbconn = $connection;
        }

        function cadastrar(){
            if($this->senha == $this->senhaConfirm){
                $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);

                $sql = "INSERT INTO usuario (nome_usuario, email, senha) VALUES($1,$2,$3)";
                $result = pg_query_params($this->dbconn, $sql, array($this->nome, $this->email, $senha_hash));

                if($result){
                    echo "Usuario cadastrado com sucesso";
                    include '../homepage.html';
                }
                else{
                    echo "não foi possivel realizar o cadastro";
                }
            }
            else{
                echo "as senhas não diferentes, tente novamente";
            }
        }


        function logar(){
                $sql = "select id_usuario, nome_usuario, email, senha from usuario where email = $1";
                $result = pg_query_params($this->dbconn, $sql, array( $this->email));
    
                $log = pg_fetch_assoc($result);
                if($log){
                    if(password_verify($this->senha, $log['senha'])){
                        include '../homepage.html';
                    }
                    else{
                        echo '<p> e-mail ou senha senha incorretos </p>';
                    }
                }
                else{
                    echo '<p> e-mail ou senha incorretos </p>';
                }
        }



    }
?>
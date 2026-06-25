<?php

    include 'connection.php';
    include 'usuario.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaConfirm = $_POST['senhaConfirmacao'];


        $conn = ObterConexao();

        $registro = new usuario($conn);

        $registro->nome = $nome;
        $registro->email = $email;
        $registro->senha = $senha;
        $registro->senhaConfirm = $senhaConfirm;


        $registro-> cadastrar();
    }
?>








?>
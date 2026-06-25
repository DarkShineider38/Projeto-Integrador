<?php
    include 'connection.php';
    include 'usuario.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $conn = ObterConexao();
        $registro = new usuario($conn);

        $registro->email = $email;
        $registro->senha = $senha;

        $registro-> logar();


    }
?>
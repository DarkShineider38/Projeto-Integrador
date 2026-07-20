<?php
    include 'connection.php';
    include 'ReservasSalasLab.php';

    $conn = ObterConexao();
    $sala = new ReservasSalasLab($conn);

    $sala->exibirSalas();
?>
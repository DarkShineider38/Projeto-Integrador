<?php
    include 'connection.php';
    include 'ReservasSalasLab.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idreserva = $_POST['idreserva'];

        $conn = ObterConexao();
        $reservaSala = new ReservasSalasLab($conn);

        $reservaSala->id_reserva_sala = $idreserva;

        $reservaSala->cancelarReserva();

    }
?>
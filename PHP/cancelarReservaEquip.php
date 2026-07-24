<?php
    include 'connection.php';
    include 'equip.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idreserva = $_POST['idreserva'];

        $conn = ObterConexao();
        $equip = new equip($conn);

        $equip->id_reserva_equip = $idreserva;

        $equip->cancelarReserva();

    }
?>
<?php
    include 'connection.php';
    include 'ReservasSalasLab.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_reserva_sala = $_POST['idreserva'];
        $id_sala = $_POST['salaLab'];
        $DtaInicio = $_POST['DtaInicio'];
        $DtaFiml = $_POST['DtaFiml'];
        $tempInicio = $_POST['tempInicio'];
        $tempFim = $_POST['tempFim'];
        $matricula = $_POST['matricula'];

        $conn = ObterConexao();
        $reserva = new ReservasSalasLab($conn);

        $reserva->id_reserva_sala = $id_reserva_sala;
        $reserva->id_sala = $id_sala;
        $reserva->inicio_data = $DtaInicio;
        $reserva->fim_data = $DtaFiml;
        $reserva->horario_inicio = $tempInicio;
        $reserva->horario_final = $tempFim;
        $reserva->id_usuario = $id_usaurio;

        $reserva->editarReserva();

    }



?>
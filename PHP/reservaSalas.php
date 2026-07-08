<?php
    include 'connection.php';
    include '.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $salaLab = $_POST['salaLab'];
        $DtaInicio = $_POST['DtaInicio'];
        $DtaFiml = $_POST['DtaFiml'];
        $tempInicio = $_POST['tempInicio'];
        $tempFim = $_POST['tempFim'];
        $matricula = $_POST['matricula'];

        $conn = ObterConexao();
        $reserva = new reserva($conn);

        $reserva->id_equip = $salaLab;
        $reserva->inicio_data = $DtaInicio;
        $reserva->fim_data = $DtaFiml;
        $reserva->horario_inicio = $tempInicio;
        $reserva->horario_final = $tempFim;
        $reserva->id_usuario = $matricula;

        $reserva->cadastrarReserva();

    }
?>
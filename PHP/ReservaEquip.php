<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_equip = $_POST['id_equip'];
        $id_usuario = $_POST['id_usuario'];
        $inicio_data = $_POST['inicio_data'];
        $fim_data = $_POST['fim_data'];
        $horario_inicio = $_POST['horario_inicio'];
        $horario_final = $_POST['horario_final'];

        $conn = ObterConexao();
        $reserva = new reserva($conn);

        $reserva->id_equip = $id_equip;
        $reserva->id_usuario = $id_usuario;
        $reserva->inicio_data = $inicio_data;
        $reserva->fim_data = $fim_data;
        $reserva->horario_inicio = $horario_inicio;
        $reserva->horario_final = $horario_final;

        $reserva->criar();

    }




?>
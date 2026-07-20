<?php
    include 'connection.php';
    include 'equip.php';

    $conn = ObterConexao();
    $equip = new equip($conn);

    $equip->exibirReservasEquip();
?>
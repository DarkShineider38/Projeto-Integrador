<?php

    class ReservasSalasLab{
        public $idReserva;
        public $salaLab;
        public $diaInico;
        public $diaFim;
        public $horarioIncio;
        public $horarioFim;
        public $idUsuario;

        public function __construct($connection) {
            $this->dbconn = $connection;
        }


        





    }
?>
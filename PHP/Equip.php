<?php
    class equip{
        public $id_reserva_equip;
        public $id_equip;
        public $id_usuario;
        public $inicio_data;
        public $fim_data;
        public $horario_inicio;
        public $horario_final;
        private $dbconn;

        public function __construct($connection) {
            $this->dbconn = $connection;
        }

        function criar(){
            $sql = "INSERT INTO reserva_equip (id_equip, inicio_data, fim_data, horario_inico, horario_final, id_usuario) VALUES($1,$2,$3,$4,$5,$6)";
            $result = pg_query_params($this->dbconn, $sql, array($this->id_equip, $this->inicio_data, $this->fim_data, $this->horario_inicio, $this->horario_final, $this->id_usuario));

            if($result){
                echo "Reserva criada com sucesso";
                include '../homepage.html';
            }
            else{
                echo "não foi possivel criar a reserva";
                include '../homepage.html';
            }
        }

        function atualizar(){
            $sql = "select id_reserva_equip from reserva_equip where id_reserva_equip = $1";
            $result = pg_query_params($this->dbconn, $sql, array($this->id_reserva_equip));

            $registro = pg_fetch_assoc($result);
            if($registro){
                $query = "update reserva_equip set id_equip = $1, inicio_data = $2, fim_data = $3, horario_inico = $4, horario_final = $5, id_usuario = $6 where id_reserva_equip = ".$registro['id_reserva_equip'];
                $stmt = pg_prepare($this->dbconn, "update_query", $query);
                $result2 = pg_execute($this->dbconn, "update_query", array($this->id_equip, $this->inicio_data, $this->fim_data, $this->horario_inicio, $this->horario_final, $this->id_usuario));
                if ($stmt) {
                    echo 'reserva atualizada com sucesso';
                    include '../homepage.html';
                }
                else{
                    echo 'falha ao atualizar reserva';
                    include '../homepage.html';
                }
            }
        }
    }




?>
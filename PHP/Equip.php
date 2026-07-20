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
            $sql = "INSERT INTO reservaequip (id_equip, inicio_data, fim_data, horario_inico, horario_final, id_usuario) VALUES($1,$2,$3,$4,$5,$6)";
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
            $sql = "select id_reserva_equip from reservaequip where id_reserva_equip = $1";
            $result = pg_query_params($this->dbconn, $sql, array($this->id_reserva_equip));

            $registro = pg_fetch_assoc($result);
            if($registro){
                $query = "update reservaequip set id_equip = $1, inicio_data = $2, fim_data = $3, horario_inico = $4, horario_final = $5, id_usuario = $6 where id_reserva_equip = ".$registro['id_reserva_equip'];
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

        function exibirEquipamentos(){
            $query = 'select id_equip, nome from equip';
            $result = pg_query($this->dbconn, $query);
            if($result){
                echo "<h2> ======Tabela Equipamentos====== </h2>";
                echo "<table>";
                echo "<tr><th>| ID EQUIPAMENTO </th><th>| NOME |</th></tr>";
            }
            if(pg_num_rows($result) > 0){
                while($row = pg_fetch_assoc($result)){
                    echo "<tr>";
                    foreach($row as $value){
                        echo "<td> " . $value . " </td>";
                    }
                    echo "</tr>";
                }
            }else{
                echo "<tr><td colspan='2'>Nenhum equipamento encontrado!</td></tr>";
            }
            echo "</table>";
        }
        
        function exibirReservasEquip(){
            $query = 'select id_reserva_equip, id_equip, inicio_data, fim_data, horario_inico, horario_final, id_usuario from reservaequip';
            $result = pg_query($this->dbconn, $query);
            if($result){
                echo "<h2> ======Tabela Reservas de Equipamento====== </h2>";
                echo "<table>";
                echo "<tr><th>| ID RESERVA </th><th>| ID EQUIPAMENTO </th><th>| DATA INICIO </th><th>| DATA FIM </th><th>| HORARIO INICIO </th><th>| HORARIO FINAL </th><th>| ID USUARIO |</th></tr>";
            }
            if(pg_num_rows($result) > 0){
                while($row = pg_fetch_assoc($result)){
                    echo "<tr>";
                    foreach($row as $value){
                        echo "<td> " . $value . " </td>";
                    }
                    echo "</tr>";
                }
            }else{
                echo "<tr><td colspan='7'>Nenhuma reserva encontrada!</td></tr>";
            }
            echo "</table>";
        }
    }
?>
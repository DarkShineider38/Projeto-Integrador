<?php

    class ReservasSalasLab{
        public $id_reserva_sala;
        public $id_sala;
        public $id_usuario;
        public $inicio_data;
        public $fim_data;
        public $horario_inicio;
        public $horario_final;

        public function __construct($connection) {
            $this->dbconn = $connection;
        }

        function cadastrarReserva(){
            $sql = "INSERT INTO reservasLab (id_salas_lab, inicio_data, fim_data, horario_inico, horario_final, id_usuario) VALUES($1,$2,$3,$4,$5,$6)";
            $result = pg_query_params($this->dbconn, $sql, array($this->id_sala, $this->inicio_data, $this->fim_data, $this->horario_inicio, $this->horario_final, $this->id_usuario));

            if($result){
                echo "Reserva criada com sucesso";
                include '../homepage.html';
            }
            else{
                echo "não foi possivel criar a reserva";
                include '../homepage.html';
            }
        }

        function editarReserva(){
            $sql = "select id_reserva_salaslab from reservasLab where id_reserva_salaslab = $1";
            $result = pg_query_params($this->dbconn, $sql, array($this->id_reserva_sala));

            $registro = pg_fetch_assoc($result);
            if($registro){
                $query = "update reservasLab set id_salas_lab = $1, inicio_data = $2, fim_data = $3, horario_inico = $4, horario_final = $5, id_usuario = $6 where id_reserva_salaslab= ".$registro['id_reserva_salaslab'];
                $stmt = pg_prepare($this->dbconn, "update_query", $query);
                $result2 = pg_execute($this->dbconn, "update_query", array($this->id_sala, $this->inicio_data, $this->fim_data, $this->horario_inicio, $this->horario_final, $this->id_usuario));
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

        function exibirSalas(){
            $query = 'select id_salas_lab, nome, tipo from salaslab';
            $result = pg_query($this->dbconn, $query);
            if($result){
                echo "<h2> ======Tabela Salas====== </h2>";
                echo "<table>";
                echo "<tr><th>| ID SALA </th><th>| NOME </th><th>| TIPO |</th></tr>";
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
                echo "<tr><td colspan='3'>Nenhuma sala encontrada!</td></tr>";
            }
            echo "</table>";
        }
        
        function exibirReservasSalasLab(){
            $query = 'select id_reserva_salaslab, id_salas_lab, inicio_data, fim_data, horario_inico, horario_final, id_usuario from reservasLab';
            $result = pg_query($this->dbconn, $query);
            if($result){
                echo "<h2> ======Tabela Reservas de Sala====== </h2>";
                echo "<table>";
                echo "<tr><th>| ID RESERVA </th><th>| ID SALA </th><th>| DATA INICIO </th><th>| DATA FIM </th><th>| HORARIO INICIO </th><th>| HORARIO FINAL </th><th>| ID USUARIO |</th></tr>";
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
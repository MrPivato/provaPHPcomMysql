<?php
function mostraNomes($retornaId = false)
{

        require 'inc/connection.php';


        $sql = "SELECT id, nome FROM crianca ORDER BY nome";

        $resultado = $mysqli->query($sql);

        if ($retornaId)
        {
                $registro = $resultado->fetch_array();
                $last = $registro['id'];
                return $last;
        }

        while($registro = $resultado->fetch_array()){
                $registro['nome'] = $mysqli->real_escape_string($registro['nome']);
                $sql = '<option ';
                $sql .= "value='{$registro['id']}'>";
                $sql .= "{$registro['nome']}</option>";
                echo $sql;
        }
        $resultado->free();
}

$last = mostraNomes(true);

function fixValues()
{
        require 'inc/connection.php';


        switch ($_POST['vacina'])
        {
                case '1':
                        $_POST['vacina'] = 'Febre amarela';
                        break;
                case '2':
                        $_POST['vacina'] = 'Sarampo';
                        break;
                case '3':
                        $_POST['vacina'] = 'Poliomielite';
                        break;
                case '4':
                        $_POST['vacina'] = 'Hepatite B';
                        break;
                case '5':
                        $_POST['vacina'] = 'Hepatite A';
                        break;
        }

        $_POST['lote'] = $mysqli->real_escape_string($_POST['lote']);
}
?>
<?php 
require 'inc/connection.php';

if ($_POST)
{
        fixValues();

        $sql = 'INSERT INTO vacina (vacina, lote, dataVacina, id_crianca) VALUES (' .
                '\'' . $_POST['vacina'] . '\', ' .
                '\'' . $_POST['lote'] . '\', ' .
                '\'' . $_POST['data'] . '\', ' .
                $_POST['criancaId'] . ')'; 

        $resultado = $mysqli->query($sql);

        if ($resultado === true) {
                echo "<div class='alert alert-success'>";
                if(!empty($_POST['id'])){
                        echo "<strong>Sucesso!</strong> Criança alterada com sucesso!";
                }else{
                        echo "<strong>Sucesso!</strong> Nova entrada em Criança criada com sucesso!";
                }
                echo "</div>";

        } else {
                echo "<div class='alert alert-danger'>";
                echo "Erro: " . $sql . "<br>" . $mysqli->error;
                echo "</div>";
        }
}

?>                           

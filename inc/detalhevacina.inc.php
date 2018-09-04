<?php
function mostraTabela()
{

        global $mysqli;

        //Pesquisa
        if (isset($_GET["id"])) {
                $_GET["id"] = $mysqli->real_escape_string($_GET["id"]);
                $sql = "SELECT crianca.id, crianca.nome, vacina.vacina, vacina.lote, vacina.dataVacina 
                        FROM crianca INNER JOIN vacina ON vacina.id_crianca = crianca.id WHERE crianca.id = {$_GET['id']} ORDER BY vacina";                                
        }
        else
        {
                header("Location: listvacina.php");
        }

        $resultado = $mysqli->query($sql);
        while($registro = $resultado->fetch_array()){
                $sql = "<tr>";
                $sql .= "<td>{$registro['vacina']}</td>";
                $sql .= "<td>{$registro['lote']}</td>";
                $sql .= "<td>{$registro['dataVacina']}</td>";
                echo $sql;
        }
        $resultado->free();
}
?>

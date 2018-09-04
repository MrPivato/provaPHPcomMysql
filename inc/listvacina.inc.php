
<?php
function mostraTabela()
{

        global $mysqli;

        //Pesquisa
        if (isset($_POST["nome"])) {
                $_POST['nome'] = $mysqli->real_escape_string($_POST['nome']);
                $sql = "SELECT crianca.id, crianca.nome, crianca.sexo, MAX(vacina.dataVacina) as dataVacina FROM crianca INNER JOIN vacina ON vacina.id_crianca = crianca.id WHERE nome like '%{$_POST['nome']}%' GROUP BY crianca.id ORDER BY nome";                                
        }else{
                $sql = "SELECT crianca.id, crianca.nome, crianca.sexo, MAX(vacina.dataVacina) as dataVacina FROM crianca INNER JOIN vacina ON vacina.id_crianca = crianca.id GROUP BY crianca.id ORDER BY nome";
        }

        $resultado = $mysqli->query($sql);
        while($registro = $resultado->fetch_array()){
                $sql = "<tr>";
                $sql .= "<td>{$registro['nome']}</td>";
                $sql .= "<td>{$registro['sexo']}</td>";
                $sql .= "<td>{$registro['dataVacina']}</td>";
                $sql .= "<td><a href='detalhevacina.php?id={$registro['id']}&nome={$registro['nome']}'>Detalhes</a></td>";
                echo $sql;
        }
        $resultado->free();
}
?>

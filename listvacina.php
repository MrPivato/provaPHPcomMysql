<?php include 'inc/validate.php' ?>
<?php include 'inc/head.php' ?>
<?php include 'inc/nav.php' ?>

<?php
function mostraTabela()
{

        global $mysqli;

        //Pesquisa
        if (isset($_POST["nome"])) {
                $_POST['nome'] = $mysqli->real_escape_string($_POST['nome']);
                $sql = "SELECT crianca.id, crianca.nome, crianca.sexo, vacina.dataVacina FROM crianca INNER JOIN vacina ON vacina.id_crianca = crianca.id WHERE nome like '%{$_POST['nome']}%' ORDER BY nome";                                
        }else{
                $sql = "SELECT crianca.id, crianca.nome, crianca.sexo, vacina.dataVacina FROM crianca INNER JOIN vacina ON vacina.id_crianca = crianca.id ORDER BY nome";
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
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Gestão de Vacinas</h2>
        </div>
        <div class="float-right"><a href="cadvacina.php">Nova Vacina</a> | <a href="sair.php">Sair</a></div><br>                   
        <div class="panel-body">

            <form action="listvacina.php" method="post" class="form-horizontal">
                <div class="input-group">
                  <input class="form-control border-secondary py-2" type="search" id="nome" name="nome" placeholder="Pesquisar...">
                  <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit" id="pesquisar" name="pesquisar">
                          <i class="fa fa-search"></i>
                      </button>
                  </div>
              </div>              
              <br>
            </form>

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Data Vacina</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require 'inc/connection.php';

                                 mostraTabela();
                            
                            $mysqli->close();
                            ?>                           
                           
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

<?php include 'inc/tail.php' ?>

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
                $sql = "SELECT id, nome, sexo, idade FROM crianca WHERE nome like '%{$_POST['nome']}%' ORDER BY nome";                                
        }else{
                $sql = "SELECT id, nome, sexo, idade FROM crianca ORDER BY nome";
        }

        $resultado = $mysqli->query($sql);
        while($registro = $resultado->fetch_array()){
                $sql = "<tr>";
                $sql .= "<td>{$registro['nome']}</td>";
                $sql .= "<td>{$registro['sexo']}</td>";
                $sql .= "<td>{$registro['idade']}</td>";
                $sql .= "<td><a href='cadcrianca.php?id={$registro['id']}'>Alterar</a> | <a href='listcrianca.php?id={$registro['id']}'>Excluir</a></td>";
                echo $sql;
        }
        $resultado->free();
}
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Gestão de Crianças</h2>
        </div>
        <div class="float-right"><a href="cadcrianca.php">Nova Criança</a> | <a href="sair.php">Sair</a></div><br>                   
        <div class="panel-body">

            <form action="listcrianca.php" method="post" class="form-horizontal">
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
                                <th>Idade</th>
                                <th>Acão</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require 'inc/connection.php';

                            //Exclusão
                            if (isset($_GET["id"])) {
                                $sql = " DELETE FROM crianca " .
                                        " WHERE id=".$_GET["id"];
                                 $resultado = $mysqli->query($sql);
                                 if ($resultado === true) {
                                    echo "<div class='alert alert-success'>";
                                    echo "<strong>Sucesso!</strong> Criança apagada com sucesso!";
                                    echo "</div>";                                    
                                 } else {
                                    echo "<div class='alert alert-danger'>";
                                    echo "Erro: " . $sql . "<br>" . $mysqli->error;
                                    echo "</div>";
                                 }

                                 mostraTabela();

                            }else{
                                 mostraTabela();
                            }
                            
                            $mysqli->close();
                            ?>                           
                           
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

<?php include 'inc/tail.php' ?>

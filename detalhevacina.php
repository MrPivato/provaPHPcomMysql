<?php include 'inc/validate.php' ?>
<?php include 'inc/head.php' ?>
<?php include 'inc/nav.php' ?>

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

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Gestão de Vacinas</h2>
        </div>
        <div class="float-right"><a href="listvacina.php">Voltar</a> | <a href="sair.php">Sair</a></div><br>                   
        <div class="panel-body">

            <form action="listvacina.php" method="post" class="form-horizontal">
                <div class="input-group">
                <input class="form-control border-secondary py-2" type="search" id="nome" disabled name="nome" placeholder="<?php echo $_GET['nome'] ?>">
                  <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit" id="pesquisar" disabled name="pesquisar">
                          <i class="fa fa-search"></i>
                      </button>
                  </div>
              </div>              
              <br>
            </form>

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Vacina</th>
                                <th>Lote</th>
                                <th>Data Vacina</th>
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

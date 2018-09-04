<?php include 'inc/validate.php' ?>
<?php include 'inc/head.php' ?>
<?php include 'inc/nav.php' ?>
<?php include 'inc/detalhevacina.inc.php' ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Gestão de Vacinas</h2>
        </div>
        <div class="float-right"><a href="listvacina.php">Voltar</a> | <a href="sair.php">Sair</a></div><br>                   
<br>

        <div class="panel-body">

            <form action="listvacina.php" method="post" class="form-horizontal">
<div class="form-row">
              <div class="form-group input-group">
                <label class="control-label col-md-2" for="nome">Criança:</label>  
                <input id="nome" name="nome" class="form-control col-md-10" readonly="" value="<?php echo $_GET['nome'] ?>" type="text">
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

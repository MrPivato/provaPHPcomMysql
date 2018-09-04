<?php include 'inc/validate.php' ?>
<?php include 'inc/head.php' ?>
<?php include 'inc/nav.php' ?>
<?php include 'inc/listvacina.inc.php' ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Gestão de Vacinas</h2>
        </div>
        <div class="float-right"><a href="cadvacina.php">Nova Vacina</a> | <a href="sair.php">Sair</a></div><br>                   
<br>
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
                                <th>Última Vacina</th>
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

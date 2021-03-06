<?php include 'inc/head.php'; ?>
<?php include 'inc/login.inc.php'; ?>

<!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
          <div class="container">
            <a class="navbar-brand" href="#">Clínica Vaccinare</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                      </div>
        </nav>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Gestão de Vacinas</h2>
        </div>
        <div class="panel-body">
            <form action="login.php" method="post" class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label" for="email">E-mail:</label>  
                            <input id="email" name="email" type="email" placeholder="Digite o seu e-mail" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label" for="senha">Senha:</label>  
                            <input id="senha" name="senha" type="password" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label for="lembrar">
                              <input type="checkbox" name="lembrar" id="lembrar" >
                              Continuar logado
                            </label>
                        </div>    
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="login"></label>
                            <button id="login" name="login" class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="cancelar"></label>
                            <button id="cancelar" name="cancelar" class="btn btn-secondary btn-lg btn-block"  type="reset">Cancelar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/tail.php'; ?>

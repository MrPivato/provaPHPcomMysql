<?php include 'inc/validate.php' ?>
<?php include 'inc/head.php' ?>
<?php include 'inc/nav.php' ?>
<?php include 'inc/cadcrianca.inc.php'?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Gestão de Crianças</h2>
        </div>
        <div class="float-right"><a href="listcrianca.php">Voltar</a> | <a href="sair.php">Sair</a></div><br>                   
<br>
        <div class="panel-body">
            <form action="cadcrianca.php" method="post" class="form-horizontal">
                <fieldset>
                <input type="hidden" name="id" id="id"  value="<?php verifyID(); ?>" >
                    <div class="form-group">
                        <label class="control-label" for="nome">Nome:</label>  
                        <input id="nome" name="nome" type="text" placeholder="Digite o nome" class="form-control" required="" value="">
                    </div>           

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class="control-label" for="idade">Idade:</label>  
                        <input id="idade" name="idade" type="number" min="0" max="10" placeholder="Digite a idade" class="form-control" required="" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="sexo">Sexo:</label>
                                <div class="col-md-6"> 
                                    <label class="radio-inline" for="masculino">
                                        <input type="radio" name="sexo" id="masculino" required="" value="M"  >
                                        Masculino
                                    </label> 
                                    <label class="radio-inline" for="feminino">
                                        <input type="radio" name="sexo" id="feminino" required="" value="F" >
                                        Feminino
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <label class="control-label" for="etnia">Cor/Etnia:</label>
                            <select id="etnia" name="etnia" class="form-control">
                              <option value="B" >Branca</option>
                              <option value="N" >Negra</option>
                              <option value="P" >Parda</option>
                              <option value="I" >Indígena</option>
                              <option value="A" >Amarela</option>
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="parto">Parto:</label>
                            <div class="checkbox">
                                <label for="parto_natural">
                                  <input type="checkbox" name="parto" id="parto_natural"  >
                                  Natural
                                </label>
                            </div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nome_mae">Nome da Mãe:</label>  
                        <input id="nome_mae" name="nome_mae" type="text" placeholder="Digite o nome da mãe" class="form-control" required="" value="">

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="email">E-mail:</label>  
                            <input id="email" name="email" type="email" aria-describedby="emailHelp"  placeholder="Digite o e-mail" class="form-control" required="" value="">
                            <small id="emailHelp" class="form-text text-muted">Ex: email@gmail.com</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label" for="telefone">Telefone:</label>  
                            <input id="telefone" name="telefone" type="text" aria-describedby="telHelp"  placeholder="Digite o telefone" class="form-control" required="" value="">
                            <small id="telHelp" class="form-text text-muted">Ex: (54)9876-5432</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="salvar"></label>
                            <button id="salvar" name="salvar" class="btn btn-primary btn-lg btn-block">Salvar</button>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="cancelar"></label>
                            <button id="cancelar" name="cancelar" class="btn btn-secondary btn-lg btn-block" onclick="window.location.href='listcrianca.php'" type="button">Cancelar</button>
                        </div>
                    </div>
                                    </fieldset>
            </form>

        </div>
    </div>
</div>    

<?php include 'inc/tail.php' ?>

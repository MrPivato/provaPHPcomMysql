<?php include 'inc/validate.php' ?>
<?php include 'inc/head.php' ?>
<?php include 'inc/nav.php' ?>
<?php include 'inc/cadvacina.inc.php' ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Gestão de Vacinas</h2>
        </div>
        <div class="float-right"><a href="listvacina.php">Voltar</a> | <a href="sair.php">Sair</a></div><br>                   
<br>
        <div class="panel-body">
            <form action="cadvacina.php" method="post" class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="crianca">Criança:</label>
                        <select id="crianca" name="crianca" class="form-control" onchange="addURL()">
<?php mostraNomes(); ?>
</select>
                    </div>           
                    
                    <div class="form-group">
                        <label class="control-label" for="vacina">Vacina:</label>
                        <select required  id="vacina" name="vacina" class="form-control" >
                            <option disabled selected value>Selecione uma opção</option>
                            <option value='1'>Febre amarela</option>
                            <option value='2'>Sarampo</option>                        
                            <option value='3'>poliomielite </option>
                            <option value='4'>Hepatite B</option>
                            <option value='5'>Hepatite A</option>
                        </select>
                    </div>           
                   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class="control-label" for="lote">Lote:</label>  
                        <input id="lote" name="lote" type="text" placeholder="Digite o lote" class="form-control" required="" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="data">Data:</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input class="form-control" type="date" value="2018-09-02" id="data" name="data">                                
                            </div>                            
                        </div>                        
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="salvar"></label>
                            <button id="salvar" name="salvar" class="btn btn-primary btn-lg btn-block">Salvar</button>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="cancelar"></label>
                            <button id="cancelar" name="cancelar" class="btn btn-secondary btn-lg btn-block" onclick="window.location.href='listvacina.php'" type="button">Cancelar</button>
                    </div>
                    </div>
                   
                </fieldset>
                <input name='criancaId' id='cID' type='hidden' value='<?php echo $last; ?>'>
            </form>

        </div>
    </div>
</div>    
<script>
function addURL()
{
        document.getElementById('cID').value = document.getElementById("crianca").value; 
}
</script>
<?php include 'inc/tail.php' ?>

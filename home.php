<?php include 'inc/validate.php' ?>
<?php include 'inc/head.php' ?>
<?php include 'inc/nav.php' ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Gestão da Clínica Vaccinare</h2>
        </div>
        <div class="panel-body">
        <p> Seja bem vindo(a), <strong> <?php echo $_SESSION['nome']?> </strong>.</p>
            <p> Este é o Site de Adminitração da Clínica Vaccinare.</p>
            <p>Neste espaço é possível:</p>
            <ul class="list">
                <li>Cadastrar crianças</li>
                <li>Cadastrar a vacinação destas crianças</li>
              </ul>
        </div>
    </div>
</div>    

<?php include 'inc/tail.php' ?>

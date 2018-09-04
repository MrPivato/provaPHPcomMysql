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
                $sql .= "<td><a class='btn btn-info' href='cadcrianca.php?id={$registro['id']}'>Alterar</a>"; 
                $sql .= "

<button='button' class='btn btn-danger' data-toggle='modal' data-target='#confirm'>Deletar</button>

<div class='modal fade' id='confirm' role='dialog'>
  <div class='modal-dialog modal-md'>

    <div class='modal-content'>
      <div class='modal-body'>
            <p class='text-warning'>Deseja realmente excluir?</p>
      </div>
      <div class='modal-footer'>
        <a href='listcrianca.php?id={$registro['id']}' type='button' class='btn btn-danger' id='delete'>Apagar Criança</a>
            <button type='button' data-dismiss='modal' class='btn btn-info'>Cancelar</button>
      </div>
    </div>

  </div>
</div>
";
                echo $sql;
        }
        $resultado->free();
}
?>

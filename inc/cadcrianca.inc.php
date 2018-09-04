<?php
function verifyId()
{
        global $mysqli;

        if (isset($_GET['id']))
        {
                $_GET['id'] = $mysqli->real_escape_string($_GET['id']);
                echo $_GET['id'];
        }
        else
        {
                echo '';
        }
}

function fixValues()
{
        global $mysqli;

        if (isset($_POST['parto']))
        {
                $_POST['parto'] = 'Natural';
        }
        else
        {
                $_POST['parto'] = 'Cesária';
        }

        if ($_POST['sexo'] == 'M')
        {
                $_POST['sexo'] = 'Masculino';
        }
        else
        {
                $_POST['sexo'] = 'Feminino';
        }

        switch ($_POST['etnia'])
        {
                case 'B':
                        $_POST['etnia'] = 'Branca';
                        break;
                case 'N':
                        $_POST['etnia'] = 'Negra';
                        break;
                case 'P':
                        $_POST['etnia'] = 'Parda';
                        break;
                case 'I':
                        $_POST['etnia'] = 'Indígena';
                        break;
                case 'A':
                        $_POST['etnia'] = 'Amarela';
                        break;
        }

        $_POST['nome'] = $mysqli->real_escape_string($_POST['nome']);
        $_POST['nome_mae'] = $mysqli->real_escape_string($_POST['nome_mae']);
        $_POST['email'] = $mysqli->real_escape_string($_POST['email']);
        $_POST['telefone'] = $mysqli->real_escape_string($_POST['telefone']);
}
?>
<?php 
require 'inc/connection.php';

if ($_POST)
{
        if (!empty($_POST['id']))
        {
                fixValues();

                $sql = 'UPDATE crianca SET ' .
                        'nome = \'' . $_POST['nome'] . '\', ' .
                        'idade = ' . $_POST['idade'] . ', ' .
                        'sexo = \'' . $_POST['sexo'] . '\', ' .
                        'etnia = \'' . $_POST['etnia'] . '\', ' .
                        'parto = \'' . $_POST['parto'] . '\', ' .
                        'nomeMae = \'' . $_POST['nome_mae'] . '\', ' .
                        'email = \'' . $_POST['email'] . '\', ' .
                        'telefone = \'' . $_POST['telefone'] . '\' ' .
                        'WHERE id = ' . $_POST['id'];
                
        }
        else
        {
                fixValues();

                $sql = 'INSERT INTO crianca (nome, idade, sexo, etnia, parto, nomeMae, email, telefone) VALUES (' .
                        '\'' . $_POST['nome'] . '\', ' .
                         $_POST['idade'] . ', ' .
                        '\'' . $_POST['sexo'] . '\', ' .
                        '\'' . $_POST['etnia'] . '\', ' .
                        '\'' . $_POST['parto'] . '\', ' .
                        '\'' . $_POST['nome_mae'] . '\', ' .
                        '\'' . $_POST['email'] . '\', ' .
                        '\'' . $_POST['telefone'] . '\')'; 
        }

        $resultado = $mysqli->query($sql);

        if ($resultado === true) {
                echo "<div class='alert alert-success'>";
                if(!empty($_POST['id'])){
                        echo "<strong>Sucesso!</strong> Criança alterada com sucesso!";
                }else{
                        echo "<strong>Sucesso!</strong> Nova entrada em Criança criada com sucesso!";
                }
                echo "</div>";

        } else {
                echo "<div class='alert alert-danger'>";
                echo "Erro: " . $sql . "<br>" . $mysqli->error;
                echo "</div>";
        }
}

?>                           

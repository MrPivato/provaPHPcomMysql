<?php
if(isset($_COOKIE['isRemembered'])){
        header("Location: home.php");
}
?>

<?php 
if ($_POST)
{
        require 'inc/connection.php';
        session_start();

        $login = $mysqli->real_escape_string($_POST['email']);
        $senha = md5($_POST['senha']);

        if (isset($_POST['lembrar']))
        {
                $lembrar = true;
        }
        else
        {
                $lembrar = false;
        }

        $query = "SELECT * FROM `login` WHERE login='$login' and senha='".$senha."';";

        $result = $mysqli->query($query);

        $rows = mysqli_num_rows($result);

        if($rows == 1)
        {
                $register = $result->fetch_array();

                $_SESSION['id'] = $register['id'];
                $_SESSION['nome'] = $register['nome'];

                setcookie('isRemembered', $lembrar);

                header('Location: home.php');
        }
        else
        {
                echo '<div class="alert alert-warning"><strong>Alerta!</strong> Usuário e/ou senha incorretos!</div>';
        }

}
?>

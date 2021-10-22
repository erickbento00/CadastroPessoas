<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Clientes</title>
</head>
<body>
    <div class="box" id="box">
        <?php 
            require_once("conexaoBD.php");
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM pessoas WHERE id = $id";
                $listar = mysql_query($sql, $conexao);

                $dados = mysql_fetch_assoc($listar);

                if($dados['sexo'] == 'Masculino'){
                    $masculino = 'checked';
                }else{
                    $feminino = 'checked';
                }
            }

        ?>

        <form action="cadastroDo.php?id=<?=$id?>" method="post">
            <fieldset>
                <div class="header">
                    <img src="img/profile-man.png" alt="Perfil homem">
                    <h2>Cadastro de Pessoas</h2>
                </div>
                <br>
                <div class="linha">
                    <div class="campoCadastro">
                        <label for="nome"><b>Nome</b></label>
                        <input type="text" name="nome" id="nome" class="inputCadastro" value="<?=$dados['nome']?>" placeholder="Informe seu nome" required>
                    </div>
                    <div class="campoCadastro">
                        <label for="idade"><b>Idade</b></label>
                        <input type="number" min="0" name="idade" id="idade" class="inputCadastro" value="<?=$dados['idade']?>" placeholder="Informe sua idade" required>
                    </div>
                </div>
                <br>
                <div class="linha">
                    <div  class="campoCadastro">
                        <label for="email"><b>Email</b></label>
                        <input type="text" name="email" id="email" class="inputCadastro" value="<?=$dados['email']?>" placeholder="Informe seu e-mail" required>
                    </div>
                    <div class="campoCadastro">
                        <label for="celular"><b>Celular</b></label>
                        <input type="text" name="celular" id="celular" class="inputCadastro" value="<?=$dados['celular']?>" placeholder="Informe seu n�mero" required>
                    </div>
                </div>
                <br>
                <p><b>G�nero</b></p>
                <input type="radio" name="genero" value="Masculino" id="masculino" class="radioCadastro" required <?=$masculino?>>
                <label for="masculino" class="labelGenero">Masculino</label>
                <input type="radio" name="genero" value="Feminino" id="feminino" class="radioCadastro" required <?=$feminino?>>
                <label for="feminino">Feminino</label>
                <br>
                <br>
                <div class="footer">
                    <input type="submit" value="Cadastrar">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
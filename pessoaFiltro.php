<?php
require_once('conexaoBD.php');

$nome = $_POST['nome'];

if($nome){
    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$nome%' ";
    $rs = mysql_query($sql, $conexao) or die('Query incorreta: ' . $sql . '<br>' . mysql_errno() . ": " . mysql_error());

    if (mysql_num_rows($rs) > 0){
        $conteudo = "<table>";
            $conteudo .= "<tr>";
                $conteudo .= "<th>Id</th>";
                $conteudo .= "<th>Nome</th>";
                $conteudo .= "<th>Idade</th>";
                $conteudo .= "<th>E-mail</th>";
                $conteudo .= "<th>Celular</th>";
                $conteudo .= "<th>Gênero</th>";
                $conteudo .= "<th>Ação</th>";
            $conteudo .= "</tr>";
            while ($row =  mysql_fetch_assoc($rs)){
                $id = $row['id'];
                $nome = $row['nome'];
                $idade = $row['idade'];
                $email = $row['email'];
                $celular = $row['celular'];
                $genero = $row['sexo'];
                
                $conteudo .= "<tr>";
                    $conteudo .= "<td>$id</td>";
                    $conteudo .= "<td>$nome</td>";
                    $conteudo .= "<td>$idade</td>";
                    $conteudo .= "<td>$email</td>";
                    $conteudo .= "<td>$celular</td>";
                    $conteudo .= "<td>$genero</td>";
                    $conteudo .= "<td><a href='cadastroDeleteDo.php?id=$id' class='botaoExluir'><i class='fas fa-trash-alt'></i></a><a href='cadastro.php?id=$id' class='botaoEditar'><i class='fas fa-edit'></i></a></td>";
                $conteudo .= "</tr>";
            }
            $conteudo .= "<tr class='footer'>";
                $conteudo .= "<th colspan='7'>Foram encontrado um total de " . mysql_num_rows($rs) . " registros.</th>";
            $conteudo .= "</tr>";
        $conteudo .= "</table>";

        echo $conteudo;
    }
    
}else {
    $sql = 'SELECT * FROM pessoas';
    $rs = mysql_query($sql, $conexao) or die('Query incorreta: ' . $sql . '<br>' . mysql_errno() . ": " . mysql_error());
    if(mysql_num_rows($rs) < 0){
        $conteudo = "<p>Não há pessoas cadastradas, cadastra-se no botão acima!</p>";
    }else {
        $conteudo = "<table>";
            $conteudo .= "<tr>";
                $conteudo .= "<th>Id</th>";
                $conteudo .= "<th>Nome</th>";
                $conteudo .= "<th>Idade</th>";
                $conteudo .= "<th>E-mail</th>";
                $conteudo .= "<th>Celular</th>";
                $conteudo .= "<th>Gênero</th>";
                $conteudo .= "<th>Ação</th>";
            $conteudo .= "</tr>";
            while ($row = mysql_fetch_assoc($rs)){
                $id = $row['id'];
                $nome = $row['nome'];
                $idade = $row['idade'];
                $email = $row['email'];
                $celular = $row['celular'];
                $genero = $row['sexo'];
                
                $conteudo .= "<tr>";
                    $conteudo .= "<td>$id</td>";
                    $conteudo .= "<td>$nome</td>";
                    $conteudo .= "<td>$idade</td>";
                    $conteudo .= "<td>$email</td>";
                    $conteudo .= "<td>$celular</td>";
                    $conteudo .= "<td>$genero</td>";
                    $conteudo .= "<td><a href='cadastroDeleteDo.php?id=$id' class='botaoExluir'><i class='fas fa-trash-alt'></i></a><a href='cadastro.php?id=$id' class='botaoEditar'><i class='fas fa-edit'></i></a></td>";
                $conteudo .= "</tr>";
            }
            $conteudo .= "<tr class='footer'>";
                $conteudo .= "<th colspan='7'>Foram encontrado um total de " . mysql_num_rows($rs) . " registros.</th>";
            $conteudo .= "</tr>";
        $conteudo .= "</table>";
    }
    
    echo $conteudo;
}
die();

?>
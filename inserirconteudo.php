<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="inserirconteudo.php" method="GET">
            id<input type="number" name="id"><br>
            nome<input type="text" name="nome"><br>
            ano<input type="number" name="ano"><br>
            pagina<input type="text" name="page"><br>
            <input type="submit">
        </form>
        <?php
        include './conexao.php';
        if(!empty($_GET['id'])){
            $id=$_GET['id'];
            $nome=$_GET['nome'];
            $ano=$_GET['ano'];
            $pagina=$_GET['page'];
            $sql="INSERT INTO conteudo (idconteudo,nomeConteudo,anoConteudo,endConteudo) VALUES ($id,'$nome',$ano,'$pagina')";
            $inserir= $db->prepare($sql);
            $inserir->execute();
        }
        ?>
    </body>
</html>

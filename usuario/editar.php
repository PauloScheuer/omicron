<?php
session_start();
if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
//Verifico se o usuário está logado no sistema

    
 }else{
     echo '<script language= "JavaScript">
location.href="../pages/index.php";
alert("Você não está logado!");
</script>';
 }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>
        <style>
            html, body{
                height: 100%;
            }
            .geral{
                min-height: 100%;
                background-color: #f4f4f4;
                font-family: sans-serif;
                position: absolute;
                font-size: 19px;
                min-width: 100%;
                
            }
            .corpo{
                padding-left: 15%;
                padding-right: 15%;
                padding-bottom: 5%;
                padding-top: 1%;
                margin-bottom: 15%;
                text-align: center;
                min-height: 100%;
                background-color: #f4f4f4;
            }
            .esq{
                float: left;
                margin-top: 6%;
            }
            .dir{
                float: right;
                margin-top: 6%;
            }
            .ia{
                width: 200px;
                border-radius: 5px;
                border:2px solid #418BC0;
                padding-left: 1px;
            }
            .ia:focus{
                outline: none;
            }
            .enviarb { 
                background-color: white;
   color: #418BC0;
   border: 3px solid #418BC0;
   margin-top: 5px;
   padding: 4px;
   font-size: 14px;
   font-weight: bold;
   cursor: pointer;
   border-radius: 10px;
            }  
            .enviarb:hover { 
                background-color: #418BC0;
                color: white
            }
            .enviarb:disabled{
                cursor: not-allowed;
            }
            h2{
                color: #162E40;
            }
            @media screen and (max-width: 640px) {
              .corpo{
                padding-left: 5%;
                padding-right:5%;
                min-height: 100%;
                padding-bottom: 20%;
            }  
            .esq{
                float: none;
            }
            .dir{
                float: none;
            }
}        
@media only screen and (max-device-width: 900px) {
    .corpo{
                padding-left: 5%;
                padding-right:5%;
            }  
            .esq{
                float: none;
            }
            .dir{
                float: none;
            }
    
}@media only screen and (max-device-width: 900px) {
    .ia{
        font-size: 30px;
    }
           .geral{
               font-size: 40px;
           }
           .enviarb{
               font-size: 30px;
           }
}
        </style>
    </head>
    <body>
        <?php
        include '../commons/header.php';
        include '../commons/menu.php';
        ?>
        <div class="geral">
        <div class="corpo">
            <div class="esq">
           <?php
include '../conexao.php';
if(!empty($_GET['alterou'])){
    $novoNome=$_GET['nome'];
    $novoNivel=$_GET['nivel'];
    $idUsuario=$_SESSION['idUsuario'];
    $sqlAtualizar="UPDATE usuario SET nomeUsuario=:nome, nivelUsuario=:nivel WHERE idUsuario=:id";
    
    $atualizarId = $db->prepare($sqlAtualizar);
    
    $atualizarId->bindValue(":nome",$novoNome,PDO::PARAM_STR);
    $atualizarId->bindValue(":nivel",$novoNivel,PDO::PARAM_STR);
    $atualizarId->bindValue(":id",$idUsuario, PDO::PARAM_STR);
    
    if($atualizarId->execute()){
        
        $_SESSION['nomeUsuario'] = $novoNome;
        $_SESSION['nivelUsuario'] = $novoNivel;
        echo '<script language= "JavaScript">
alert("Atualização feita!");
location.href="../pages/userpage.php";
</script>';
    }else{
        echo '<script language= "JavaScript">
alert("Erro na atualização!");
</script>';
    }
}


if (!empty($_SESSION['idUsuario'])) {
    $idUsuario = $_SESSION['idUsuario'];
    $sqlLerID = "SELECT * FROM usuario WHERE idUsuario=:idUsuario";
    $lerID = $db->prepare($sqlLerID);
    $lerID->bindValue(':idUsuario', $idUsuario, PDO::PARAM_STR);
    $lerID->execute();
    if ($lerID->rowCount()>0) {
        $rs = $lerID->fetch(PDO::FETCH_OBJ);
        $nome = $rs->nomeUsuario;
        $nivel = $rs->nivelUsuario;
    }else{
        echo "Nenhum dado encontrado";
    }
    ?>
<form action="editar.php" method="GET">
    <h2>Alterar dados</h2>
    <label>Nome: </label>
    <input type="text" name="nome" value="<?php echo $nome?>" class="ia" maxlength="40">
    <br><br>

    <label>Nivel de escolaridade: </label>
            <select class="ia" name=nivel>
<option value="1" >1° ano do ensino médio</option>
<option value="2">2° ano do ensino médio</option>
<option value="3">3° ano do ensino médio</option>
</select>
    <br><br>
    
    <input type="hidden" name="alterou" value="true"><br>
    <input type="submit" value="Alterar" class="enviarb">
</form>
<?php
}
?> 
            </div><div class="dir">  
            <?php
            if(!empty($_POST['s'])){
                $senhaatual= md5($_POST['senha']);
    $novaSenha= md5($_POST['novasenha']);
    $idUsuario=$_SESSION['idUsuario'];
    if ($rs->senhaUsuario==$senhaatual){
       $sqlsenha="UPDATE usuario SET senhaUsuario=:senha WHERE idUsuario=:id";
    
    $atualizarsenha = $db->prepare($sqlsenha);
    
    $atualizarsenha->bindValue(":senha",$novaSenha,PDO::PARAM_STR);
    $atualizarsenha->bindValue(":id",$idUsuario, PDO::PARAM_STR);
    
    if($atualizarsenha->execute()){
        echo '<script language= "JavaScript">
alert("Senha atualizada!");
</script>';
    }else{
        echo '<script language= "JavaScript">
alert("Erro na atualização!");
</script>';
    } 
    } else {
        echo '<script language= "JavaScript">
alert("Senha atual errada!");
</script>';
    }
    
}


if (!empty($_SESSION['idUsuario'])) {
    $idUsuario = $_SESSION['idUsuario'];
    $sqlLerID = "SELECT * FROM usuario WHERE idUsuario=:idUsuario";
    $lerID = $db->prepare($sqlLerID);
    $lerID->bindValue(':idUsuario', $idUsuario, PDO::PARAM_STR);
    $lerID->execute();
    if ($lerID->rowCount()>0) {
        $rss = $lerID->fetch(PDO::FETCH_OBJ);
        $senha = $rss->senhaUsuario;
    }else{
        echo "Nenhum dado encontrado";
    }
    ?>
<form action="editar.php" method="POST">
    <h2>Alterar senha</h2>
    <label>Senha atual: </label>
    <input type="password" name="senha" value="" class="ia" maxlength="32"><br><br>
    <label>Nova senha: </label>
    <input type="password" name="novasenha" value="" class="ia" maxlength="32">
    <br><br>

    
    
    <input type="hidden" name="s" value="true"><br>
    <input type="submit" value="Alterar senha" class="enviarb">
</form>
<?php
}
?> 
            </div>
        </div>
            
            
        <?php
        include '../commons/rodape.php';
            ?>
            </div>
</body>
</html>


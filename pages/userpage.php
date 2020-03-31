<?php
session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Userpage</title>
        <style>
            html, body{
                height: 100%;
            }
            .geral{
                min-height: 100%;
                background-color: #f4f4f4;
                font-family: sans-serif;
                position: absolute;
                font-size: 15px;
                min-width: 100%;
                
            }
            .corpo{
                padding-left: 10%;
                padding-right: 10%;
                padding-bottom: 5%;
                padding-top: 1%;
                margin-bottom: 15%;
                text-align: center;
                min-height: 100%;
                background-color: #f4f4f4;
            }
            
            .button {
   background-color: white;
   color: #ffca15;
   border: 3px solid #ffca15;
   margin-top: 5px;
   padding: 10px;
   font-size: 15px;
   cursor: pointer;
   border-radius: 10px;
            
}
.button:link{
    text-decoration: none;
}
.button:visited{
    text-decoration: none;
}
.button:hover {
   background-color: #ffca15;
   color: white
   
}
p{
    font-family: sans-serif;
    font-size: 20px;
}
.inf{
    color: #162E40;
}
.rec{
    border: 3px solid #2B5C7F;
    text-align: left;
    margin-top: 30px;
    margin-bottom: 4%;
    padding: 20px;
    border-radius: 10px;
    color:#162E40;
}
.rec a:link{
    text-decoration: none;
    color: #2B5C7F
}
.rec a:visited{
    text-decoration: none;
    color: #2B5C7F;
}
.email{
    font-size: 18px
}

            @media screen and (max-width: 640px) {
              .corpo{
                padding-left: 5%;
                padding-right:5%;
                padding-bottom: 20%;
            } 
            }
       @media only screen and (max-device-width: 900px) {
           .geral{
               font-size: 25px;
           }
           .button{
               font-size: 30px;
           }
           .email{
    font-size: 30px
}
}
        </style>
    </head>
    <body>
        <div class="geral">
            
        <?php
        include '../commons/header.php';
        include '../commons/menu.php';
        ?>
        
        <div class="corpo">
            <div class="inf">
            <?php
 if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
//Verifico se o usuário está logado no sistema

    echo "<h1>Seja bem-vindo, ".$_SESSION["nomeUsuario"]."! <br>Seus dados:"."</h1>";
    echo "<h2>Email: <label class='email'>".$_SESSION['emailUsuario']."</label></h2>";
    echo "<h2>Escolaridade: ".$_SESSION['nivelUsuario']."º ano do Ensino Médio<h2>";
 }else{
    echo '<script language= "JavaScript">
location.href="index.php";
alert("Você não está logado!");
</script>';
 }
    ?>
            <a class="button"  href="../usuario/editar.php">Editar</a>
            <a class="button" onclick="return confirmacao();">Excluir</a>
            <a class="button" href="../usuario/sair.php" >Sair</a>
            <script language=javascript>
function confirmacao(){
 if (confirm('tem certeza?'))
  location.href='../usuario/excluir.php';
}
</script>
            </div>
<div class="rec">
    <h1>Conteúdos recomendados:</h1>
    <h3>Com base em seus conhecimentos e nível de escolaridade, recomendamos os seguintes conteúdos:</h3>
    <?php
        include '../conexao.php';
    $nivel=$_SESSION['nivelUsuario'];
    $contnsql= "SELECT * FROM conteudo WHERE anoConteudo=$nivel";
    $contn= $db->prepare($contnsql);
    $contn->execute();
    
    while ($rs = $contn->fetch(PDO::FETCH_OBJ)) {
        echo "<a href='../calcsPages/$rs->endConteudo'>+ $rs->nomeConteudo</a><br>";
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




<!DOCTYPE html>
<?php
session_start();
 if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
//Verifico se o usuário está logado no sistema

    echo '<script language= "JavaScript">
location.href="index.php";
alert("Você já está cadastrado!");
</script>';
 }else{
 }?>
<html>
    <style>
         body {
   margin: 0;
   padding: 0;
}
.hero {
   position: relative;
   width: 100vw;
   height: 100vh;
   display: flex;
   justify-content: center;
   align-items: center;
}
.hero::before {
   content: "";
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background: url(/imagens/a.jpg);
   background-repeat: no-repeat;
   background-size: cover;
   background-position: center center;
   filter: rgba(255, 202, 21, 0.8);
}
.hero-content {
   position: relative;
   font-family: "Monserrat", sans-serif;
   color: white;
   text-align: center;
   margin: 0.625rem;
}
.hero-fieldset {
   font-size: 18px;;
   font-weight: 600;
   margin-bottom: 0;
   background-color: rgba(43, 92, 127, 0.8) ;
   border-radius: 12px;
   padding: 10px 50px 50px 50px;
   border:none;
   width: 300px;
   
}
.hero-ia{
    border-radius: 5px;
    border: 2px solid #ffca15;
    padding-left: 5px;
}
.hero-button {
   background-color: #418BC0;
   color: #ffca15;
   border: 2px solid #ffca15;
   margin-top: 5px;
   padding: 10px;
   font-family: "Monserrat", sans-serif;
   font-size: 20px;
   font-weight: bold;
   cursor: pointer;
   border-radius: 10px;
}
.hero-button:hover {
   background-color: #2B5C7F;
   border: 2px solid #ffca15;
}
.hero-link{
    font-size: 12px;
    color: white;
}
h1{
    font-size: 50px;
}@media only screen and (max-device-width: 900px) {
    
    .hero-fieldset{
        zoom: 2
    }
}
    </style>
<head>
    <title>Cadastro</title>
</head>

<body>
    <section class="hero">

    <div class="hero-content">
    
        <fieldset class="hero-fieldset">
            <h1>Cadastro</h1>
            <form action="cadastro.php" method="POST">
                <label>Nome:</label><br>
            <input type="text" name="nome" class="hero-ia" maxlength="40"><br><br>
            <label>Nivel de escolaridade:</label><br>
            <select class="hero-ia" name=ano>
<option value="1" >1° ano do ensino médio</option>
<option value="2">2° ano do ensino médio</option>
<option value="3">3° ano do ensino médio</option>
</select><br><br>
            <label>Email:</label><br>
            <input type="text" name="email" maxlength="60" class="hero-ia"><br><br>
            <label>Senha:</label><br>
            <input type="password" name="senha" maxlength="32" class="hero-ia"><br><br>
            
            <input type="submit" value="Enviar" class="hero-button"><br><br>
            <a href="login.php" class="hero-link">Voltar</a>
            
        </form>
        </fieldset>
         
    
    </div>

</section>
</body>

</html>
<?php include '../conexao.php';

if(!empty($_POST["nome"])) {
$nome = $_POST["nome"];
$ano = $_POST["ano"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
$sqlconf = 'SELECT * FROM usuario WHERE emailUsuario = :email';
            $comando = $db->prepare($sqlconf);
            $parametros=[
                ':email'=> $email,
            ];
            $comando->execute($parametros);
            if($comando->rowCount()>0){
                echo '<script language= "JavaScript">
alert("Email já cadastrado!");
</script>'; 
            }else{
$sql = "INSERT INTO usuario (nomeUsuario, nivelUsuario, emailUsuario, senhaUsuario, idUsuario) VALUES (:nome, :ano, :email, :senha, :id)";
$enviarbanco = $db->prepare($sql);
$enviarbanco->bindValue(":nome",$nome, PDO::PARAM_STR);
$enviarbanco->bindValue(":ano",$ano, PDO::PARAM_STR);
$enviarbanco->bindValue(":email",$email, PDO::PARAM_STR);
$enviarbanco->bindValue(":senha",$senha, PDO::PARAM_STR);
$enviarbanco->bindValue(":id","", PDO::PARAM_STR);
 if ($enviarbanco->execute()) {
     echo '<script language= "JavaScript">
location.href="index.php";
alert("Usuário cadastrado!");
</script>';
 } else {
     echo '<script language= "JavaScript">
alert("Erro ao cadastrar!");
</script>';    
 }
            }
}
 
?>

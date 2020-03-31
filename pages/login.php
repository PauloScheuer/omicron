<?php
session_start();
 if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
//Verifico se o usuário está logado no sistema

    echo '<script language= "JavaScript">
location.href="index.php";
alert("Você já está logado!");
</script>';
 }else{
 }
    ?><!DOCTYPE html>
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
   background: url(../imagens/a.jpg);
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
}
@media only screen and (max-device-width: 900px) {
    
    .hero-fieldset{
        zoom: 2
    }
}
    </style>
<head>
    <title>Login</title>
</head>

<body>
    
    <section class="hero">

    <div class="hero-content">
    
        <fieldset class="hero-fieldset">
            <h1>Login</h1>
            <form action="login.php" method="POST">
                <label>Email:</label><br>
                <input type="text" name="email" maxlength="60" class="hero-ia"><br><br>
            <label>Senha:</label><br>
            <input type="password" name="senha" maxlength="32" class="hero-ia"><br><br>
            <input type="submit" value="Enviar" class="hero-button">
        </form>
            <a href="cadastro.php" class="hero-link">Não possui um cadastro?</a><br>
            <a href="index.php" class="hero-link">Voltar</a>
        </fieldset>
         
    
    </div>

</section>
</body>

</html>
<?php
include "../conexao.php";
if (!empty($_POST['email']) and !empty($_POST['senha'])){
    $email=$_POST['email'];
    $senha= md5($_POST['senha']);
$pdo = "SELECT * FROM usuario WHERE emailUsuario = :email and senhaUsuario = :senha";

$validarlogin = $db->prepare($pdo);
$validarlogin->bindValue(":email", $email);
$validarlogin->bindValue(":senha", $senha);
$validarlogin->execute();

if ($validarlogin->rowCount() == 1) {
    while ($ln = $validarlogin->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['emailUsuario'] = $ln['emailUsuario'];
        $_SESSION['senhaUsuario'] = $ln['senhaUsuario'];
        $_SESSION['nomeUsuario'] = $ln['nomeUsuario'];
        $_SESSION['nivelUsuario'] = $ln['nivelUsuario'];
        $_SESSION['idUsuario'] = $ln['idUsuario'];
        $_SESSION['logado']=TRUE;
        echo '<script language= "JavaScript">
location.href="index.php";
alert("Login efetuado!");
</script>';
    }
}else{
    echo '<script language= "JavaScript">
alert("Erro no login!");
</script>';
}
}
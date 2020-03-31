<?php
session_start();
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Omicron</title>
        <style>
            html, body{
                height: 100%;
            }
            .geral{
                min-height:100%;
                background-color: #f4f4f4;
                position: absolute;
                min-width: 100%;
                color: #162E40;
            }
            .corpo{
                min-height: 100%;
                background-color: #f4f4f4;
                font-family: sans-serif;
                height: auto;
                padding-bottom: 150px;
            }
            .bnd{
                width: auto;
                font-size: 40px;
                max-width: 100%;
                color: #162E40;
                text-align: center;
                padding-top: 50px;
                padding-bottom: 50px;
                letter-spacing: 4px;
                }
            
            .div1{
                    width: auto;
                    max-width: 100%;
                text-align: justify;
                background-color: #418BC0;
                padding: 60px 30px 30px 120px;
                min-height: 300px;
                height: auto;
                overflow: auto;
                }
                .div2{
                    width: auto;
                    max-width: 100%;
                text-align: justify;
                padding: 60px 120px 30px 30px;
                min-height: 300px;
                height: auto;
                overflow: auto;
                }
            .texto{
                font-size: 20px;
            }
            .corpo img{
                max-width:80%;
                max-height:80%;
    width: auto;
    height: auto;
    border-radius: 50%;
            }
            .div2 img{
            }
            .calc{
                float: right;
                width: 25%;
                margin-left: 0px;
                text-align: right;
            }
            .t{
                float: left;
                width: 75%;
                
            }
            .calc2{
                float: left;
                width: 25%;
                text-align: left;
            }
            .t2{
                float: right;
                width: 75%;
            }
            
            @media screen and (max-width: 640px) {
              .corpo{
                min-height: 100%;
            }  
            .calc{
                    float: none;
                    width: 100%;
                    text-align: center;
                }
                .t{
                    float: none;
                    width: 100%;
                }
                
                .calc2{
                    float: none;
                    width: 100%;
                    text-align: center;
                }
                .t2{
                    float: none;
                    width: 100%;
                }
                .corpo img{
                    max-width:250px;
                max-height:250px;
                }
            .div1{
               padding: 50px 20px 50px 20px;
            }
            .div2{
                padding: 50px 20px 50px 20px 
            }
            .div3{
                padding: 50px 20px 50px 20px;
                }
}        @media only screen and (max-device-width: 900px) {
    .corpo{
                min-height: 100%;
            }  
            .calc{
                    float: none;
                    width: 100%;
                    text-align: center;
                }
                .t{
                    float: none;
                    width: 100%;
                }
                
                .calc2{
                    float: none;
                    width: 100%;
                    text-align: center;
                }
                .t2{
                    float: none;
                    width: 100%;
                }
                .corpo img{
                    max-width:250px;
                max-height:250px;
                }
            .div1{
               padding: 50px 20px 50px 20px;
            }
            .div2{
                padding: 50px 20px 50px 20px 
            }
            .div3{
                padding: 50px 20px 50px 20px;
                }
                .bnd p{
    font-size: 80px;
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
            <div class="bnd">
                <p>Bem-vindo ao Omicron Matemática, <?php
                if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
                    echo $_SESSION['nomeUsuario']."!";} else {
    echo 'estudante!';    
}
                ?></p>
            </div>
            
            <div class="div1">
                <div class="t">
                <center><h1>O que é o Omicron?</h1></center>
                <label class="texto">
                    <label style="margin-left:20px;"></label>
                Omicron é uma das 24 letras do alfabeto grego. Ao contrário da grande maioria das outras, nunca foi usada como símbolo
                matemático, devido a sua semelhança com o número 0. Por não simbolizar nenhum cálculo matemático específico, mas ainda 
                fazer parte de um conjunto de símbolos que remete à Matemática, foi a letra escolhida para representar o site.
                </label>
                </div>
                <div class="calc">
                    <img src="../imagens/omic.png" alt="" />
                </div>
            </div>
            
            
            
            <div class="div2">
                <div class="calc2">
                    <img src="../imagens/di.png" alt="" />
                </div>
                <div class="t">
                <center><h1>Qual a proposta do site?</h1></center>
                <label class="texto">
                    <label style="margin-left:20px;"></label>Somos um site voltado ao aprendizado de matemática por alunos do ensino médio
                    com foco na resolução de exercícios através de nossas calculadoras. Através do passo a passo do desenvolvimento dos cálculos, nosso objetivo
                    é auxiliar na compreensão dos mesmos por você, <?php
                    if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
                    echo $_SESSION['nomeUsuario'];} else {
    echo 'estudante';    
}
?>. Além disso, contamos com um fórum de perguntas e respostas, onde você poderá
                    discutir suas dúvidas com outros usuários, podendo até mesmo ajudá-los.
                
                </label>
                </div>
                
            </div>
            <div class="div1">
                <div class="t">
                <center><h1>Você sabia?</h1></center>
                <label class="texto">
                    <label style="margin-left:20px;"></label>
                    Segundo dados do Sistema Nacional de Avaliação da Educação Básica (SAEB), 
                    cerca de 7 em cada 10 alunos que se encontram atualmente no 3º ano do  ensino 
                    médio  estão  em  nível  considerado  insuficiente em matemática. Quer melhorar seu
                    desempenho? Confira nossos textos e calculadoras <a href="calculadoras.php">aqui</a>.
                </label>
                </div>
                <div class="calc">
                    <img src="../imagens/+.png" alt="" />
                </div>
            </div>
        </div>
        <?php
        include '../commons/rodape.php';
            ?>
            </div>
</body>
</html>



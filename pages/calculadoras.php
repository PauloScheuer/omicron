
<?php
session_start();
 if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
//Verifico se o usuário está logado no sistema

    echo "";
 }else{
     echo "";
 }
    ?>
<html>
    <a id="anchor0"></a>
    <head>
        <meta charset="UTF-8">
        <title>Calculadoras</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <style>
            html, body{
                height: 100%;
            }
            .geral{
                min-height: 100%;
                background-color: #f4f4f4;
                position: absolute;
                font-family: sans-serif;
            }
            .corpo{
                padding-left: 10%;
                padding-right:10%;
                padding-top: 2%;
                padding-bottom: 300px;
                text-align: left;
                min-height: 100%;
                background-color: #f4f4f4;
            }
            .botaotop{
            background-color: rgba(55,55,55,0); 
            color: #2B5C7F;
            margin: 5px 5px 0px 5px;
            cursor: pointer;
            padding: 16px;
            font-size: 16px;
            border: 2px solid #418BC0;
            height: 200px;
            width: 300px;
            text-align: left;
        }
        .botaotop:hover{
            border-color: #2B5C7F;
            color: #2B5C7F;
        }
        .botaotop a:link{
            text-decoration: none;
            color: #2B5C7F
        }
        .botaotop a:visited{
            text-decoration: none;
            color: #2B5C7F
        }
        .botaotop a:hover{
            text-decoration: none;
        }
        
        fieldset{
            margin-top: 5px;
            padding: 16px;
            font-size: 16px;
            border: 4px solid #ffca15;
            border-radius: 8px;
            text-align: center;
        }
        h1{
           font-size: 40px;
           color: #162E40
        }
        .btn{
            background-color: #f4f4f4;
	position: fixed;
	float: bottom;
	bottom:  45px;
	right:  15px;
	z-index: 100;
        border-radius: 50px;
        border: 2px solid #162E40;
        cursor: pointer;
        width: 50px;
        height: 50px;
        text-align: center;
}
.btn:hover{
    background-color: #ffca15;
    
   -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -o-transform: scale(1.1);
  -ms-transform: scale(1.1);
  transform: scale(1.1);
}
.acessodiv{
    text-align: center;
}
.acesso{
    background-color: #f4f4f4;
    border: 2px solid #162E40;
    cursor: pointer;
    color: #162E40;
    font-size: 20px;
    padding: 20px;
    margin: 5px;
}
.acesso:hover{
    background-color: #418BC0;
    color: white;
    
   -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -o-transform: scale(1.1);
  -ms-transform: scale(1.1);
  transform: scale(1.1);
}
            @media only screen and (max-device-width: 900px) {
                .acesso{
                    font-size: 35px;
                }
                .botaotop{
                    width: 100%;
                    font-size: 50px;
                    height: auto
                }
                .botaotop img{
                    zoom: 2.5
                }
               .btn{
                    width: 100px;
                    height: 100px;
                }
                .btn img{
                    min-height: 90px;
                    min-width: 90px;
                } 
                h1{
                    font-size: 50px;
                }
}         
        </style>
    </head>
    <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
   $(function() {
	$('a').bind('click',function(){
		var $anchor = $(this);
        
		  $('html,body').stop().animate({scrollTop: $($anchor.attr('href')).offset().top}, 1000,'swing');

		});
	});
        
</script>
        <div class="geral">
        <?php 
        include '../commons/header.php';
        include '../commons/menu.php'; ?>
            <a href="#anchor0" class="btn">
                    <img src="https://img.icons8.com/material/50/000000/collapse-arrow.png"></a>
        <div class="corpo">
            <div class="acessodiv">
            <a href="#anchor1"><button class="acesso">Primeiro ano</button></a>
            <a href="#anchor2"><button class="acesso">Segundo ano</button></a>
            <a href="#anchor3"><button class="acesso">Terceiro ano</button></a>
            </div>
            <a id="anchor1"></a><h1>Primeiro ano</h1>
            <fieldset>
                
                    <button class="botaotop" onclick="location.href='../calcsPages/funcafim.php'">
                        
                        <h2>Função Afim</h2>
                        <img src="formulas/funcafim.gif" alt=""/>
                        <p>Uma função afim, também conhecida como função polinomial de grau 1...</p>
                    </button>
               
                
                    <button class="botaotop" onclick="location.href='../calcsPages/funcquad.php'">
                        
                        <h2>Função Quadrática</h2>
                        <img src="formulas/funcquad.gif" alt=""/>
                        <p>Uma função quadrática, também conhecida como função polinomial de grau 2...</p>
                    </button>
                
                
                    <button class="botaotop" onclick="location.href='../calcsPages/funcexp.php'">
                        <h2>Função Exponencial</h2>
                        <img src="formulas/funcexp.gif" alt=""/>
                        <p>Uma função exponencial é a função que possui a variável no seu expoente...</p>
                    </button>
                
                <button class="botaotop" onclick="location.href='../calcsPages/funclog.php'">
                        <h2>Função Logarítmica</h2>
                        <img src="formulas/funclog.gif" alt=""/>
                        <p>Uma função logarítmica é a função que funciona de forma inversa da exponencial...</p>
                    </button>
                
                
                
                <button class="botaotop" onclick="location.href='../calcsPages/nprogressao(a).php'">
                        <h2>PA - termo geral</h2>
                        <img src="formulas/pageral.gif" alt=""/>
                        <p>Uma PA, ou progressão aritmética, é uma sequência que aumenta de forma linear...</p>
                   </button>
                
                
                    <button class="botaotop" onclick="location.href='../calcsPages/somaprogressao(a).php'">
                        <h2>PA - soma</h2>
                        <img src="formulas/pasoma.gif" alt=""/>
                        <p>Uma PA, ou progressão aritmética, é uma sequência...</p>
                    </button>
               
                
                    <button class="botaotop" onclick="location.href='../calcsPages/nprogressao(g).php'">
                        <h2>PG - termo geral</h2>
                        <img src="formulas/pggeral.gif" alt=""/>
                        <p>Uma PG, ou progressão geométrica, é uma sequência que aumenta de forma exponencial...</p>
                   </button>
                
               
                    <button class="botaotop" onclick="location.href='../calcsPages/somaprogressao(g).php'">
                        <h2>PG - soma</h2>
                        <img src="formulas/pgsoma.gif" alt=""/>
                        <p>Uma PG, ou progressão geométrica, é uma sequência...</p>
                   </button>
                
               
                    <button class="botaotop" onclick="location.href='../calcsPages/somainfprogressao(g).php'">
                        <h2>PG - soma infinita</h2>
                        <img src="formulas/pgsomainf.gif" alt=""/>
                        <p>Uma PG, ou progressão geométrica, é uma sequência...</p>
                    </button>
            </fieldset>
            <a id="anchor2"></a><h1>Segundo ano</h1>
            <fieldset>
                
                    <button class="botaotop" onclick="location.href='../calcsPages/arranjo.php'">
                        <h2>Arranjo</h2>
                        <img src="formulas/arranjo.gif" alt=""/>
                        <p>Um arranjo é um agrupamento de p elementos tomados...</p>
                    </button>
                
                
                    <button class="botaotop" onclick="location.href='../calcsPages/combinação.php'">
                        <h2>Combinação</h2>
                        <img src="formulas/combinação.gif" alt=""/>
                        <p>Uma combinação é um agrupamento de p elementos tomados...</p>
                   </button>
                
                
                   
                 <button class="botaotop" onclick="location.href='../calcsPages/probabilidade.php'">
                        <h2>Probabilidade</h2>
                        <img src="formulas/probabilidade.gif" alt=""/>
                        <p>A probabilidade é a razão entre os eventos favoráveis...</p>
                    </button> 
               
                
                    <button class="botaotop" onclick="location.href='../calcsPages/pitagoras.php'">
                        <h2>Pitágoras</h2>
                        <img src="formulas/pitagoras.gif" alt=""/>
                        <p>A fórmula de pitágoras é responsável por relacionar os lados de um triângulo retângulo...</p>
                    </button>
                
                <button class="botaotop" onclick="location.href='../calcsPages/functrig.php'">
                        <h2>Função trigonométrica</h2>
                        <img src="formulas/functrig.gif" alt=""/>
                        <p>As funções trigonométricas são funções relacionadas ao círculo trigonométrico...</p>
                   </button>
                <button class="botaotop" onclick="location.href='../calcsPages/radgrau.php'">
                        <h2>Radiano e grau</h2>
                        <img src="formulas/radgrau.gif" alt=""/>
                        <p>Radiano e grau são duas medidas que se relacionam dentro de um círculo trigonométrico...</p>
                   </button>
                   
               
            </fieldset>
            <a id="anchor3"></a><h1>Terceiro ano</h1>
            <fieldset>
                
                    <button class="botaotop" onclick="location.href='../calcsPages/jurossimples.php'">
                        <h2>Juros Simples</h2>
                        <img src="formulas/jurossimples.gif" alt=""/>
                        <p>Os juros são uma forma de remuneração ou compensação, sendo os juros simples...</p>
                    </button>
                
                
                    <button class="botaotop" onclick="location.href='../calcsPages/juroscomposto.php'">
                        <h2>Juros Compostos</h2>
                        <img src="formulas/juroscomposto.gif" alt=""/>
                        <p>Os juros são uma forma de remuneração ou compensação, sendo os juros compostos...</p>
                     </button>
               
               
                    <button class="botaotop" onclick="location.href='../calcsPages/pontosdist.php'"> 
                        <h2>Pontos Distantes</h2>
                        <img src="formulas/pontosdist.gif" alt=""/>
                        <p>Em um plano cartesiano, a distância entre dois pontos é dada com a utilização da fórmula de...</p>
                    </button>
                
                
                    <button class="botaotop" onclick="location.href='../calcsPages/pontosali.php'">
                        <h2>Pontos Alinhados</h2>
                        <img src="formulas/pontosali.gif" alt=""/>...
                        <p>Em um plano cartesiano, a verificação do alinhamento entre três pontos é feita através...</p>
                    </button>
                <button class="botaotop" onclick="location.href='../calcsPages/media.php'">
                        <h2>Média</h2>
                        <img src="formulas/media.gif" alt=""/>
                        <p>Dentro da estatística, a média é uma medida de...</p>
                    </button>
                <button class="botaotop" onclick="location.href='../calcsPages/moda.php'">
                        <h2>Moda</h2>
                        <p>Sem fórmula :(</p>
                        <br><p>Dentro da estatística, a moda é uma medida de...</p>
                    </button>
                <button class="botaotop" onclick="location.href='../calcsPages/mediana.php'">
                        <h2>Mediana</h2>
                        <img src="formulas/mediana.gif" alt=""/>
                        <p>Dentro da estatística, a mediana é uma medida de...</p>
                    </button>
            </fieldset>
        </div>
        <?php
        include '../commons/rodape.php';
            ?>
        </div>
    </body>
</html>


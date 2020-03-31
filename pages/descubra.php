
<?php
session_start();
 
    ?>
<html>
    <a id="anchor0"></a>
    <head>
        <meta charset="UTF-8">
        <title>Descubra+</title>
        <style>
            html, body{
                height: 100%;
            }
            .geral{
                min-height:200%;
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
                padding-bottom: 140px;
                padding-top: 50px;
            }
            .bnd{
                width: auto;
                font-size: 40px;
                max-width: 100%;
                color: #162E40;
                text-align: center;
                padding-top: 10px;
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
                padding-bottom: 40px;
            }
            .calc2{
                float: left;
                width: 25%;
                text-align: left;
            }
            .t2{
                float: right;
                width: 75%;
                padding-bottom: 40px;
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
                .corpo img{
                    max-width:250px;
                max-height:250px;
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
                .corpo img{
                    max-width:250px;
                max-height:250px;
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
            .div1{
               padding: 50px 20px 50px 20px;
            }
            .div2{
                padding: 50px 20px 50px 20px 
            }
            .div3{
                padding: 50px 20px 50px 20px;
                }
                .btn{
                    width: 100px;
                    height: 100px;
                }
                .btn img{
                    min-height: 90px;
                    min-width: 90px;
                }
                .bnd p{
    font-size: 80px;
}
.acesso{
    font-size: 30px;
}
}
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
   $(function() {
	$('a').bind('click',function(){
		var $anchor = $(this);
        
		  $('html,body').stop().animate({scrollTop: $($anchor.attr('href')).offset().top}, 1000,'swing');

		});
	});
        
</script>
    </head>
    <body>
        <?php include '../commons/header.php';
        include '../commons/menu.php';
        ?>
        <div class="geral">
            <a href="#anchor0" class="btn">
                    <img src="https://img.icons8.com/material/50/000000/collapse-arrow.png"></a>
        <div class="corpo">
            
            
            <div class="bnd">
                <p>Grandes matemáticos pela história</p>
                <div class="acessodiv">
            <a href="#anchor1"><button class="acesso">Pitágoras</button></a>
            <a href="#anchor2"><button class="acesso">Euclides</button></a>
            <a href="#anchor3"><button class="acesso">Arquimedes</button></a>
            <a href="#anchor4"><button class="acesso">Euler</button></a>
            <a href="#anchor5"><button class="acesso">Descartes</button></a>
            </div>
            </div>
            
            <a id="anchor1"></a><div class="div1">
                <div class="t">
                <center><h1>Pitágoras</h1></center>
                <label class="texto">
                    <label style="margin-left:20px;"></label>
                    Pitágoras foi um filósofo e matemático pré-socrático, nascido em 570 a.C. na ilha grega de Samos. 
                    Durante sua formação, foi orientado por ninguém menos que Tales de Mileto (considerado o primeiro
                    filósofo, pelo menos no ocidente). Por conta de suas idéias fora do padrão da época, foi perseguido
                    e fugiu para a Crotona, fundando lá a Escola Pitagórica, uma escola não apenas matemática, mas com
                    preceitos místicos e espirituais.
                    <br><label style="margin-left:20px;"></label>Em um experimento com cordas, seus tamanhos e o som produzido ao serem tocadas, Pitágoras
                    chegou a relações matemáticas agradáveis ao ouvido humano, criando assim escalas musicais.
                    Esse experimentou corroborou com a criação de sua teoria de que os números eram a essência de todas 
                    as coisas. 
                    <br><label style="margin-left:20px;"></label>Após um tempo, Pitágoras foi novamente perseguido, fugindo dessa vez para o Egito. Foi lá que,
                    ao observar as pirâmides, criou o famoso <a href="pitágoras">Teorema de Pitágoras</a>. Acabou morrendo, ao 80
                    anos no sul da Itália, em Metaponto.
                </label>
                </div>
                <div class="calc">
                    <img src="../matematicos/pitagoras.jpg" alt="" />
                </div>
            </div>
            
            
            
            <a id="anchor2"></a><div class="div2">
                <div class="calc2">
                    <img src="../matematicos/euclides.jpg" alt="" />
                </div>
                <div class="t">
                <center><h1>Euclides</h1></center>
                <label class="texto">
                    <label style="margin-left:20px;"></label>
                    Euclides foi um filósofo e matemático nascido na Síria, em 330 a.C. e conhecido como <i>O pai da geometria</i>.
                    Sobre sua vida e trajetória, pouco se sabe, pois as referências a ele somente foram feitas séculos após sua
                    morte (cuja data também não é conhecida). A principal referência foi a feita por Proclo, que atribuiu a Euclides
                    a autoria da obra <i>Os elementos</i>, com enorme importância para a matemática. Esta e outras obras suas sobreviveram
                    (mesmo que de forma parcial) até hoje e são consideradas alguns dos mais antigos tratados científicos gregos.
                    <br><label style="margin-left:20px;"></label>
                    Embora grande parte daquilo exposto por Euclides em Os Elementos seja conhecimentos e demonstrações de ideias de
                    outros matemáticos anteriores a ele, Euclides foi quem conseguiu organizar tudo em algo lógico, criando assim
                    a base para o ensino da geometria até o início do século XX.
                
                </label>
                </div>
                
            </div>
            <a id="anchor3"></a><div class="div1">
                <div class="t">
                <center><h1>Arquimedes</h1></center>
                <label class="texto">
                    <label style="margin-left:20px;"></label>
                    Arquimedes foi um matemático, físico e inventor nascido e falecido em Siracusa,
                    na Sicília, nos anos respectivos de 287 a.C e 212 a.C, quando forças romanas capituraram sua cidade natal.
                    <br><label style="margin-left:20px;"></label>Apesar de ser conhecido popularmente como um exímio inventor, Arquimedes foi também um grande matemático,
                    considerado inclusive um dos maiores da história. É dito que, se os gregos tivessem um sistema numérico mais
                    avançado, Arquimedes poderia ter inventado o cálculo. 
                    <br><label style="margin-left:20px;"></label>Uma das demonstrações de seu conhecimento foi a utilização
                    do método da exaustão para a aproximação do pi, chegando em seu valor de forma bastante aproximada (entre 3,1408 e 3,1429
                    enquanto o conhecido hoje é cerca de 3,1416).
                </label>
                </div>
                <div class="calc">
                    <img src="../matematicos/arquimedes.jpg" alt="" />
                </div>
            </div>
            
           <a id="anchor4"></a><div class="div2">
                <div class="calc2">
                    <img src="../matematicos/euler.jpg" alt="" />
                </div>
                <div class="t">
                <center><h1>Euler</h1></center>
                <label class="texto">
                    <label style="margin-left:20px;"></label>
                    Leonard Euler foi um matemático suiço nascido em 1707, na Basiléia. Além de matemática,
                    estudou também teologia e medicina. É considerado o matemático que mais produziu na história,
                    contando 866 livros e artigos publicados. Seu esforço nos estudos foi tamanho que, aliado ao
                    frio da Rússia, ondeu morou parte da sua vida, gerou uma saúde debilitada que resultou por fim 
                    na perca de sua visão.
                    <br><label style="margin-left:20px;"></label>
                    Foi o responsável pelo refinamento da noção de uma função matemática, criando também várias notações
                    matemáticas usados atualmente, como o π (pi) e o <i>e</i>, que frequentemente é chamado de constante de Euler
                    , em sua homenagem.
                    <br><label style="margin-left:20px;"></label>
                    Morreu em 1783, em sua segunda passagem pela Rússia. Sua contribuição com artigos científicos foi tão grande
                    que mesmo após seu falecimento a Academia de São Petersburgo continuou os publicando por 50 anos.
                </label>
                </div>
                
            </div>
            
           <a id="anchor5"></a><div class="div1">
                <div class="t">
                <center><h1>Descartes</h1></center>
                <label class="texto">
                    <label style="margin-left:20px;"></label>
                    René Descartes foi um pensador francês nascido em 1596. Suas contribuições passas pela matemática, filosofia
                    e até mesmo medicina. É conhecido tanto como <i>Pai da filosofia moderna</i>, quanto por <i>Pai da matemática
                    moderna</i>.
                    <br><label style="margin-left:20px;"></label>
                    Sua principal contribuição para a matemática foi ter sugerido a união entre a álgebra e a geometria, gerando
                    assim o campo da geometria análitica e de um sistema de coodenadas com seu nome, o espaço cartesiano. As ideias
                    que contribuiram com esse surgimento estão no texto <i>Geometria</i>, em sua obra <i>Discurso do método</i>.
                </label>
                </div>
                <div class="calc">
                    <img src="../matematicos/descartes.jpeg" alt="" />
                </div>
            </div>
        </div>
        <?php
        include '../commons/rodape.php';
            ?>
            </div>
</body>
</html>

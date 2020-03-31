<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Combinação</title>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
        
        <style>
            <?php            
            include '../styles/calcs.css';
            ?>        
        </style>
        <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    </head>
    <body>
        
        <div class="geral">
            <?php
            include '../commons/header.php';
            include '../commons/menu.php';
            ?>
    
        <div class="corpo">
            <center>
        <h1>Combinação</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p><label style="margin-left:20px;"></label>
                Uma combinação é um agrupamento de <i>p</i> elementos dentro de um conjunto de <i>n</i> elementos. Uma propriedade
                importante de uma combinação é que nela, a ordem dos elementos não importa, e por isso, precisa-se tomar cuidado
                ao escolher se esse é o melhor cálculo a ser utilizado para a situação. 
                <br><label style="margin-left:20px;"></label>
                Um exemplo de situação onde é necessário
                usar combinação é ao se calcular o número de jogos possíveis a se fazer ao apostar na mega-sena. Para responder essa
                pergunta, deve-se perceber que um jogo com 1,2,3,4,5,6 e outro 2,3,4,5,6,1 são iguais perante ao jogo
                e portanto, trata-se de uma combinação.
                <br><label style="margin-left:20px;"></label>
                A fórmula para o arranjo é de n!/(p!(n-p)!), onde n é o número total de elementos de um conjuto e p o tamanho do agrupamento.
                No exemplo acima, teria-se que n=60 e p=6, pois temos 60 algarismos utilizáveis (n) e o conjunto formado terá tamanho 6 (p). Você
                pode conferir a resposta para esse problema utilizando nossa calculadora.
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="combinação.php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>C<sub>n,p</sub>=</label>
            <input type="text" name="c" class="ia"><br><br>
            <label>n=</label>
            <input type="text" name="n" class="ia"><br><br>
            <label>p=</label>
            <input type="text" name="p" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        include '../coisas.php';
        if(!empty($_GET['c'])or!empty($_GET['n'])or!empty($_GET['p'])){
        if(is_numeric($_GET['c'])or is_numeric($_GET['n'])or is_numeric($_GET['p'])){
            $c=$_GET['c'];
        $n=$_GET['n'];
        $p=$_GET['p'];
            if(is_numeric($c) and is_numeric($n) and empty($p)){
                if(ctype_digit($c) and $c>=1){
                    $nfat= calcular($n);
                    $div= $nfat/$c;
                    $rev= revert($div);
                    $sub=$n-$rev;
               echo "Fórmula: "
            . "<div lang='latex'>C =\dfrac{n!}{p!(n-p)!}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$c=\dfrac{ $n!}{p!( $n-p)!}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$c=\dfrac{ $nfat}{p!( $n-p)!}</div><br>"
                    . "<div lang='latex'>\dfrac{ $nfat}{ $c}=p!( $n-p)!</div><br>"
                    . "<div lang='latex'>$div=p!( $n-p)!</div><br>";
                   echo "Impossível continuar";
                    }else{
                        echo 'N e p devem ser inteiros, além de que n deve ser maior que p';
                    }
            }elseif (is_numeric($c) and is_numeric($p) and empty($n)) {
                if(ctype_digit($c) and $c>=1 and ctype_digit($p)){
                    $pfat= calcular($p);
                    $multi=$c*$pfat;
                    $desm= desmont(1, $p);
                    $desm2 = cortar(1, $p);
               echo "Fórmula: "
            . "<div lang='latex'>C =\dfrac{n!}{ p!(n-p)!}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$c=\dfrac{ n!}{ $p!( n-$p)!}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$c=\dfrac{ $desm!}{ $pfat(n-$p)!}</div><br>"
                    . "<div lang='latex'>$c=\dfrac{ $desm2}{ $pfat}</div><br>"
                    . "<div lang='latex'>$c*$pfat=$desm2</div><br>"
                    . "<div lang='latex'>$desm2=$c*$pfat</div><br>"
                    . "<div lang='latex'>$desm2=$multi</div><br>";
               if($p>2){
                   echo "Como você pode ver, está conta será enorme, demandando conhecimentos que "
                   . "não são requeridos no ensino médio.";
               }else{
                   echo "<div lang='latex'>n^2-n-$multi=0</div><br>"
                           ."Temos agora uma equação de segundo grau:"."<br>";
                           $d=1-(4*-$multi);
                           $raizd= sqrt($d);
        echo "<div lang='latex'>\Delta=b^2-4.a.c</div><br>"
                           . "<div lang='latex'>\Delta=1^2-4.(-1).$multi</div>."
                . "<div lang='latex'>\Delta=$d</div>"
                    . "<div lang='latex'>x= {-b \pm \sqrt{\Delta} \over 2.a}</div>"
                ."<div lang='latex'>x={-(-1) \pm \sqrt{$d} \over 2.1}</div>".
                        "<div lang='latex'>x={-(-1) \pm $raizd \over 2.1}</div>";
        $x1= ((1)+(sqrt($d)))/(2);
        echo "<div lang='latex'>x'=$x1</div>";
                    }
                }else{
                        echo 'N e p devem ser inteiros, além de que n deve ser maior que p';
                    }
                }elseif(is_numeric($n) and is_numeric($p) and empty($c)){
                    if(ctype_digit($n) and $n>=1 and ctype_digit($p) and $p<=$n){
                    $sub=$n-$p;
                    $othersub=$n-$sub;
                    $a=1;
                    $n2=$n;
                    while ($a<$othersub){
                        $n2--;
                        $a++;
                    }
                    $n3=$n;
                    $nfat2=$n;
                    $nfat=$n;
                    while ($n2<$n3){
                        $controle=$n3-1;
                        $nfat.=".$controle";
                        $nfat2*=$controle;
                        $n3--;
                    }
                    $pfat= calcular($p);
                    $div= $nfat2/$pfat;
               echo "Fórmula: "
            . "<div lang='latex'>C =\dfrac{n!}{p!(n-p)!}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>C=\dfrac{ $n!}{ $p!( $n-$p)!}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>C=\dfrac{ $n!}{ $pfat*$sub!}</div><br>"
                       . "<div lang='latex'>C=\dfrac{ $nfat}{ $pfat}</div><br>"
                       . "<div lang='latex'>C=\dfrac{ $nfat2}{ $pfat}</div><br>"
                       . "<div lang='latex'>C=$div</div>";
                    }else{
                        echo 'N e p devem ser inteiros, além de que n deve ser maior que p';
                    }
                }else{
                    echo "Você deve deixar um campo vazio e preencher os outros dois";
                }
         }else{
           echo "Os valores devem ser numéricos" ;
        }
        }else{
            echo "Insira os valores";
        }
        ?>
        </fieldset><br><br><br><br>
        </div>
            <div class="forum"><h3>Perguntas e respostas:</h3>
                <fieldset class="fieldsetex"> 
           <?php
            include "../conexao.php";
            include '../forum/lerPerg.php';
            include '../forum/inPerg.php';
          
            lerPerg(11,"combinação.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "combinação.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "combinação.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>
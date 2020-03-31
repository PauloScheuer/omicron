<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arranjo</title>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/calcs.css" />
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
        <h1>Arranjo</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p><label style="margin-left:20px;"></label>
                Um arranjo é um agrupamento de <i>p</i> elementos dentro de um conjunto de <i>n</i> elementos. Uma propriedade
                importante de um arranjo é que nele, a ordem dos elementos faz diferença, e por isso, precisa-se tomar cuidado
                ao escolher se esse é o melhor cálculo a seer utilizado para a situação. 
                <br><label style="margin-left:20px;"></label>
                Um exemplo de situação onde é necessário
                usar arranjo é na pergunta: Quantos números de 3 algarismos pode-se formar com os algarismos 1,2 e 3. Para responder essa
                pergunta, deve-se atentar que 123 é diferente de 321, e portanto, trata-se de um arranjo.
                <br><label style="margin-left:20px;"></label>
                A fórmula para o arranjo é de n!/(n-p)!, onde n é o número total de elementos de um conjuto e p o tamanho do agrupamento.
                No exemplo acima, teria-se que n=3 e p=3, pois temos 3 algarismos utilizáveis (n) e o conjunto formado terá tamanho 3 (p). Você
                pode conferir a resposta para esse problema utilizando nossa calculadora.
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="arranjo.php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>A<sub>n,p</sub>=</label>
            <input type="text" name="a" class="ia"><br><br>
            <label>n=</label>
            <input type="text" name="n" class="ia"><br><br>
            <label>p=</label>
            <input type="text" name="p" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        include '../coisas.php';
        if(!empty($_GET['a'])or!empty($_GET['n'])or!empty($_GET['p'])){
        if(is_numeric($_GET['a'])or is_numeric($_GET['n'])or is_numeric($_GET['p'])){
            $a=$_GET['a'];
        $n=$_GET['n'];
        $p=$_GET['p'];
            if(is_numeric($a) and is_numeric($n) and empty($p)){
                if(ctype_digit($a) and $a>=1){
                    $nfat= calcular($n);
                    $div= $nfat/$a;
                    $rev= revert($div);
                    $sub=$n-$rev;
               echo "Fórmula: "
            . "<div lang='latex'>a =\dfrac{n!}{(n-p)!}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$a=\dfrac{ $n!}{( $n-p)!}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$a=\dfrac{ $nfat}{ ($n-p)!}</div><br>"
                    . "<div lang='latex'>$a.($n-p)!=$nfat</div><br>"
                    . "<div lang='latex'>($n-p)!=\dfrac{ $nfat}{ $a}</div><br>"
                    ."<div lang='latex'>($n-p)!=$div</div><br>"
                       ."<div lang='latex'>($n-p)!=$rev!</div><br>"
                       ."<div lang='latex'>$n-p=$rev</div><br>"
                       ."<div lang='latex'>$n-$rev=p</div><br>"
                       ."<div lang='latex'>p=$n-$rev</div><br>"
                       ."<div lang='latex'>p=$sub</div><br>";
                    }else{
                        echo 'N e p devem ser inteiros, além de que n deve ser maior que p';
                    }
            }elseif (is_numeric($a) and is_numeric($p) and empty($n)) {
                if(ctype_digit($a) and $a>=1 and ctype_digit($p)){
                    
                    $desm= desmont(1, $p);
                    $desm2 = cortar(1, $p);
               echo "Fórmula: "
            . "<div lang='latex'>a =\dfrac{n!}{(n-p)!}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$a=\dfrac{ n!}{( n-$p)!}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$a=\dfrac{ $desm!}{ (n-$p)!}</div><br>"
                    . "<div lang='latex'>$a=$desm2</div><br>";
               if($p>2){
                   echo "Como você pode ver, está conta será enorme, demandando conhecimentos que "
                   . "não são requeridos no ensino médio.";
               }else{
                   echo "<div lang='latex'>$a=n^2-n</div><br>"
                           ."<div lang='latex'>n^2-n-$a=0</div><br>"
                           ."Temos agora uma equação de segundo grau:"."<br>";
                           $d=1-(4*-$a);
                           $raizd= sqrt($d);
        echo "<div lang='latex'>\Delta=b^2-4.a.c</div><br>"
                           . "<div lang='latex'>\Delta=1^2-4.(-1).$a</div>."
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
                }elseif(is_numeric($n) and is_numeric($p) and empty($a)){
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
               echo "Fórmula: "
            . "<div lang='latex'>a =\dfrac{n!}{(n-p)!}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>a=\dfrac{ $n!}{( $n-$p)!}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>a=\dfrac{ $n!}{ $sub!}</div><br>"
                       . "<div lang='latex'>a= $nfat</div><br>"
                       . "<div lang='latex'>a=$nfat2</div>";
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
          
            lerPerg(10,"arranjo.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "arranjo.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "arranjo.php");
            }
            ?> 
            </fieldset>
            </div> 
        </div>
            
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>
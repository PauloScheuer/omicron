<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PG - soma</title>
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
        
        <div class="geral"><?php
    include '../commons/header.php';
    include '../commons/menu.php'; ?>
    
        <div class="corpo">
            <center>
        <h1>PG - soma</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
           <p><label style="margin-left:20px;"></label>
                Uma PG, ou progressão geométrica, é um tipo de sequência que cresce conforme uma razão <i>q</i>. Essa
                razão representa a divisão entre cada termo e seu anterior na sequência. Além de q, outros elementos em uma
                PG são o n (número de termos), o a<sub>1</sub> (termo inicial) e o a<sub>n</sub>, o termo geral. 
                 <br><label style="margin-left:20px;"></label>
                 Nessa página,
                 será abordado o cálculo da soma dos termos de uma PG finita, dada pela seguinte fórmula:
                 S<sub>n</sub> = (a<sub>1</sub>*(q<sup>n</sup>-1))/(q-1). Nota-se que o valor de a<sub>n</sub> não é necessário para esse cálculo.
                <br><label style="margin-left:20px;"></label>
                Uma PG pode ser crescente, constante, decrescente, oscilante ou quase nula. Para ser crescente, é necessário que o primeiro termo
                seja positivo, assim como a razão, ou que o primeiro termo seja negativo e a razão entre 0 e 1. Para ser contante sua razão deve
                ser 1 ou indeterminada (como em uma sequência 0,0,0,...,0). No caso de uma PG decrescente, tem-se o contrário da crescente, com ou
                o primeiro termo positivo e a razão entre 0 e 1, ou o primeiro termo negativo e a razão negativa. Em caso de razão negativa
                a PG será oscilante, pois temos que positivo*negativo = negativo e negativo*negativo = positivo. Por fim, uma PG quase nula é
                aquela em que o primeiro termo é diferente de zero e os restantes são iguais a zero.
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="somaprogressao(g).php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>S<sub>n</sub>=</label>
            <input type="text" name="sn" class="ia"><br><br>
            <label>a<sub>1</sub>=</label>
            <input type="text" name="a1" class="ia"><br><br>
            <label>q=</label>
            <input type="text" name="q" class="ia"><br><br>
            <label>n=</label>
            <input type="text" name="n" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        if(!empty($_GET['a1'])or!empty($_GET['n'])or!empty($_GET['sn'])or!empty($_GET['q'])){
        if(is_numeric($_GET['a1'])or is_numeric($_GET['n'])or is_numeric($_GET['sn'])or is_numeric($_GET['q'])){
        $a1=$_GET['a1'];
        $n=$_GET['n'];
        $sn=$_GET['sn'];
        $q=$_GET['q'];
        
        if(is_numeric($a1)and is_numeric($n) and is_numeric($q)and empty($sn)){
            if(ctype_digit($n) and $n>0){
            $sub=$q-1;
            $pot= pow($q,$n);
            $sub2=$pot-1;
            $multi=$a1*$sub2;
            $div=$multi/$sub;
            echo "Fórmula:"
            . "<br><br><div lang='latex'>S_{n}=\dfrac{a_{1}*(q^{n}-1)}{q-1}</div><br>"
                    . "Nesse caso, temos:"
                    . "<br><br><div lang='latex'>S_{ $n}=\dfrac{ $a1*($q^{ $n}-1)}{ $q-1}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<br><br><div lang='latex'>S_{ $n}=\dfrac{ $a1*($pot-1)}{ $sub}</div><br>"
                    . "<div lang='latex'>S_{ $n}=\dfrac{ $a1*($sub2)}{ $sub}</div><br>"
                    . "<div lang='latex'>S_{ $n}=\dfrac{ $multi}{ $sub}</div><br>"
                    . "<div lang='latex'>S_{ $n}=$div</div>";
            }else{
                echo 'N deve ser um inteiro maior que 0';
            }
        }elseif (is_numeric($q)and is_numeric($n) and is_numeric($sn)and empty($a1)) {
            if(ctype_digit($n) and $n>0){
            $sub=$q-1;
            $pot= pow($q,$n);
            $sub2=$pot-1;
            $div=$sub2/$sub;
            $div2=$sn/$div;
            echo "Fórmula:"
            . "<br><br><div lang='latex'>S_{n}=\dfrac{a_{1}*(q^{n}-1)}{q-1}</div><br>"
                    . "Nesse caso, temos:"
                    . "<br><br><div lang='latex'>$sn=\dfrac{a1*($q^{ $n}-1)}{ $q-1}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<br><br><div lang='latex'>$sn=\dfrac{a1*($pot-1)}{ $sub}</div><br>"
                    . "<div lang='latex'>$sn=\dfrac{a1*($sub2)}{ $sub}</div><br>"
                    . "<div lang='latex'>$sn=a_{1}*$div</div><br>"
                    . "<div lang='latex'>\dfrac{ $sn}{ $div}=a_{1}</div><br>"
                    . "<div lang='latex'>a_{1}=\dfrac{ $sn}{ $div}</div><br>"
                    . "<div lang='latex'>a_{1}=$div2</div><br>";
            }else{
                echo 'N deve ser um inteiro maior que 0';
        }}elseif (is_numeric($a1)and is_numeric($n) and is_numeric($sn)and empty($q)) {
            if(ctype_digit($n) and $n>0){
            $div= $sn/$a1;
            echo "Fórmula:"
            . "<br><br><div lang='latex'>S_{n}=\dfrac{a_{1}*(q^{n}-1)}{q-1}</div><br>"
                    . "Nesse caso, temos:"
                    . "<br><br><div lang='latex'>$sn=\dfrac{ $a1*(q^{ $n}-1)}{ q-1}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<br><br><div lang='latex'>\dfrac{ $sn}{ $a1}=\dfrac{ q^{ $n}-1}{ q-1}</div><br>"
                    . "<div lang='latex'>$div=\dfrac{ q^{ $n}-1}{ q-1}</div><br>"
                    . "Desculpe, não é possível calcular após isso.";
            }else{
                echo 'N deve ser um inteiro maior que 0';
            }
            }elseif (is_numeric($q)and is_numeric($a1) and is_numeric($sn)and empty($n)) {
                $sub=$q-1;
                $div=$sn/$a1;
                $multi=$div*$sub;
                $soma=$multi+1;
                $log= log($soma, $q);
                function isInteger($input){
    return(ctype_digit(strval($input)));
}
            if($log<=0 or (!isInteger($log))){
                echo 'Não existe essa PG';
            }else{
            echo "Fórmula:"
            . "<br><br><div lang='latex'>S_{n}=\dfrac{a_{1}*(q^{n}-1)}{q-1}</div><br>"
                    . "Nesse caso, temos:"
                    . "<br><br><div lang='latex'>$sn=\dfrac{ $a1*($q^{n}-1)}{ $q-1}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<br><br><div lang='latex'>\dfrac{ $sn}{ $a1}=\dfrac{($q^{n}-1)}{ $sub}</div><br>"
                    . "<div lang='latex'>$div*$sub=$q^{n}-1</div><br>"
                    . "<div lang='latex'>$multi=$q^{n}-1</div><br>"
                    . "<div lang='latex'>$multi+1=$q^{n}</div><br>"
                    . "<div lang='latex'>$soma=$q^{n}</div><br>"
                    . "<div lang='latex'>$q^{n}=$soma</div><br>"
                    . "<div lang='latex'>\log_{ $q}{ $soma}=n</div><br>"
                    . "<div lang='latex'>n=\log_{ $q}{ $soma}</div><br>"
                    . "<div lang='latex'>n=$log</div><br>";
            }
           }else{
                    echo "Você deve deixar um campo vazio e preencher os outros três";
                }
        } else {
           echo "Os valores devem ser númericos" ;
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
          
            lerPerg(8,"somaprogressao(g).php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "somaprogressao(g).php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "somaprogressao(g).php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>
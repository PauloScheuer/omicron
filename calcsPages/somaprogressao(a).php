<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PA - soma</title>
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
        <h1>PA - soma</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p><label style="margin-left:20px;"></label>
                Uma PA, ou progressão aritmética, é um tipo de sequência que cresce conforme uma razão <i>r</i>. Essa
                razão representa a diferença entre cada termo e seu anterior na sequência. Além de r, outros elementos em uma
                PA são o n (número de termos), o a<sub>1</sub> (termo inicial) e o a<sub>n</sub>, o termo geral. 
                 <br><label style="margin-left:20px;"></label>
                 Nessa página,
                 será abordado o cálculo da soma dos termos de uma PA, dada pela seguinte fórmula:
                 S<sub>n</sub> = (a<sub>1</sub>+a<sub>n</sub>).n/2. Nota-se que a razão r não é necessária para esse cálculo.
                <br><label style="margin-left:20px;"></label>
                O cálculo da soma pode ser deduzido através da seguinte maneira: escreve-se todos os termos da sequência em sua
                ordem correta. Assim, pode-se observar que a soma do primeiro com o último será igual a do segundo com o penúltimo,
                e assim por diante. Então, basta multiplicar essa soma pelo número de termos e dividir por dois, para descontar as
                somas repetidas.
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="somaprogressao(a).php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>S<sub>n</sub>:</label>
            <input type="text" name="sn" class="ia"><br><br>
            <label>a<sub>n</sub>:</label>
            <input type="text" name="an" class="ia"><br><br>
            <label>a<sub>1</sub>:</label>
            <input type="text" name="a1" class="ia"><br><br>
            <label>n:</label>
            <input type="text" name="n" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        if(!empty($_GET['an'])or!empty($_GET['a1'])or!empty($_GET['n'])or!empty($_GET['r'])){
        if(is_numeric($_GET['an'])or is_numeric($_GET['a1'])or is_numeric($_GET['n'])or is_numeric($_GET['sn'])){
        $an=$_GET['an'];
        $a1=$_GET['a1'];
        $n=$_GET['n'];
        $sn=$_GET['sn'];
        
        if(is_numeric($a1) and is_numeric($n) and is_numeric($an)and empty($sn)){
            if(ctype_digit($n) and $n>0){
            $soma=$a1+$an;
            $multir=$soma*$n;
            $div=$multir/2;
            echo "Fórmula: "
            . "<div lang='latex'>S_{n}=\dfrac{(a_{1}+a_{n})n}{2}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>S_{ $n}=\dfrac{($a1+$an)$n}{2}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>S_{ $n}=\dfrac{($soma)$n}{2}</div><br>"
                    . "<div lang='latex'>S_{ $n}=\dfrac{ $multir}{2}</div><br>"
                    . "<div lang='latex'>S_{ $n}=$div</div>";
            }else{
                echo'N deve ser maior que 0';
            }
        }elseif (is_numeric($an)and is_numeric($n) and is_numeric($sn)and empty($a1)) {
            if(ctype_digit($n) and $n>0){
            $multir=$an*$n;
            $multi2=$sn*2;
            $subt=$multi2-$multir;
            $divf=$subt/$n;        
            echo "Fórmula: "
            . "<div lang='latex'>S_{n}=\dfrac{(a_{1}+a_{n})n}{2}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$sn=\dfrac{(a_{1}+$an)$n}{2}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$sn=\dfrac{ $n*a_{1}+$multir}{2}</div><br>"
                    . "<div lang='latex'>$sn*2=$n*a_{1}+$multir</div><br>"
                    . "<div lang='latex'>$multi2=$n*a_{1}+$multir</div><br>"
                    . "<div lang='latex'>$multi2-$multir=$n*a_{1}</div><br>"
                    . "<div lang='latex'>$subt=$n*a_{1}</div><br>"
                    . "<div lang='latex'>\dfrac{ $subt}{ $n}=a_{1}</div><br>"
                    . "<div lang='latex'>a_{1}=\dfrac{ $subt}{ $n}</div><br>"
                    . "<div lang='latex'>a_{1}=$divf</div><br>";
            }else{
                echo 'N deve ser maior que 0';
            }
            } elseif(is_numeric($sn)and is_numeric($a1)and is_numeric($n) and empty($an)) {
                if(ctype_digit($n) and $n>0){
            $multir=$a1*$n;
            $multi2=$sn*2;
            $subt=$multi2-$multir;
            $divf=$subt/$n;        
            echo "Fórmula: "
            . "<div lang='latex'>S_{n}=\dfrac{(a_{1}+a_{n})n}{2}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$sn=\dfrac{($a1+a_{n})$n}{2}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$sn=\dfrac{ $n*a_{n}+$multir}{2}</div><br>"
                    . "<div lang='latex'>$sn*2=$n*a_{n}+$multir</div><br>"
                    . "<div lang='latex'>$multi2=$n*a_{n}+$multir</div><br>"
                    . "<div lang='latex'>$multi2-$multir=$n*a_{n}</div><br>"
                    . "<div lang='latex'>$subt=$n*a_{n}</div><br>"
                    . "<div lang='latex'>\dfrac{ $subt}{ $n}=a_{n}</div><br>"
                    . "<div lang='latex'>a_{n}=\dfrac{ $subt}{ $n}</div><br>"
                    . "<div lang='latex'>a_{n}=$divf</div><br>";
                }else{
                    echo 'N deve ser maior que 0';
                }
            } elseif(is_numeric($an)and is_numeric($a1)and is_numeric($sn)and empty($n)) {
            $soma=$a1+$an;
            $multir=$sn*2;
            $div=$multir/$soma;
            if($div<=0 or !is_int($div)){
                echo 'Não existe essa PA';
            }else{
            echo "Fórmula: "
            . "<div lang='latex'>S_{n}=\dfrac{(a_{1}+a_{n})n}{2}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$sn=\dfrac{($a1+$an)n}{2}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$sn=\dfrac{($soma)n}{2}</div><br>"
                    . "<div lang='latex'>$sn*2}=($soma)n</div><br>"
                    . "<div lang='latex'>$multir=$soma*n</div><br>"
                    . "<div lang='latex'>\dfrac{ $multir}{ $soma}=n</div><br>"
                    . "<div lang='latex'>n=\dfrac{ $multir}{ $soma}</div><br>"
                    . "<div lang='latex'>n=$div</div>";
            }
            }else{
                    echo "Você deve deixar um campo vazio e preencher os outros três";
                }
        } else {
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
          
            lerPerg(6,"somaprogressao(a).php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "somaprogressao(a).php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "somaprogressao(a).php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>
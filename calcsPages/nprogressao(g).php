<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PG - termo geral</title>
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
    include '../commons/menu.php';
    ?>
    
        <div class="corpo">
            <center>
        <h1>PG - termo geral</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p><label style="margin-left:20px;"></label>
                Uma PG, ou progressão geométrica, é um tipo de sequência que cresce conforme uma razão <i>q</i>. Essa
                razão representa a divisão entre cada termo e seu anterior na sequência. Além de q, outros elementos em uma
                PG são o n (número de termos), o a<sub>1</sub> (termo inicial) e o a<sub>n</sub>, o termo geral. 
                 <br><label style="margin-left:20px;"></label>
                 Nessa página,
                 será abordado o cálculo do termo geral de uma PG, que nada mais é
                 do que o termo que a sequência assume quando <i>n</i> chegar a um valor específico.
                 
                 Esse cálculo é realizado pela seguinte fórmula: a<sub>n</sub> = a<sub>1</sub>*q<sup>n-1</sup> . 
                <br><label style="margin-left:20px;"></label>
                Observando a fórmula do termo geral de uma PG, pode-se observar sua relação com a fórmula de uma função exponencial.
                Essa relação resulta em um gráfico para a PG nos mesmos moldes de um gráfico de um função exponencial, sendo
                representado por uma curva exponencial.
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
            
        <form action="nprogressao(g).php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>a<sub>n</sub>=</label>
            <input type="text" name="an" class="ia"><br><br>
            <label>a<sub>1</sub>=</label>
            <input type="text" name="a1" class="ia"><br><br>
            <label>n=</label>
            <input type="text" name="n" class="ia"><br><br>
            <label>q=</label>
            <input type="text" name="q" class="ia"><br><br>
            <input type="submit"value="Calcular" class="enviarb">
        </form>
        <?php
        if(!empty($_GET['an'])or!empty($_GET['a1'])or!empty($_GET['n'])or!empty($_GET['r'])){
        if(is_numeric($_GET['an'])or is_numeric($_GET['a1'])or is_numeric($_GET['q']) or is_numeric($_GET['n'])){
        $an=$_GET['an'];
        $a1=$_GET['a1'];
        $q=$_GET['q'];
        $n=$_GET['n'];
        
        if(is_numeric($a1)and is_numeric($n) and is_numeric($q)and empty($an)){
            if(ctype_digit($n) and $n>0){
            $nsub1=$n-1;
            $pot=pow($q,$nsub1);
            $multi=$pot*$a1;
            echo "Fórmula do termo geral: "
            . "<div lang='latex'>a_{n}=a_{1}*q^{n-1}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>a_{ $n}=$a1*$q^{ $n-1}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>a_{ $n}=$a1*$q^{ $nsub1}</div><br>"
                    . "<div lang='latex'>a_{ $n}=$a1*$pot</div><br>"
                    . "<div lang='latex'>a_{ $n}=$multi</div><br>";
            }else{
                echo 'N deve ser maior que 0';
            }
        }elseif (is_numeric($an)and is_numeric($n) and is_numeric($q)and empty($a1)) {
                if(ctype_digit($n) and $n>0){
            if($q==0){
                echo 'Impossível realizar o calculo';
            }else{
                $nsub1=$n-1;
            $pot=pow($q,$nsub1);
            $div=$an/$pot;
            echo "Fórmula do termo geral: "
            . "<div lang='latex'>a_{n}=a_{1}*q^{n-1}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$an=a1*$q^{ $n-1}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$an=a1*$q^{ $nsub1}</div><br>"
                    . "<div lang='latex'>$an=a1*$pot</div><br>"
                    . "<div lang='latex'>\dfrac{ $an}{ $pot}=a1</div><br>"
                    . "<div lang='latex'>a1=\dfrac{ $an}{ $pot}</div><br>"
                    . "<div lang='latex'>a1=$div</div>";
            }
                }else{
                    echo 'N deve ser maior que0';
                }
            } elseif(is_numeric($an)and is_numeric($a1)and is_numeric($q)and empty($n)) {
            
            if($q==0){
                echo 'Impossível realizar o calculo';
            }else{
                
                $div=$an/$a1;
            $log= log($an,$q);
            $soma= $log+1;
            function isInteger($input){
    return(ctype_digit(strval($input)));
}
            if($soma<=0 or (!isInteger($soma))){
                echo 'Não existe essa PG';
                echo $soma;
            }else{
            echo "Fórmula do termo geral: "
            . "<div lang='latex'>a_{n}=a_{1}*q^{n-1}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$an=$a1*$q^{n-1}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>\dfrac{ $an}{ $a1}=$q^{n-1}</div><br>"
                    . "<div lang='latex'>$div=$q^{n-1}</div><br>"
                    . "<div lang='latex'>$q^{n-1}=$div</div><br>"
                    . "<div lang='latex'>\log_{ $q}{ $div}=n-1</div><br>"
                    . "<div lang='latex'>$log=n-1</div><br>"
                    . "<div lang='latex'>n-1=$log</div><br>"
                    . "<div lang='latex'>n=$log+1</div><br>"
                    . "<div lang='latex'>n=$soma</div><br>";
            }
            }
            } elseif(is_numeric($an)and is_numeric($a1)and is_numeric($n) and empty($q)) {
                if(ctype_digit($n) and $n>0){
                    if($n!=1){
            $sub=$n-1;
            $div=$an/$a1;
            $raiz= pow($div, (1/$sub));
            echo "Fórmula do termo geral: "
            . "<div lang='latex'>a_{n}=a_{1}*q^{n-1}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$an=$a1*q^{ $n-1}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$an=$a1*q^{ $sub}</div><br>"
                    . "<div lang='latex'>\dfrac{ $an}{ $a1}=q^{ $sub}</div><br>"
                    . "<div lang='latex'>$div=q^{ $sub}</div><br>"
                    . "<div lang='latex'>q^{ $sub}=$div</div><br>"
                    . "<div lang='latex'>q=\sqrt[ $sub]{ $div}</div><br>"
                    . "<div lang='latex'>q=$raiz</div><br>";
                    }else{
                        echo "Impossível encontrar q";
                    }
                }else{
                    echo'N deve ser maior que 0';
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
          
            lerPerg(7,"nprogressao(g).php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "nprogressao(g).php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "nprogressao(g).php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>





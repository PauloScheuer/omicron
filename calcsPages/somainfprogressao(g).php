<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PG - soma infinita</title>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/calcs.css" />
        <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    </head>
    <body>
        
        <div class="geral"><?php
    include '../commons/header.php';
    include '../commons/menu.php'; ?>
    
        <div class="corpo">
            <center>
        <h1>PG - soma infinita</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p><label style="margin-left:20px;"></label>
                Uma PG, ou progressão geométrica, é um tipo de sequência que cresce conforme uma razão <i>q</i>. Essa
                razão representa a divisão entre cada termo e seu anterior na sequência. Além de q, outros elementos em uma
                PG são o n (número de termos), o a<sub>1</sub> (termo inicial) e o a<sub>n</sub>, o termo geral. 
                 <br><label style="margin-left:20px;"></label>
                 Nessa página,
                 será abordado o cálculo da soma dos termos de uma PG infinita, dada pela seguinte fórmula:
                 S = a<sub>1</sub>/(1-q). Nota-se que o valor de a<sub>n</sub> ou de n não são necessários para esse cálculo, por não
                 existir um n final em uma progressão infinita.
                <br><label style="margin-left:20px;"></label>
                Pode-se demonstrar essa fórmula através do seguinte pensamento: suponha que temos uma folha de papel e resolvamos
                pintá-la. Para isso, determinamos que se começará pintando metade da folha e depois disso, metade do que ainda não foi pintado
                até a folha estar completamente pintada. Como pode-se conferir na calculadora dessa página, uma PG infinita com a<sub>1</sub> = 0.5
                e q = 0.5 resultará em uma soma valendo 1 (a folha completa).
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="somainfprogressao(g).php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>S<sub>∞</sub>:</label>
            <input type="text" name="sinf" class="ia"><br><br>
            <label>a<sub>1</sub>:</label>
            <input type="text" name="a1" class="ia"><br><br>
            <label>q:</label>
            <input type="text" name="q" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        if(!empty($_GET['a1'])or!empty($_GET['q'])or!empty($_GET['sinf'])){
        if(is_numeric($_GET['a1'])or is_numeric($_GET['q'])or is_numeric($_GET['sinf'])){
            
        $a1=$_GET['a1'];
        $sinf=$_GET['sinf'];
        $q=$_GET['q'];
        
        if(is_numeric($a1)and is_numeric($q)and empty($sinf)){
            $sub=1-$q;
            $div=$a1/$sub;
            echo "Fórmula:"
            . "<br><br><div lang='latex'>S_{ \infty}=\dfrac{a_{1}}{1-q}</div><br>"
                    . "Nesse caso, temos:"
                    . "<br><br><div lang='latex'>S_{ ∞}=\dfrac{ $a1}{1-($q)}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<br><br><div lang='latex'>S_{ ∞}=\dfrac{ $a1}{ $sub}</div><br>"
                    . "<div lang='latex'>S_{ ∞}=$div</div><br>";
        }elseif (is_numeric($q) and is_numeric($sinf)and empty($a1)) {
            $sub=1-$q;
            $multi=$sub*$sinf;
            $nred=round($multi * 100) / 100; 
            echo "Fórmula:"
            . "<br><br><div lang='latex'>S_{ \infty}=\dfrac{a_{1}}{1-q}</div><br>"
                    . "Nesse caso, temos:"
                    . "<br><br><div lang='latex'>$sinf=\dfrac{ a_{1}}{1-($q)}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<br><br><div lang='latex'>$sinf=\dfrac{ a1}{ $sub}</div><br>"
                    . "<div lang='latex'>$sinf*$sub=a_{1}</div><br>"
                    . "<div lang='latex'>a_{1}=$sinf*$sub</div><br>"
                    . "<div lang='latex'>a_{1}=$nred</div><br>";
            
        }elseif (is_numeric($a1) and is_numeric($sinf)and empty($q)) {
            $sub=$a1-$sinf;
            $div=$sub/(-$sinf);
            $nred=round($div * 100) / 100; 
            echo "Fórmula:"
            . "<br><br><div lang='latex'>S_{ \infty}=\dfrac{a_{1}}{1-q}</div><br>"
                    . "Nesse caso, temos:"
                    . "<br><br><div lang='latex'>$sinf=\dfrac{ $a1}{1-q}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<br><br><div lang='latex'>$sinf*(1-q)=$a1</div><br>"
                    . "<div lang='latex'>$sinf-$sinf q=$a1</div><br>"
                    . "<div lang='latex'>-$sinf q=$a1-$sinf</div><br>"
                    . "<div lang='latex'>-$sinf q=$sub</div><br>"
                    . "<div lang='latex'>q=\dfrac{ $sub}{-$sinf}</div><br>"
                    . "<div lang='latex'>q=$nred"; 
            
        }else{
                    echo "Você deve deixar um campo vazio e preencher os outros dois";
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
          
            lerPerg(9,"somainfprogressao(g).php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "somainfprogressao(g).php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "somainfprogressao(g).php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>
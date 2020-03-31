<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Probabilidade</title>
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
    include '../commons/menu.php'; ?>
    
        <div class="corpo">
            <center>
        <h1>Probabilidade</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
                <p><label style="margin-left:20px;"></label>
                    Uma probabilidade de um evento acontecer é definida através da divisão
                    entre o número de eventos favoráveis pelo espaço amostral, ou seja, o número total de eventos possíveis. Podemos
                    tomar com exemplo de evento a chance de, ao se jogar um dado, obtermos um número menor que 4. Nesse caso, o conjunto de 
                    eventos favoráveis é {1,2,3}, enquanto o conjunto do espaço amostral é {1,2,3,4,5,6}. Assim, a probabilidade 
                    de tal evento acontecer é de 3/6 = 0.5, ou 50%.
                    <br><label style="margin-left:20px;"></label>
                    Pode-se nota que uma probabilidade sempre estará entre 0 e 1 (ou 0% e 100%). Isso se deve ao fato de que os eventos favoráveis
                    são subconjuntos de um espaço amostral, e assim, não podem ultrapassar seu valor.
                </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="probabilidade.php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>P=</label>
            <input type="text" name="p" class="ia"><br><br>
            <label>Eventos favoráveis=</label>
            <input type="text" name="ef" class="ia"><br><br>
            <label>Espaço amostral=</label>
            <input type="text" name="ea" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        include '../coisas.php';
        if(!empty($_GET['p'])or!empty($_GET['ef'])or!empty($_GET['ea'])){
        if(is_numeric($_GET['p'])or is_numeric($_GET['ef'])or is_numeric($_GET['ea'])){
            $p=$_GET['p'];
        $ef=$_GET['ef'];
        $ea=$_GET['ea'];
            if(is_numeric($p) and is_numeric($ef) and empty($ea)){
                if(ctype_digit($ef) and $ef>0 and $p<1 and $p>0){
                    $div= $ef/$p;
                    
               echo "Fórmula: "
            . "<div lang='latex'>P =\dfrac{n(E)}{n(\Omega)}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$p=\dfrac{ $ef}{n(\Omega)}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$p*n(\Omega)= $ef</div><br>"
                    . "<div lang='latex'>n(\Omega)=\dfrac{ $ef}{ $p}</div><br>"
                    . "<div lang='latex'>n(\Omega)= $div</div><br>";
                    }else{
                        echo 'P entre 0 e 1, eventos favoráveis deve ser um número natural';
                    }
            }elseif (is_numeric($p) and is_numeric($ea) and empty($ef)) {
                if(ctype_digit($ea) and $ea>0 and $p<1 and $p>0){
                    $multi= $ea*$p;
                    
               echo "Fórmula: "
            . "<div lang='latex'>P =\dfrac{n(E)}{n(\Omega)}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$p=\dfrac{ n(E)}{ $ea}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$p*$ea=n(E)</div><br>"
                    . "<div lang='latex'>n(E)=$p*$ea</div><br>"
                    . "<div lang='latex'>n(E)=$multi</div><br>";
                    }else{
                        echo 'P entre 0 e 1, espaço amostral deve ser natural';
                    }
                }elseif(is_numeric($ea) and is_numeric($ef) and empty($p)){
                    if(ctype_digit($ea) and $ea>0 and ctype_digit($ef) and $ef>0 and $ef<$ea){
                    $div= $ef/$ea;
                    $por= porcentagem($ef, $ea);
                    
               echo "Fórmula: "
            . "<div lang='latex'>P =\dfrac{n(E)}{n(\Omega)}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>P=\dfrac{ $ef}{ $ea}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>n(E)=$div</div>"
                        . "ou"
                    . "<div lang='latex'>n(E)=$por\%</div><br>";
                    }else{
                        echo 'Espaço amostral e eventos favoráveis devem ser naturais, com eventos favoráveis menor que o espaço amostral';
                    }
                }else{
                    echo "Você deve deixar um campo vazio e preencher os outros dois";
                }
         }else{
           echo "Os valores devem ser numéricos" ;
        }
        }else{
            echo "insira os valores";
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
          
            lerPerg(12,"probabilidade.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "probabilidade.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "probabilidade.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pontos distantes</title>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/calcs.css" />
        <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    </head>
    <body>
        
        <div class="geral"><?php
    include '../commons/header.php';?>
    <?php
    include '../commons/menu.php'; ?>
    
        <div class="corpo">
            <center>
        <h1>Pontos distantes</h1>
            </center>
            <div class="texto" style="float: none;width: 100%"><h3>Conceito:</h3>
            <fieldset>
                
            <p>
                <label style="margin-left:20px;"></label>
                A geometria analítica é uma área da matemática cujos estudos começaram com <a href="descubra.php?#anchor5">René Descartes</a>,
                quando o mesmo sugeriu a união entre os estudos da álgebra e da geometria. Nessa área da geometria, todos os conceitos da geometria
                euclidiana podem ser aplicados juntos à álgebra. Sua principal característica é a utilização de um plano de coordenadas, conhecido como
                cartesiano, para a disposição de pontos, retas e figuras.
                <br><label style="margin-left:20px;"></label>
                A distância entre dois pontos na geometria analítica é o menor segmento que liga ambos, sendo sempre uma reta. Para seu cálculo,
                deve-se calcular a diferença entre seus valores de x e de y, criando assim um triângulo retângulo que terá como catetos 
                |xb-xa| e |yb-ya| e como hipotenusa a distância 
                entre os dois pontos. Sabendo o valor dos catetos, encontra-se a distância entre os pontos através da fórmula de Pitágoras.
            </p>
             </fieldset>
        </div>
            <div class="calc"style="float: none;width: 100%"><h3>Calculadora:</h3>
        <fieldset>
            <form action="pontosdist.php" method="GET">
                <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>A=</label>
            <input type="text" name="xa" class="ia">
            <input type="text" name="ya" class="ia"><br><br>
            <label>B=</label>
            <input type="text" name="xb" class="ia">
            <input type="text" name="yb" class="ia"><br><br>
            <label>Distância=</label>
            <input type="text" name="dist" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        
        <?php
        if(!empty($_GET['xa'])or!empty($_GET['ya'])or!empty($_GET['yb'])or!empty($_GET['xb'])or!empty($_GET['dist'])){
        if(is_numeric($_GET['xa'])or is_numeric($_GET['ya'])or is_numeric($_GET['xb'])or is_numeric($_GET['yb'])or is_numeric($_GET['dist'])){
        $xa=$_GET['xa'];
        $ya=$_GET['ya'];
        $xb=$_GET['xb'];
        $yb=$_GET['yb'];
        $dist=$_GET['dist'];
            if(is_numeric($xa) and is_numeric($ya) and is_numeric($xb) and is_numeric($yb) and empty($dist)){
            $subx=$xa-$xb;
            $suby=$ya-$yb;
            $x2=$subx*$subx;
            $y2=$suby*$suby;
            $soma=$x2+$y2;
            $raiz= sqrt($soma);
            echo "Fórmula de pitágoras: "
            . "<div lang='latex'>D=\sqrt{(Xa-Xb)^2+(Ya-Yb)^2}</div>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>D=\sqrt{($xa-$xb)^2+($ya-$yb)^2}</div>"
                    . "Assim, efetuando os calculos, ficamos com:"
                    . "<div lang='latex'>D=\sqrt{($subx)^2+($suby)^2}</div><br>"
                    . "<div lang='latex'>D=\sqrt{ $x2+$y2}</div><br>"
                    . "<div lang='latex'>D=\sqrt{ $soma}</div><br>"
                    . "<div lang='latex'>D=$raiz</div>";
            }elseif (is_numeric($xa) and is_numeric($ya) and is_numeric($xb) and is_numeric($dist) and empty($yb)){
            $subx=$xa-$xb;
            $x2=$subx*$subx;
            $ya2=$ya*$ya;
            $dist2=$dist*$dist;
            $m=2*$ya;
            $soma=$x2+$ya2;
            $sub=$dist2-$soma;
            $delta=($m*$m)-(4*$sub*-1);
            $raiz= sqrt($delta);
            $yb1=(-$m+$raiz)/-2;
            $yb2=(-$m-$raiz)/-2;
            echo "Fórmula de pitágoras: "
            . "<div lang='latex'>D^2=(Xa-Xb)^2+(Ya-Yb)^2</div>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$dist^2=($xa-$xb)^2+($ya-Yb)^2</div>"
                    . "Assim, efetuando os calculos, ficamos com:"
                    . "<div lang='latex'>$dist2=($subx)^2+($ya-Yb)^2}</div><br>"
                    . "<div lang='latex'>$dist2=$x2+($ya2-2*$ya*Yb+Yb^2)}</div><br>"
                    . "<div lang='latex'>$dist2=$x2+$ya2-$m*Yb+Yb^2}</div><br>"
                    . "<div lang='latex'>$dist2=$soma-$m*Yb+Yb^2}</div><br>"
                    . "<div lang='latex'>$dist2-$soma=-$m*Yb+Yb^2}</div><br>"
                    . "<div lang='latex'>$sub=-$m*Yb+Yb^2}</div><br>"
                    . "<div lang='latex'>$sub+$m*Yb-Yb^2=0</div><br>"
                    . "<div lang='latex'>-Yb^2+$m*Yb+$sub=0</div><br>"
                    ."Temos agora uma equação de segundo grau:<br>"
                    . "<div lang='latex'>\Delta=$m^2-(4*1*$sub)</div><br>"
                    . "<div lang='latex'>\Delta=$delta</div><br>"
                    . "<div lang='latex'>Yb= {-b \pm \sqrt{\Delta} \over 2.a}</div><br>"
                    . "<div lang='latex'>Yb= {-$m \pm \sqrt{\ $delta} \over -2}</div><br>"
                    . "<div lang='latex'>Yb= {-$m \pm $raiz \over -2}</div><br>"
                    . "<div lang='latex'>Yb'= $yb1</div><br>"
                    . "<div lang='latex'>Yb''= $yb2</div><br>";
                }elseif(is_numeric($xa) and is_numeric($ya) and is_numeric($yb) and is_numeric($dist) and empty($xb)){
            $suby=$ya-$yb;
            $y2=$suby*$suby;
            $xa2=$xa*$xa;
            $dist2=$dist*$dist;
            $m=2*$xa;
            $soma=$y2+$xa2;
            $sub=$dist2-$soma;
            $delta=($m*$m)-(4*$sub*-1);
            $raiz= sqrt($delta);
            $xb1=(-$m+$raiz)/-2;
            $xb2=(-$m-$raiz)/-2;
            echo "Fórmula de pitágoras: "
            . "<div lang='latex'>D^2=(Xa-Xb)^2+(Ya-Yb)^2</div>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$dist^2=($xa-Xb)^2+($ya-$yb)^2</div>"
                    . "Assim, efetuando os calculos, ficamos com:"
                    . "<div lang='latex'>$dist2=($xa-Xb)^2+($suby)^2}</div><br>"
                    . "<div lang='latex'>$dist2=($xa2-2*$xa*Xb+Xb^2)}+$y2</div><br>"
                    . "<div lang='latex'>$dist2=$xa2+$y2+(-$m*Xb+Xb^2)</div><br>"
                    . "<div lang='latex'>$dist2=$soma-$m*Xb+Xb^2}</div><br>"
                    . "<div lang='latex'>$dist2-$soma=-$m*Xb+Xb^2}</div><br>"
                    . "<div lang='latex'>$sub=-$m*Xb+Xb^2}</div><br>"
                    . "<div lang='latex'>$sub+$m*Xb-Xb^2=0</div><br>"
                    . "<div lang='latex'>-Xb^2+$m*Xb+($sub)=0</div><br>"
                    ."Temos agora uma equação de segundo grau:<br>"
                    . "<div lang='latex'>\Delta=$m^2-(4*1*$sub)</div><br>"
                    . "<div lang='latex'>\Delta=$delta</div><br>"
                    . "<div lang='latex'>Xb= {-b \pm \sqrt{\Delta} \over 2.a}</div><br>"
                    . "<div lang='latex'>Xb= {-$m \pm \sqrt{\ $delta} \over -2}</div><br>"
                    . "<div lang='latex'>Xb= {-$m \pm $raiz \over -2}</div><br>"
                    . "<div lang='latex'>Xb'= $xb1</div><br>"
                    . "<div lang='latex'>Xb''= $xb2</div><br>";
                }elseif(is_numeric($xa) and is_numeric($yb) and is_numeric($xb) and is_numeric($dist) and empty($ya)){
            $subx=$xa-$xb;
            $x2=$subx*$subx;
            $yb2=$yb*$yb;
            $dist2=$dist*$dist;
            $m=2*$yb;
            $soma=$x2+$yb2;
            $sub=$dist2-$soma;
            $delta=($m*$m)-(4*$sub*-1);
            $raiz= sqrt($delta);
            $ya1=(-$m+$raiz)/-2;
            $ya2=(-$m-$raiz)/-2;
            echo "Fórmula de pitágoras: "
            . "<div lang='latex'>D^2=(Xa-Xb)^2+(Ya-Yb)^2</div>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$dist^2=($xa-$xb)^2+(Ya-$yb)^2</div>"
                    . "Assim, efetuando os calculos, ficamos com:"
                    . "<div lang='latex'>$dist2=($subx)^2+(Ya-$yb)^2}</div><br>"
                    . "<div lang='latex'>$dist2=$x2+(Ya^2-2*$yb*Ya+$yb2)}</div><br>"
                    . "<div lang='latex'>$dist2=$x2+$yb2-$m*Ya+Ya^2}</div><br>"
                    . "<div lang='latex'>$dist2=$soma-$m*Ya+Ya^2}</div><br>"
                    . "<div lang='latex'>$dist2-$soma=-$m*Ya+Ya^2}</div><br>"
                    . "<div lang='latex'>$sub=-$m*Ya+Ya^2}</div><br>"
                    . "<div lang='latex'>$sub+$m*Ya-Ya^2=0</div><br>"
                    . "<div lang='latex'>-Ya^2+$m*Ya+$sub=0</div><br>"
                    ."Temos agora uma equação de segundo grau:<br>"
                    . "<div lang='latex'>\Delta=$m^2-(4*1*$sub)</div><br>"
                    . "<div lang='latex'>\Delta=$delta</div><br>"
                    . "<div lang='latex'>Ya= {-b \pm \sqrt{\Delta} \over 2.a}</div><br>"
                    . "<div lang='latex'>Ya= {-$m \pm \sqrt{\ $delta} \over -2}</div><br>"
                    . "<div lang='latex'>Ya= {-$m \pm $raiz \over -2}</div><br>"
                    . "<div lang='latex'>Ya'= $ya1</div><br>"
                    . "<div lang='latex'>Ya''= $yal</div><br>";
                }elseif(is_numeric($xb) and is_numeric($ya) and is_numeric($yb) and is_numeric($dist) and empty($xa)){
            $suby=$ya-$yb;
            $y2=$suby*$suby;
            $xb2=$xb*$xb;
            $dist2=$dist*$dist;
            $m=2*$xb;
            $soma=$y2+$xb2;
            $sub=$dist2-$soma;
            $delta=($m*$m)-(4*$sub*-1);
            $raiz= sqrt($delta);
            $xa1=(-$m+$raiz)/-2;
            $xa2=(-$m-$raiz)/-2;
            echo "Fórmula de pitágoras: "
            . "<div lang='latex'>D^2=(Xa-Xb)^2+(Ya-Yb)^2</div>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$dist^2=(Xa-$xb)^2+($ya-$yb)^2</div>"
                    . "Assim, efetuando os calculos, ficamos com:"
                    . "<div lang='latex'>$dist2=(Xa-$xb)^2+($suby)^2}</div><br>"
                    . "<div lang='latex'>$dist2=(Xa^2-2*$xb*Xa+$xb2)}+$y2</div><br>"
                    . "<div lang='latex'>$dist2=$xb2+$y2+(-$m*Xa+Xa^2)</div><br>"
                    . "<div lang='latex'>$dist2=$soma-$m*Xa+Xa^2}</div><br>"
                    . "<div lang='latex'>$dist2-$soma=-$m*Xa+Xa^2}</div><br>"
                    . "<div lang='latex'>$sub=-$m*Xa+Xa^2}</div><br>"
                    . "<div lang='latex'>$sub+$m*Xa-Xa^2=0</div><br>"
                    . "<div lang='latex'>-Xa^2+$m*Xa+($sub)=0</div><br>"
                    ."Temos agora uma equação de segundo grau:<br>"
                    . "<div lang='latex'>\Delta=$m^2-(4*1*$sub)</div><br>"
                    . "<div lang='latex'>\Delta=$delta</div><br>"
                    . "<div lang='latex'>Xa= {-b \pm \sqrt{\Delta} \over 2.a}</div><br>"
                    . "<div lang='latex'>Xa= {-$m \pm \sqrt{\ $delta} \over -2}</div><br>"
                    . "<div lang='latex'>Xa= {-$m \pm $raiz \over -2}</div><br>"
                    . "<div lang='latex'>Xa'= $xa1</div><br>"
                    . "<div lang='latex'>Xa''= $xa2</div><br>";
                }
                else{
                    echo "Devem haver pelo menos 4 campos preenchidos";
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
          
            lerPerg(18,"pontosdist.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "pontosdist.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "pontosdist.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>
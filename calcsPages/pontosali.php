<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pontos alinhados</title>
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
        <h1>Pontos alinhados</h1>
            </center>
            <div class="texto" style="width:100%;"><h3>Conceito:</h3>
            <fieldset>
                
            <p>
                <label style="margin-left:20px;"></label>
                A geometria analítica é uma área da matemática cujos estudos começaram com <a href="descubra.php?#anchor5">René Descartes</a>,
                quando o mesmo sugeriu a união entre os estudos da álgebra e da geometria. Nessa área da geometria, todos os conceitos da geometria
                euclidiana podem ser aplicados juntos à álgebra. Sua principal característica é a utilização de um plano de coordenadas, conhecido como
                cartesiano, para a disposição de pontos, retas e figuras.
                <br><label style="margin-left:20px;"></label>
                Para verificar se 3 pontos estão alinhados, é necessário calcular o determinante dos três pontos e verificar se não se chega
                a um absurdo por este cálculo. Calculando o determinante tendo dois pontos definidos e para o terceiro tendo uma de suas coordenadas
                (x ou y), podemos chegar em qual a coordenada necessária para o terceiro ponto estar alinhado aos outros dois.
            </p>
             </fieldset>
        </div>
            <div class="calc" style="width:100%;"><h3>Calculadora:</h3>
        <fieldset>
            <form action="pontosali.php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco, ou preencha todos se quiser verificar o alinhamento de três pontos:</label><br><br>
            <label>A<sub>x,y</sub>=</label>
            <input type="text" name="xa" class="ia">
            <input type="text" name="ya" class="ia"><br><br>
            <label>B<sub>x,y</sub>=</label>
            <input type="text" name="xb" class="ia">
            <input type="text" name="yb" class="ia"><br><br>
            <label>C<sub>x,y</sub>=</label>
            <input type="text" name="xc" class="ia">
            <input type="text" name="yc" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        
        <?php
        if(!empty($_GET['xa'])or!empty($_GET['ya'])or!empty($_GET['yb'])or!empty($_GET['xb'])or!empty($_GET['yc'])or!empty($_GET['xc'])){
        if(is_numeric($_GET['xa'])or is_numeric($_GET['ya'])or is_numeric($_GET['xb'])or is_numeric($_GET['yb'])or is_numeric($_GET['xc'])or is_numeric($_GET['yc'])){
        $xa=$_GET['xa'];
        $ya=$_GET['ya'];
        $xb=$_GET['xb'];
        $yb=$_GET['yb'];
        $xc=$_GET['xc'];
        $yc=$_GET['yc'];
            if(is_numeric($xa) and is_numeric($ya) and is_numeric($xb) and is_numeric($yb) and is_numeric($xc) and is_numeric($yc)){
                $multi1=$xa*$yb;
                $multi2=$xb*$yc;
                $multi3=$xc*$ya;
                $multi4=$xc*$yb;
                $multi5=$xa*$yc;
                $multi6=$xb*$ya;
                $soma1=$multi1+$multi2+$multi3;
                $soma2=$multi4+$multi5+$multi6;
                $sub=$soma1-$soma2;
                if($sub==0){
                    $res="Os pontos estão alinhados";
                }else{
                    $res="Os pontos não estão alinhados";
                }
               echo "Fórmula: "
            . "<div lang='latex'>(Xa*Yb*1)+(Xb*Yc*1)+</div>"
                       . "<div lang='latex'>(Xc*Ya*1)-[(Xc*Yb*1)+</div>"
                       . "<div lang='latex'>(Xa*Yc*1)+(Xb*Ya*1)]=0</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>($xa*$yb*1)+($xb*$yc*1)+</div>"
                       . "<div lang='latex'>($xc*$ya*1)-[($xc*$yb*1)+</div>"
                       . "<div lang='latex'>($xa*$yc*1)+($xb*$ya*1)]=0</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$multi1+$multi2+$multi3-[$multi4+$multi5+$multi6]=0</div><br>"
                    . "<div lang='latex'>$soma1-($soma2)=0</div><br>"
                    . "<div lang='latex'>$sub=0</div><br>"
                    . "$res";
            }elseif (is_numeric($xa) and is_numeric($ya) and is_numeric($xb) and is_numeric($yb) and is_numeric($xc) and empty ($yc)){
                if($xa==$xb or $ya==$yb){
                    echo 'Não insira coordenadas iguais!';
                }else{
                $multi1=$xa*$yb;
                $multi2=$xb*1;
                $multi3=$xc*$ya;
                $multi4=$xc*$yb;
                $multi5=$xa*1;
                $multi6=$xb*$ya;
                $soma1=$multi1+$multi3;
                $soma2=$multi4+$multi6;
                $sub1=$multi2-$multi5;
                $sub2=$soma2-$soma1;
                $div=$sub2/$sub1;
               echo "Fórmula: "
            . "<div lang='latex'>(Xa*Yb*1)+(Xb*Yc*1)+</div>"
                       . "<div lang='latex'>(Xc*Ya*1)-[(Xc*Yb*1)+</div>"
                       . "<div lang='latex'>(Xa*Yc*1)+(Xb*Ya*1)]=0</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>($xa*$yb*1)+($xb*Yc*1)+</div>"
                       . "<div lang='latex'>($xc*$ya*1)-[($xc*$yb*1)+</div>"
                       . "<div lang='latex'>($xa*Yc*1)+($xb*$ya*1)]=0</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>($multi1)+($multi2*Yc)+</div>"
                       . "<div lang='latex'>($multi3)-[($multi4)+</div>"
                       . "<div lang='latex'>($multi5*Yc)+($multi6)]=0</div><br>"
                    . "<div lang='latex'>($soma1)+($multi2*Yc)-[($soma2)+($multi5*Yc)]=0</div><br>"
                    . "<div lang='latex'>($soma1)+($multi2*Yc)=($soma2)+($multi5*Yc)</div><br>"
                    . "<div lang='latex'>($multi2*Yc)-($multi5*Yc)=$soma2-($soma1)</div><br>"
                    . "<div lang='latex'>$sub1*Yc=$sub2</div><br>"
                    . "<div lang='latex'>Yc=\dfrac{ $sub2}{ $sub1}</div><br>"
                    . "<div lang='latex'>Yc=$div</div><br>";
                }
                }elseif(is_numeric($xa) and is_numeric($ya) and is_numeric($xb) and is_numeric($yb) and is_numeric($yc) and empty ($xc)){
                if($xa==$xb or $ya==$yb){
                    echo 'Não insira coordenadas iguais!';
                }else{
                    $multi1=$xa*$yb;
                $multi2=$xb*$yc;
                $multi3=1*$ya;
                $multi4=1*$yb;
                $multi5=$xa*$yc;
                $multi6=$xb*$ya;
                $soma1=$multi1+$multi2;
                $soma2=$multi5+$multi6;
                $sub1=$multi3-$multi4;
                $sub2=$soma2-$soma1;
                $div=$sub2/$sub1;
               echo "Fórmula: "
            . "<div lang='latex'>(Xa*Yb*1)+(Xb*Yc*1)+</div>"
                       . "<div lang='latex'>(Xc*Ya*1)-[(Xc*Yb*1)+</div>"
                       . "<div lang='latex'>(Xa*Yc*1)+(Xb*Ya*1)]=0</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>($xa*$yb*1)+($xb*$yc*1)+</div>"
                       . "<div lang='latex'>(Xc*$ya*1)-[(Xc*$yb*1)+</div>"
                       . "<div lang='latex'>($xa*$yc*1)+($xb*$ya*1)]=0</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>($multi1)+($multi2)+</div>"
                       . "<div lang='latex'>($multi3*Xc)-[($multi4*Xc)+</div>"
                       . "<div lang='latex'>($multi5)+($multi6)]=0</div><br>"
                    . "<div lang='latex'>($soma1)+($multi3*Xc)-[($multi4*Xc)+($soma2)]=0</div><br>"
                    . "<div lang='latex'>($soma1)+($multi3*Xc)=($multi4*Xc)+($soma2)</div><br>"
                    . "<div lang='latex'>($multi3*Xc)-($multi4*Xc)=$soma2-($soma1)</div><br>"
                    . "<div lang='latex'>$sub1*Xc=$sub2</div><br>"
                    . "<div lang='latex'>Xc=\dfrac{ $sub2}{ $sub1}</div><br>"
                    . "<div lang='latex'>Xc=$div</div><br>";
                }
                }elseif(is_numeric($xa) and is_numeric($ya) and is_numeric($xb) and is_numeric($yc) and is_numeric($xc) and empty ($yb)){
                if($xa==$xc or $ya==$yc){
                    echo 'Não insira coordenadas iguais!';
                }else{
                    $multi1=$xa*1;
                $multi2=$xb*$yc;
                $multi3=$xc*$ya;
                $multi4=$xc*1;
                $multi5=$xa*$yc;
                $multi6=$xb*$ya;
                $soma1=$multi2+$multi3;
                $soma2=$multi5+$multi6;
                $sub1=$multi1-$multi4;
                $sub2=$soma2-$soma1;
                $div=$sub2/$sub1;
               echo "Fórmula: "
            . "<div lang='latex'>(Xa*Yb*1)+(Xb*Yc*1)+</div>"
                       . "<div lang='latex'>(Xc*Ya*1)-[(Xc*Yb*1)+</div>"
                       . "<div lang='latex'>(Xa*Yc*1)+(Xb*Ya*1)]=0</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>($xa*Yb*1)+($xb*$yc*1)+</div>"
                       . "<div lang='latex'>($xc*$ya*1)-[($xc*Yb*1)+</div>"
                       . "<div lang='latex'>($xa*$yc*1)+($xb*$ya*1)]=0</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>($multi1*Yb)+($multi2)+</div>"
                       . "<div lang='latex'>($multi3)-[($multi4*Yb)+</div>"
                       . "<div lang='latex'>($multi5)+($multi6)]=0</div><br>"
                    . "<div lang='latex'>($multi1*Yb)+($soma1)-[($multi4*Yb)+($soma2)]=0</div><br>"
                    . "<div lang='latex'>($multi1*Yb)+($soma1)=($multi4*Yb)+($soma2)</div><br>"
                    . "<div lang='latex'>($multi1*Yb)-($multi4*Yb)=$soma2-($soma1)</div><br>"
                    . "<div lang='latex'>$sub1*Yb=$sub2</div><br>"
                    . "<div lang='latex'>Yb=\dfrac{ $sub2}{ $sub1}</div><br>"
                    . "<div lang='latex'>Yb=$div</div><br>";
                }
                }elseif(is_numeric($xa) and is_numeric($ya) and is_numeric($xc) and is_numeric($yb) and is_numeric($yc) and empty ($xb)){
                if($xa==$xc or $ya==$yc){
                    echo 'Não insira coordenadas iguais!';
                }else{
                    $multi1=$xa*$yb;
                $multi2=1*$yc;
                $multi3=$xc*$ya;
                $multi4=$xc*$yb;
                $multi5=$xa*$yc;
                $multi6=1*$ya;
                $soma1=$multi1+$multi3;
                $soma2=$multi4+$multi5;
                $sub1=$multi2-$multi6;
                $sub2=$soma2-$soma1;
                $div=$sub2/$sub1;
               echo "Fórmula: "
            . "<div lang='latex'>(Xa*Yb*1)+(Xb*Yc*1)+</div>"
                       . "<div lang='latex'>(Xc*Ya*1)-[(Xc*Yb*1)+</div>"
                       . "<div lang='latex'>(Xa*Yc*1)+(Xb*Ya*1)]=0</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>($xa*$yb*1)+(Xb*$yc*1)+</div>"
                       . "<div lang='latex'>($xc*$ya*1)-[($xc*$yb*1)+</div>"
                       . "<div lang='latex'>($xa*$yc*1)+(Xb*$ya*1)]=0</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>($multi1)+($multi2*Xb)+</div>"
                       . "<div lang='latex'>($multi3)-[($multi4)+</div>"
                       . "<div lang='latex'>($multi5)+($multi6*Xb)]=0</div><br>"
                    . "<div lang='latex'>($soma1)+($multi2*Xb)-[($soma2)+($multi6*Xb)]=0</div><br>"
                    . "<div lang='latex'>($soma1)+($multi2*Xb)=($soma2)+($multi6*Xb)</div><br>"
                    . "<div lang='latex'>($multi2*Xb)-($multi6*Xb)=$soma2-($soma1)</div><br>"
                    . "<div lang='latex'>$sub1*Xb=$sub2</div><br>"
                    . "<div lang='latex'>Xb=\dfrac{ $sub2}{ $sub1}</div><br>"
                    . "<div lang='latex'>Xb=$div</div><br>";
                }
                }elseif(is_numeric($xa) and is_numeric($yb) and is_numeric($xb) and is_numeric($yc) and is_numeric($xc) and empty ($ya)){
                if($xc==$xb or $yc==$yb){
                    echo 'Não insira coordenadas iguais!';
                }else{
                    $multi1=$xa*$yb;
                $multi2=$xb*$yc;
                $multi3=$xc*1;
                $multi4=$xc*$yb;
                $multi5=$xa*$yc;
                $multi6=$xb*1;
                $soma1=$multi1+$multi2;
                $soma2=$multi4+$multi5;
                $sub1=$multi3-$multi6;
                $sub2=$soma2-$soma1;
                $div=$sub2/$sub1;
               echo "Fórmula: "
            . "<div lang='latex'>(Xa*Yb*1)+(Xb*Yc*1)+</div>"
                       . "<div lang='latex'>(Xc*Ya*1)-[(Xc*Yb*1)+</div>"
                       . "<div lang='latex'>(Xa*Yc*1)+(Xb*Ya*1)]=0</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>($xa*$yb*1)+($xb*$yc*1)+</div>"
                       . "<div lang='latex'>($xc*Ya*1)-[($xc*$yb*1)+</div>"
                       . "<div lang='latex'>($xa*$yc*1)+($xb*Ya*1)]=0</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>($multi1)+($multi2)+</div>"
                       . "<div lang='latex'>($multi3*Ya)-[($multi4)+</div>"
                       . "<div lang='latex'>($multi5)+($multi6*Ya)]=0</div><br>"
                    . "<div lang='latex'>($soma1)+($multi3*Ya)-[($soma2)+($multi6*Ya)]=0</div><br>"
                    . "<div lang='latex'>($soma1)+($multi3*Ya)=($soma2)+($multi6*Ya)</div><br>"
                    . "<div lang='latex'>($multi3*Ya)-($multi6*Ya)=$soma2-($soma1)</div><br>"
                    . "<div lang='latex'>$sub1*Ya=$sub2</div><br>"
                    . "<div lang='latex'>Ya=\dfrac{ $sub2}{ $sub1}</div><br>"
                    . "<div lang='latex'>Ya=$div</div><br>";
                }
                }elseif(is_numeric($xb) and is_numeric($ya) and is_numeric($xc) and is_numeric($yb) and is_numeric($yc) and empty ($xa)){
                if($xc==$xb or $yc==$yb){
                    echo 'Não insira coordenadas iguais!';
                }else{
                    $multi1=1*$yb;
                $multi2=$xb*$yc;
                $multi3=$xc*$ya;
                $multi4=$xc*$yb;
                $multi5=1*$yc;
                $multi6=$xb*$ya;
                $soma1=$multi2+$multi3;
                $soma2=$multi4+$multi6;
                $sub1=$multi1-$multi5;
                $sub2=$soma2-$soma1;
                $div=$sub2/$sub1;
               echo "Fórmula: "
            . "<div lang='latex'>(Xa*Yb*1)+(Xb*Yc*1)+</div>"
                       . "<div lang='latex'>(Xc*Ya*1)-[(Xc*Yb*1)+</div>"
                       . "<div lang='latex'>(Xa*Yc*1)+(Xb*Ya*1)]=0</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>(Xa*$yb*1)+($xb*$yc*1)+</div>"
                       . "<div lang='latex'>($xc*$ya*1)-[($xc*$yb*1)+</div>"
                       . "<div lang='latex'>(Xa*$yc*1)+($xb*$ya*1)]=0</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>($multi1*Xa)+($multi2)+</div>"
                       . "<div lang='latex'>($multi3)-[($multi4)+</div>"
                       . "<div lang='latex'>($multi5*Xa)+($multi6)]=0</div><br>"
                    . "<div lang='latex'>($multi1*Xa)+($soma1)-[($soma2)+($multi5*Xa)]=0</div><br>"
                    . "<div lang='latex'>($multi1*Xa)+($soma1)=($soma2)+($multi5*Xa)</div><br>"
                    . "<div lang='latex'>($multi1*Xa)-($multi5*Xa)=$soma2-($soma1)</div><br>"
                    . "<div lang='latex'>$sub1*Xa=$sub2</div><br>"
                    . "<div lang='latex'>Xa=\dfrac{ $sub2}{ $sub1}</div><br>"
                    . "<div lang='latex'>Xa=$div</div><br>";
                }
                }else{
                    echo "Devem haver pelo menos 5 campos preenchidos";
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
          
            lerPerg(19,"pontosali.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "pontosali.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "pontosali.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>
<html>
    <?php

    function calcular($i) {
        $calc = 1;
        while ($i > 1) {
            $calc *= $i;
            $i--;
        }
        return $calc;
    }

    function revert($x) {
        $init = 1;
        while (is_int($x)) {
            $x /= $init;
            $init++;
        }
        $inita = $init - 2;
        return $inita;
    }

    function desmont($x, $p) {
        $b = "n";
        while ($x <= $p) {
            $b .= "(n-$x)";
            $x++;
        }
        return $b;
    }

    function cortar($x, $p) {
        $c = "n";
        while ($x <= ($p - 1)) {
            $c .= "(n-$x)";
            $x++;
        }
        return $c;
    }
    
    function porcentagem ( $parcial, $total ) {
    return ( $parcial * 100 ) / $total;
}

    
    ?>
</html>



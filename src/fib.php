<body>
<p>
<?php
    $c = 0 ;
    $a = 0 ;

    echo "$c: $a<br>" ;

    $c++ ;
    $b = 1 ;

    echo "$c: $a<br>" ;

    $c++ ;

    while ($c <= (int)$_GET["howmany"]) {
        $n = $a + $b ;
        echo "$c: $a<br>" ;

        $c++ ;
        $a = $b ;
        $b = $n ;
    }
?>
</p>
</body>
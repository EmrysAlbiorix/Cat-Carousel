<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Sequence</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<script>
$(document).ready(function(){
    $("#howmanysubmit").click(function() {
        const howmany = $("#howmany").val();
        console.log(howmany);
        $("#howmanyinput").val(howmany);
        $("form").submit();
    });
});
</script>

<div style="display:flex">
    <form method="GET">
        <label for="howmany">How deep do you want to go *devilface*</label>
        <input id="howmany" type="number" name="howmanyinput" />
        <button id="howmanysubmit" type="button">Submit</button>
    </form>
</div>

<p>
<?php
if(isset($_GET["howmanyinput"])) {
    $c = 0 ;
    $a = 0 ;

    echo "$c: $a<br>" ;

    $c++ ;
    $b = 1 ;

    echo "$c: $a<br>" ;

    $c++ ;

    while ($c <= (int)$_GET["howmanyinput"]) {
        $n = $a + $b ;
        echo "$c: $a<br>" ;

        $c++ ;
        $a = $b ;
        $b = $n ;
    }
}
?>
</p>

</body>
</html>

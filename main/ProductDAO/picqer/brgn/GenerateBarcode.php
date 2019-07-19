<!-- <html>
    <head>
    <style>
        p.inline {display: inline-block;}
        span { font-size: 13px;}
    </style>
    <style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */

        }
    </style>
    </head>
    <body onload="window.print();">
        <div style="margin-left: 5%">
            <?php
            include('../barcode128.php');
            $code = $_GET['code'];
            $name = $_GET['name'];
            $price = $_GET['price'];
            $BRQTY = $_GET['BRQTY'];

            for($i=1;$i<=$BRQTY;$i++){
            	echo "<p class='inline'><span><b>Fashion Boutique (fb)</b></span><br><span ><b>Item: $name</b></span><span>".bar128(stripcslashes($code))."</span><span ><b>Price: ".$price." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
            }

            ?>
        </div>
    </body>
</html> -->

<?php

include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorPNG.php');

$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();

$code = $_GET['code'];
$name = $_GET['name'];
$price = $_GET['price'];
$BRQTY = $_GET['BRQTY'];

echo 'Fashion Boutique (fb)<br>';
echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128)) . '"></br>';
echo $code.'<br>';
echo '<b>Price: '.$price.'</b></br>';
 ?>
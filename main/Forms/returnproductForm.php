<html>
    <?php //include('../head.php'); 
    ?>
<body >
    <form action="returnProduct.php" method="get" class="mt-3">
        <div id="ac">
            <input type="hidden" name="invoice" value="<?php echo $_GET['invoice'];  ?>"/>
            <input type="hidden" name="product" value="<?php echo $_GET['product']; ?>"/>
            <input type="hidden" name="amount" value="<?php echo $_GET['amount'] ?>"/>
            <input type="hidden" name="qty" value="<?php echo $_GET['qty'] ?>"/>
            <div class="form-group">
                <?php 
                    include('../../connect.php'); 
                    $proQty = $db->prepare("SELECT qty from sales_order WHERE invoice = :invoice AND product = :product"); 
                    $proQty = $proQty->execute(array(':invoice'=>$_GET['invoice'], ':product'=>$_GET['product']));
                    ?>
                <input type="text" size="25" value="" name="rtnQty" class="form-control" autocomplete="off" maxlength="<?php echo $proQty ?>" placeholder="Enter Quentity" value="1" style="width: 268px;" required autofocus />
            </div>
            <input class="btn btn-success" type="submit" value="Return" style="width: 268px;" />
        </div>
    </form>
</body>
</html>
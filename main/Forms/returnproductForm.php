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
                <input type="text" size="25" value="" name="rtnQty" class="form-control" autocomplete="off" placeholder="Enter Quentity" value="1" style="width: 268px;" required autofocus />
            </div>
            <input class="btn btn-success" type="submit" value="Return" style="width: 268px;" />
        </div>
    </form>
</body>
</html>
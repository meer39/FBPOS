<html>
    <?php //include('../head.php'); 
    ?>
<body >
    <form action="returnPurchaseQueries.php" method="get" class="mt-3">
        <div id="ac">
            <input type="hidden" name="name" value="<?php echo $_GET['name']; ?>"/>
            <input type="hidden" name="qty" value="<?php echo $_GET['qty'] ?>"/>
            <input type="hidden" name="cost" value="<?php echo $_GET['cost'] ?>"/>
            <input type="hidden" name="invoice" value="<?php echo $_GET['invoice'];  ?>"/>
            <div class="form-group">
                <?php 
                    include('../../connect.php'); 
                    $proQty = $db->prepare("SELECT qty from purchases_item WHERE invoice = :invoice AND name = :product"); 
                    $proQty = $proQty->execute(array(':invoice'=>$_GET['invoice'], ':product'=>$_GET['name']));
                    ?>
                <input type="text" size="25" value="" name="rtnQty" class="form-control" autocomplete="off" maxlength="<?php echo $proQty ?>" placeholder="Enter Quentity" value="1" style="width: 268px;" required autofocus />
            </div>
            <input class="btn btn-success" type="submit" value="Return" style="width: 268px;" />
        </div>
    </form>
</body>
</html>
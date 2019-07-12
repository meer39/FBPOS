<?php 
include('../connect.php');
try{
 
    //We start our transaction.
    $db->beginTransaction();

    $invoice = $_GET['invoice'];
    $product = $_GET['product'];
    $amount = $_GET['amount'];
    $qty = $_GET['qty'];
    $rtnQty = $_GET['rtnQty'];

    $returnAmount = ($amount / $qty) * $rtnQty;

    // echo $returnAmount;
    session_start();
    $return = "INSERT INTO return_product (invoice, product_code, amount, rtnQty, user, type) VALUES (:invoice, :product, :amount, :rtnQty, :user, :type)";
    $return = $db->prepare($return);    
    $return->execute(array(':invoice'=>$invoice, ':product'=>$product, ':amount'=>$returnAmount, ':rtnQty'=>$rtnQty, ':user'=>$_SESSION['SESS_LAST_NAME'], ':type'=>'sale'));

    $updateSales = "UPDATE sales SET amount = amount-:rtnAmount WHERE invoice_number = :invoice";
    $updateSales = $db->prepare($updateSales);
    $updateSales->execute(array(':rtnAmount'=>$returnAmount, ':invoice'=>$invoice));

    $updateQuantityInProduct = "UPDATE products SET qty = qty + :rtnQty WHERE product_code = :product";
    $updateQuantityInProduct = $db->prepare($updateQuantityInProduct);
    $updateQuantityInProduct->execute(array(':rtnQty'=>$rtnQty, ':product'=>$product));

    $updateQuantityInSalesOrder = "UPDATE sales_order SET qty = qty - :rtnQty, amount = amount - :rtnAmount WHERE product = :product AND invoice = :invoice";
    $updateQuantityInSalesOrder = $db->prepare($updateQuantityInSalesOrder);
    $updateQuantityInSalesOrder->execute(array(':rtnQty'=>$rtnQty, ':rtnAmount'=>$returnAmount, ':product'=>$product, ':invoice'=>$invoice));
    $db->commit();
    header("location: SaleReturn.php?invoice=".$invoice);    
} 
//Our catch block will handle any exceptions that are thrown.
catch(Exception $e){
    //An exception has occured, which means that one of our database queries
    //failed.
    //Print out the error message.
    echo $e->getMessage();
    //Rollback the transaction.
    $db->rollBack();
}

?>
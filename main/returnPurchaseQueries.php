<?php 
include('../connect.php');
try{
    
    // echo '<pre>';
    // print_r($_GET);
    // die;

    $name = $_GET['name'];
    $qty = $_GET['qty'];
    $cost = $_GET['cost'];
    $invoice = $_GET['invoice'];
    $rtnQty = $_GET['rtnQty'];
    $db->beginTransaction();

    $pricePerProduct = $cost / $qty;
    $priceToReturn = $pricePerProduct * $rtnQty;
    $newCost = $cost - $priceToReturn;
    $newQty = $qty - $rtnQty;

    // echo $pricePerProduct." ".$priceToReturn." ".$newCost." ".$newQty;
    session_start();
    $return = "INSERT INTO return_product (invoice, product_code, amount, rtnQty, user, type) VALUES (:invoice, :product, :amount, :rtnQty, :user, :type)";
    $return = $db->prepare($return);    
    $return->execute(array(':invoice'=>$invoice, ':product'=>$name, ':amount'=>$priceToReturn, ':rtnQty'=>$rtnQty, ':user'=>$_SESSION['SESS_LAST_NAME'], ':type'=>'purchase'));
    
    $updatePurchase = "UPDATE purchases_item SET qty =:newQty, cost = :newCost WHERE invoice = :invoice AND name = :name";
    $updatePurchase = $db->prepare($updatePurchase);
    $updatePurchase->execute(array(':newQty'=>$newQty, ':newCost'=>$newCost, ':invoice'=>$invoice, ':name'=>$name));

    $updateProduct = "UPDATE products SET qty = :newQty WHERE product_code = :name";
    $updateProduct = $db->prepare($updateProduct);
    $updateProduct->execute(array(':newQty'=>$newQty, ':name'=>$name));

    echo 'success';
    $db->commit();

    header("location: returnPurchase.php?invoice=".$invoice);    
} 

catch(Exception $e){
    
    echo $e->getMessage();
    
    $db->rollBack();
}

?>
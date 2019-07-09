<?php
session_start();
include('../connect.php');

$a = $_POST['invoice'];
$w = $_POST['pt'];

$chk = $db->prepare("SELECT product_code FROM products where product_code = :product");
$chk->bindParam(':product', $_POST['product']);
$chk->execute();
$newChk = $chk->fetch();

// echo $newChk['product_code'];

if($newChk['product_code'] == $_POST['product'])
{
    $b = $_POST['product'];
    $c = $_POST['qty'];
    $discount = $_POST['discount'];
    $result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
    $result->bindParam(':userid', $b);
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
    $price=$row['price'];
    $name=$row['product_name'];
    }

    //edit qty
    $sql = "UPDATE products 
            SET qty=qty-?
    		WHERE product_code=?";
    $q = $db->prepare($sql);
    $q->execute(array($c,$b));
    $priceAfterDiscount=$price-$discount;
    $d=$priceAfterDiscount*$c;
    // query
    $sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,discount) VALUES (:a,:b,:c,:d,:e,:f,:g)";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$price,':g'=>$discount));
    header("location: sales.php?id=$w&invoice=$a");
}
else
{
    header("location: sales.php?id=$w&invoice=$a");
}


?>
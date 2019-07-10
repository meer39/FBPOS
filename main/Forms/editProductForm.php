<?php
	include('../../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="ProductDAO/saveEditProduct.php" method="post" class="mt-3">
	<div id="ac">
        <input type="hidden" name="memi" value="<?php echo $id; ?>" />
		<div class="form-group">
			<input type="text" name="code" placeholder="Product Code" class="form-control" required value="<?php echo $row['product_code']; ?>"/>
			<!-- <span>Product Code : </span><input type="text" name="code" /><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="name" placeholder="Product Name" class="form-control" required value="<?php echo $row['product_name']; ?>"/>
			<!-- <span>Product Name : </span><input type="text" name="name" /><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="cost" placeholder="Produst Cast" class="form-control" required value="<?php echo $row['cost']; ?>"/>
			<!-- <span>Cost : </span><input type="text" name="cost" /><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="price" placeholder="Product Price" class="form-control" required  value="<?php echo $row['price']; ?>"/>
			<!-- <span>Price : </span><input type="text" name="price" /><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="size" placeholder="Size" class="form-control" required value="<?php echo $row['size']; ?>"/>
			<!-- <span>size :</span><input type="text" name="size"/><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="color" placeholder="Color" class="form-control" required value="<?php echo $row['color']; ?>"/>
			<!-- <span>color :</span><input type="text" name="color"/><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="category" placeholder="Category" class="form-control" required value="<?php echo $row['category']; ?>"/>
			<!-- <span>Category :</span><input type="text" name="category"/> -->
		</div>
		<!-- <span>Supplier : </span> -->
		<div class="form-group">
		<select name="supplier" class="form-control" placeholder="Supplier" required>
            <option><?php echo $row['supplier']; ?></option>
            <?php
            $results = $db->prepare("SELECT * FROM supliers");
                $results->bindParam(':userid', $res);
                $results->execute();
                for($i=0; $rows = $results->fetch(); $i++){
            ?>
                <option><?php echo $rows['suplier_name']; ?></option>
            <?php
            }
            ?>
		</select>
		</div>
		<div class="form-group">
			<input type="text" name="qty" placeholder="Quantity" class="form-control" required value="<?php echo $row['qty']; ?>"/>		
			<!-- <span>Qty : </span><input type="text" name="qty" /><br> -->
		</div>
		<input type="submit" value="save"  class="btn btn-primary float-right"/>
	</div>
</form>
<?php
}
?>
<form action="ProductDAO/saveproduct.php" method="post" class="mt-3">
	<div id="ac">
		<div class="form-group">
			<?php $no = rand(0, 99999999); $no = str_pad($no, 12, "0", STR_PAD_LEFT);
			// function generateRandomString($length = 8) {
			// 	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			// 	$charactersLength = strlen($characters);
			// 	$randomString = '';
			// 	for ($i = 0; $i < $length; $i++) {
			// 		$randomString .= $characters[rand(0, $charactersLength - 1)];
			// 	}
			// 	return $randomString;
			// } ?>
			<input type="text" name="code" placeholder="Product Code" class="form-control" value="<?php echo $no; ?>" required readonly/>
			<!-- <span>Product Code : </span><input type="text" name="code" /><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="name" placeholder="Product Name" class="form-control" required autofocus/>
			<!-- <span>Product Name : </span><input type="text" name="name" /><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="cost" placeholder="Purchase Cast" class="form-control" required />
			<!-- <span>Cost : </span><input type="text" name="cost" /><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="price" placeholder="Sale Price" class="form-control" required />
			<!-- <span>Price : </span><input type="text" name="price" /><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="size" placeholder="Size" class="form-control" />
			<!-- <span>size :</span><input type="text" name="size"/><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="color" placeholder="Color" class="form-control" required />
			<!-- <span>color :</span><input type="text" name="color"/><br> -->
		</div>
		<div class="form-group">
			<input type="text" name="category" placeholder="Category" class="form-control" required />
			<!-- <span>Category :</span><input type="text" name="category"/> -->
		</div>
		<!-- <span>Supplier : </span> -->
		<div class="form-group">
		<select name="supplier" class="form-control" placeholder="Supplier" required>
			<option value="	">Select Supplier</option>
			<?php
			include('../../connect.php');
			$result = $db->prepare("SELECT * FROM supliers");
				$result->bindParam(':userid', $res);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
				<option><?php echo $row['suplier_name']; ?></option>
			<?php
			}
			?>
		</select>
		</div>
		<!-- <div class="form-group">
			<input type="text" name="qty" placeholder="Quantity" class="form-control" required />		
			<span>Qty : </span><input type="text" name="qty" /><br>
		</div> -->
		<input type="submit" value="save"  class="btn btn-primary float-right"/>
	</div>
</form>
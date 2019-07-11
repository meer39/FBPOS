<?php include('../head.php'); ?>
<form action="PurchaseDAO/savePurchase.php" method="post" class="mt-3">
	<div id="ac">
		<div class="form-group">
			<input type="date" name="date" placeholder="MM/DD/YYYY" class="form-control" required />
		</div>
		<div class="form-group">
			<input type="text" name="iv" placeholder="Invoice Number"class="form-control" required/>
		</div>
		<div class="form-group">
			<select name="supplier" class="form-control" required>
				<option value="" disabled selected>Select Supplier</option>
				<?php
				include('../../connect.php');
				$result = $db->prepare("SELECT * FROM supliers");
					$result->bindParam(':userid', $res);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
					<option value="<?php echo $row['suplier_name']; ?>"><?php echo $row['suplier_name']; ?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="remarks" placeholder="Remarks" class="form-control"/><br>
		</div>
		<input class="btn btn-success float-right" type="submit" value="save"  />
	</div>
</form>
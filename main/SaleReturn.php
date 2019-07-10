<html>
<?php include('head.php'); ?>
<body>
<div id="maintable">
    <div style="margin-top: -19px; margin-bottom: 21px;">
        <a class="btn btn-danger" href="index.php" style="float: none;">Back</a>
    </div>
<!-- <input type="text" name="filter" value="" id="filter" placeholder="Search Customer..." autocomplete="off" /><a rel="facebox" class="btn btn-success float-right" href="Forms/addPurchasesForm.php">Add Purchases</a><br><br> -->
<table id="resultTable" class="table table-hover">
	<thead>
		<tr>
			<th width="20%"> Invoice Number </th>
			<th width="20%"> Product Code </th>
			<th width="20%"> Product Name </th>
			<th width="10%"> Qty </th>
			<th width="10%"> Price </th>
			<th width="11%"> Discount </th>
			<th width="11%"> Amount </th>
			<th width="12%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
                $result = $db->prepare("SELECT * FROM sales_order WHERE invoice = :invoice");
                $result->bindParam(':invoice', $_GET['invoice']);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
                <td><?php echo $row['invoice']; ?></td>
                <td><?php echo $row['product']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['discount']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <?php if($row['qty'] > 0){ ?>
                <td><a rel="facebox" href="Forms/returnProductForm.php?invoice=<?php echo $row['invoice'] ?>&product=<?php echo $row['product'] ?>&amount=<?php echo $row['amount'] ?>&qty=<?php echo $row['qty'] ?>"> Return </a>
                <?php } ?>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</body>
</html>
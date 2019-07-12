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
			<th width="20%"> Product Name </th>
			<th width="10%"> Qty </th>
			<th width="10%"> Cost </th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
                $result = $db->prepare("SELECT * FROM purchases_item WHERE invoice = :invoice");
                $result->bindParam(':invoice', $_GET['invoice']);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
                <td><?php echo $row['invoice']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['cost']; ?></td>
                <?php if($row['qty'] > 0){ ?>
                <td><a rel="facebox" href="Forms/returnPurchaseForm.php?invoice=<?php echo $row['invoice'] ?>&name=<?php echo $row['name'] ?>&cost=<?php echo $row['cost'] ?>&qty=<?php echo $row['qty'] ?>"> Return </a>
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
<html>
	<?php 
		require_once('auth.php');
		include('head.php');
		include('../connect.php');

	?>
	<body>
		<div id="maintable">
			<div style="margin-top: -19px; margin-bottom: 21px;">
				<a class="btn btn-danger" href="index.php" style="float: none;">Back</a>
			</div>
			<form action="incoming.php" method="post" onkeydown="return event.key != 'Enter';">
				<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
				<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
				<div class="form-group row">
					<div class="col-sm-8">
						<input type="text" name="product" class="form-control" placeholder="Product ID" autofocus>
					</div>
					<div class="col-sm-1">					
						<input type="text" name="qty" value="1" placeholder="Qty" autocomplete="off" class="form-control" />
					</div>
					<div class="col-sm-1">
						<?php
							$discount = $db->prepare("SELECT discount FROM discount");
							$discount->execute();
							$discount = $discount->fetch();
						?>
						<input type="text" name="discount" value="<?php echo $discount['discount']; ?>" autocomplete="off" class="form-control" readonly/>
					</div>
					<div class="col-sm-2">
						<input type="submit" class="btn btn-primary" value="save" style="width: 123px;" />					
					</div>
				</div>				
			</form>
			
			<table id="resultTable" data-responsive="table" class="table table-hover table-bordered">
				<thead>
					<tr>
						<th> Product Code </th>
						<th> Product Name </th>
						<th> Qty </th>
						<th> Price </th>
						<th> Discount </th>
						<th> Amount </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						$invoice=$_GET['invoice'];
						include('../connect.php');
						$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
						$result->bindParam(':userid', $invoice);
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
					?>
					<tr class="record">
						<td><?php echo $row['product']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['qty']; ?></td>
						<td>
						<?php
						$ppp=$row['price'];
						echo formatMoney($ppp, true);
						?>
						</td>
						<td>
						<?php
						$ddd=$row['discount'];
						echo formatMoney($ddd, true);
						?>
						</td>
						<td>
						<?php
						$dfdf=$row['amount'];
						echo formatMoney($dfdf, true);
						?>
						</td>
						<td><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"> Delete </a></td>
					</tr>
					<?php
						}
					?>
					<tr>
						<td colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
						<td colspan="2"><strong style="font-size: 12px; color: #222222;">
						<?php
						function formatMoney($number, $fractional=false) {
							if ($fractional) {
								$number = sprintf('%.2f', $number);
							}
							while (true) {
								$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
								if ($replaced != $number) {
									$number = $replaced;
								} else {
									break;
								}
							}
							return $number;
						}
						$sdsd=$_GET['invoice'];
						$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
						$resultas->bindParam(':a', $sdsd);
						$resultas->execute();
						for($i=0; $rowas = $resultas->fetch(); $i++){
						$fgfg=$rowas['sum(amount)'];
						echo formatMoney($fgfg, true);
						}
						?>
						</strong></td>
					</tr>				
				</tbody>
			</table>
			<a rel="facebox" class="btn btn-success float-right" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>">Check Out</a>
			<!-- <div class="clearfix"></div> -->
		</div>
	</body>
</html>
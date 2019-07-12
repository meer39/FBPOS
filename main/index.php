<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="bs/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<?php
	require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<div id="header" style="text-align: center; font-size: 20px; margin: 40px 0;"> fb - Fashion Botique 
</div>
<div id="mainmain">
<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a>
<a href="sales.php?id=credit&invoice=<?php echo $finalcode ?>">Credit</a>
<a href="../index.php">Logout</a>
<?php
}
if($position=='admin') {
?>
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>" class="card mb-4 py-3" style="width: 20rem;">
  	<div class="card-body">
    	<h5 class="card-title">Invoice</h5>
	</div>
</a>
<a rel="facebox" href="Forms/saleReturnForm.php" class="card mb-4 py-3" style="width: 20rem;">
	<div class="card-body">	
    	<h5 class="card-title">Sales Return</h5>
	</div>
</a>

<a href="products.php" class="card mb-4 py-3" style="width: 20rem;">
	<div class="card-body">	
    	<h5 class="card-title">Products</h5>
	</div>
</a>
<a href="purchaseslist.php" class="card mb-4 py-3" style="width: 20rem;">
	<div class="card-body">	
    	<h5 class="card-title">Purchases</h5>
	</div>
</a>
<a rel="facebox" href="Forms/PurchaseInvoiceForm.php" class="card mb-4 py-3" style="width: 20rem;">
	<div class="card-body">	
    	<h5 class="card-title">Purchase Return</h5>
	</div>
</a>
<a href="customer.php" class="card mb-4 py-3" style="width: 20rem;">
	<div class="card-body">	
    	<h5 class="card-title">Customers</h5>
	</div>
</a>
<a href="supplier.php" class="card mb-4 py-3" style="width: 20rem;">
	<div class="card-body">	
    	<h5 class="card-title">Suppliers</h5>
	</div>
</a>
<a href="salesreport.php?d1=0&d2=0" class="card mb-4 py-3" style="width: 20rem;">
	<div class="card-body">	
    	<h5 class="card-title">Sales Report</h5>
	</div>
</a>
<a rel="facebox" href="select_customer.php" class="card mb-4 py-3" style="width: 20rem;">
	<div class="card-body">	
    	<h5 class="card-title">Customer Ledger</h5>
	</div>
</a>
<a href="../logout.php" class="card mb-4 py-3" style="width: 20rem;">
	<div class="card-body">	
    	<h5 class="card-title">Logout</h5>
	</div>
</a>

<!-- <a href="collection.php?d1=0&d2=0">Collection Report</a> -->
<!-- <a href="accountreceivables.php?d1=0&d2=0">Accounts Receivable Report</a> -->
<!-- <a href="sales.php?id=credit&invoice=<?php echo $finalcode ?>">Credit</a> -->
<?php
}
?>
<div class="clearfix"></div>
</div>

<form action="ProductDAO/GenerateBarcode.php" method="get" class="mt-3">
    <div id="ac">
        <input type="hidden" value="<?php echo $_GET['code'] ?>" name="code" >
        <input type="hidden" value="<?php echo $_GET['name'] ?>" name="name" >
        <input type="hidden" value="<?php echo $_GET['price'] ?>" name="price" >
        <div class="form-group">
            <input class="form-control" type="text" name="BRQTY" placeholder="No. of Barcodes" required />
        </div>
        <input class="btn btn-success float-right" type="submit" value="save"/>
    </div>
</form>
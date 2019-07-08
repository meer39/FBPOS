<form action="SupplierDAO/saveSupplier.php" method="post">
    <div id="ac">
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Name" required />
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Address" type="text" name="address"/>
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Contact" type="text" name="contact" required/>        
        </div>
        <input class="btn btn-success float-right" type="submit" value="save" required/>
    </div>
</form>
<form action="CustomerDAO/saveCustomer.php" method="post">
    <div id="ac">
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Name" required/>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="address" placeholder="Address" />        
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="contact" placeholder="Contact" />
        </div>
        <input class="btn btn-success float-right" type="submit" value="save" />
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<form>
    <div class="form-group">
        <label for="formGroupExampleInput">Example label</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Another label</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
    </div>
</form>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Shipping Address</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="recipient_name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Street:</label>
                        <input type="text" class="form-control" id="recipient_street" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">City:</label>
                        <input type="text" class="form-control" id="recipient_city" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">State:</label>
                        <input type="text" class="form-control" id="recipient_state" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Zip:</label>
                        <input type="text" class="form-control" id="recipient_zip" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Phone:</label>
                        <input type="text" class="form-control" id="recipient_phone">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Email:</label>
                        <input type="text" class="form-control" id="recipient_email">
                    </div>
                    <input type="hidden" class="form-control" id="product_id" value="<?php echo $row['product_id']?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="    border-radius: 3px;">Close</button>
                <button type="button" class="btn btn-primary send_shipping_info" style="    border-radius: 3px;">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>

    $('.send_shipping_info').click(function(){

        var recipient_name = $('#recipient_name').val();
        var recipient_street = $('#recipient_street').val();
        var recipient_city = $('#recipient_city').val();
        var recipient_state = $('#recipient_state').val();
        var recipient_zip = $('#recipient_zip').val();
        var recipient_phone = $('#recipient_phone').val();
        var recipient_email = $('#recipient_email').val();
        var product_id = $('#product_id').val();
        var type = "pp";
        console.log(product_id);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>home/shipping",
            data: {
                recipient_name:recipient_name,
                recipient_street:recipient_street,
                recipient_city:recipient_city,
                recipient_state:recipient_state,
                recipient_zip:recipient_zip,
                recipient_phone:recipient_phone,
                recipient_email:recipient_email,
                product_id:product_id
            },
            success: function(data) {

                console.log(data);
                location.reload();
                // $("#text_obj_id").val("data Quagmire");

            },
            error: function(ts){
                alert(ts.responseText);
                console.log(ts.responseText);
            }
        });
        return false;
    });
</script>
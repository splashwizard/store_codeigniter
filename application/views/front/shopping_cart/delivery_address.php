
<?php
if($this->session->userdata('user_login')== "yes"){
    $user       = $this->session->userdata('user_id');
    $user_data  = $this->db->get_where('user',array('user_id'=>$user))->row();
    $username   = $user_data->username;
    $first_name   = $user_data->first_name;
    $last_name   = $user_data->last_name;
    $surname    = $user_data->surname;
    $email      = $user_data->email;
    $phone      = $user_data->phone;
    $address1   = $user_data->address1;
    $city   = $user_data->city;
    $state   = $user_data->state;
    $langlat    = $user_data->langlat;
    $address    = $address1.$address2;
    $zip        = $user_data->zip;
}

$carted = $this->cart->contents();

foreach ($carted as $items){
    ?>
    <div class="logsection mab-30">
        <div>
            Is the address you'd like to use displayed below? If so, click the corresponding "Deliver to this address" button. Or you can edit shipping address.
        </div><br>

        <div style="border: 1px solid #afafaf; border-radius: 8px; overflow: hidden; padding: 15px;">
            <div class="form-group">
                <label for="recipient-name" class="control-label">Name:</label>
                <input type="text" class="form-control" id="recipient_name" value="<?php echo $username ;?>"  placeholder="<?php echo translate('name');?>" required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">Street:</label>
                <input type="text" class="form-control" id="recipient_street"  value="<?php echo $address1; ?>" placeholder="<?php echo translate('street');?>" required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">City:</label>
                <input type="text" class="form-control" id="recipient_city"  value="<?php echo $city; ?>" placeholder="<?php echo translate('city');?>" required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">State:</label>
                <input type="text" class="form-control" id="recipient_state"   value="<?php echo $state; ?>" placeholder="<?php echo translate('state');?>" required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">Zip:</label>
                <input type="text" class="form-control" id="recipient_zip"  value="<?php echo $zip; ?>" placeholder="<?php echo translate('zip');?>" required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">Phone:</label>
                <input type="text" class="form-control" id="recipient_phone" value="<?php echo $phone ;?>"  placeholder="<?php echo translate('phone number');?>">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">Email:</label>
                <input type="text" class="form-control" id="recipient_email" value="<?php echo $email  ;?>"  placeholder="<?php echo translate('email');?>">
            </div>
            <input type="hidden" class="form-control" id="product_id" value="<?php echo $items['id']?>">
        </div>
    </div>

    <?php
}
?>

<div class="row ">

    <div class="col-sm-12" id="lnlat" style="display:none;">
        <div class="form-group">
            <div class="col-sm-12">
                <input id="langlat" value="" type="text" placeholder="langitude - latitude" name="langlat" class="form-control" readonly>
            </div>
        </div>
    </div>


    <div class="col-md-12" style="display:none;">
        <div class="checkbox">
            <label>
                <input type="checkbox">
                <?php echo translate('ship_to_different_address_for_invoice');?>
            </label>
        </div>
    </div>

    <div class="col-md-12 nxtcbtns">
        <span class="contunie__checkout__btn themebgcolor noborder mar-5" onclick="send_delivery_address();">
               <?php echo translate('Deliver to this address');?>
            </span>
        <a class="cancelorder__btn blackbg" href="<?php echo base_url(); ?>home/cancel_order">
            <?php echo translate('cancel_order');?>
        </a>
    </div>
</div>
<input type="hidden" id="first" value="yes"/>

<script type="text/javascript">
    $(document ).ready(function() {

        set_cart_map();
    });

</script>




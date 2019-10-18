

<?php
echo form_open(base_url() . 'home/cart_finish/go', array(
        'method' => 'post',
        'enctype' => 'multipart/form-data',
        'id' => 'cart_form'
    )
);
?>
<script src="https://checkout.stripe.com/checkout.js"></script>

<!-- PAGE -->
<?php
$luserid=$this->session->userdata('user_id');
if($luserid !=''){
    $queryuserstate = $this->db->query("select * from user where user_id=$luserid");
    $rowuserstate = $queryuserstate->row();
    $ustate=$rowuserstate->state;
}

?>
<section class="page-section color mat-30">
    <div class="container">
        <div class="col-md-8">
            <div class="profiledtlssection paymenttabber mab-30">
                <div class="tabs-wrapper content-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active" id="ctabdadd">
                            <a href="#tabdaddress" data-toggle="tab"><?php echo translate('delivery_address');?></a>
                        </li>
                        <li id="ctab_select">
                            <a href="#tab_select"><?php echo translate('select_option');?></a>
                        </li>
                        <li id="ctaborder">
                            <a href="#taborder"><?php echo translate('orders');?></a>
                        </li>
                        <li id="ctabpayoption">
                            <a href="#tabpayment"><?php echo translate('payments_options');?></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade active in" id="tabdaddress">
                    <div  class="form-delivery delivery_address"></div>
                </div>
                <div class="tab-pane fade" id="tab_select" style="    padding: 10px 0 10px 41px;border: solid 1px gray; border-radius: 5px;">
                    <div  class="select_shipping_option"></div>
                </div>
                <div class="tab-pane fade"  id="taborder">
                    <div class="orders"></div>
                </div>
                <div class="tab-pane fade" id="tabpayment">
                    <div class="panel-group payments-options" id="accordion" role="tablist" aria-multiselectable="true"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="scartdtls_calculation">
                <h3 class="scart_title information-title mat-0"><span><?php echo translate('shopping_cart');?></span></h3>
                <div class="shopping-cart" style="background: #fff;">
                    <table class="cartptable">
                        <tr>
                            <td><?php echo translate('subtotal');?>:</td>
                            <td  id="total"></td>
                        </tr>
                        <tr style="display: none">
                            <td><?php echo translate('tax');?>:</td>
                            <td id="tax">2</td>
                        </tr>
                        <tr style="display: none">
                            <td><?php echo translate('shipping');?>:</td>
                            <td id="shipping"></td>
                        </tr>
                        <tr class="coupon_disp" <?php if($this->cart->total_discount()<=0){ ?>style="display:none;" <?php } ?>>
                            <td><?php echo translate('coupon_discount');?></td>
                            <td id="disco">
                                <?php echo currency($this->cart->total_discount()); ?>
                            </td>
                        </tr>
                        <tfoot>
                        <tr>
                            <td><?php echo translate('grand_total');?>:</td>
                            <td class="grand_total" id="grand"></td>
                        </tr>
                        </tfoot>
                    </table>
                    <?php if($this->cart->total_discount() <= 0 && $this->session->userdata('couponer') !== 'done' && $this->cart->get_coupon() == 0){ ?>

                        <h5>
                            <?php echo translate('enter_your_coupon_code_if_you_have_one');?>.
                        </h5>
                        <div class="form-group">
                            <input type="text" class="form-control coupon_code" placeholder="Enter your coupon code">
                        </div>
                        <span class="cancelorder__btn blackbg coupon_btn text-center">
		                <?php echo translate('apply_coupon');?>
		            </span>

                    <?php } else { ?>
                        <p>
                            <?php echo translate('coupon_already_activated'); ?>
                        </p>
                    <?php } ?>
                </div>
                <span class="contunie__checkout__btn themebgcolor noborder text-center fullwidth mat-10 mab-20 disabled" id="order_place_btn" onclick="cart_submission();" style="display: none">
		                <?php echo translate('Place_Order_Now');?>
		            </span>
            </div>
        </div>
        <input type="hidden" name="total1" id="total1" value="" />
        <input type="hidden" name="tax1" id="tax1" value="" />
        <input type="hidden" name="shipping1" id="shipping1" value="" />
        <input type="hidden" name="grand_total1" id="grand_total1" value="" />


    </div>
</section>
<!-- /PAGE -->
</form>
<!--Change State-->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <h4 class="modal-title">Change State</h4>
            </div>
            <div class="modal-body">
                <select class="form-control required" name="cstate" >
                    <option value=""><?php echo translate('state');?></option>
                    <?php
                    $this->db->where('action','Y');
                    $statelist=$this->db->get('shiping_state')->result_array();
                    foreach($statelist as $srow){
                        ?>
                        <option value="<?php echo $srow['sname'];?>" <?php if($srow['sname'] == $ustate) echo"selected"; ?>><?php echo $srow['sname'];?></option>
                    <?php } ?>
                </select>
                <input type="hidden" name="userid" value="<?php echo $luserid; ?>" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="substate">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--Change State-->
<script>
    $(document).ready(function(){
        var top = Number(200);
        $('.orders').html('<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>');
        var state = check_login_stat('state');
        state.success(function (data) {
            if(data == 'hypass'){
                load_address_form();
                // load_orders();
            } else {
                signin('guest_checkout');
            }
        });
    });
    function load_address_form(){
        var top = Number(200);

        $('.delivery_address').html('<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>');
        $('.delivery_address').load('<?php echo base_url(); ?>home/cart_checkout/delivery_address');
    }
    function load_orders(data){
        var top = Number(200);
        $('#tabdaddress, #tabpayment, #tab_select').removeClass('active in');
        $('#taborder').addClass('active in');
        $('#ctabdadd, #ctabpayoption, #ctab_select').removeClass('active');
        $('#ctaborder').addClass('active');
        $('#ctaborder a').attr("data-toggle","tab");


        $('.orders').html('<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>');
        $('.orders').load('<?php echo base_url(); ?>home/cart_checkout/orders/'+data,
            function(){
                var top_off = $('.header').height();
                $('.selectpicker').selectpicker();
                $('html, body').animate({
                    scrollTop: $(".orders").offset().top-(2*top_off)
                }, 1000);
            }
        );
    }

    function select_shipping_option(data){
        var top = Number(200);
        $('#tabdaddress, #tabpayment, #taborder').removeClass('active in');
        $('#tab_select').addClass('active in');
        $('#ctabdadd, #ctabpayoption, #ctaborder').removeClass('active');
        $('#ctab_select').addClass('active');
        $('#ctab_select a').attr("data-toggle","tab");


        $('.select_shipping_option').html('<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>');
        $('.select_shipping_option').load('<?php echo base_url(); ?>home/cart_checkout/select_shipping_option/'+data,
            function(){
                var top_off = $('.header').height();
                $('.selectpicker').selectpicker();
                $('html, body').animate({
                    scrollTop: $(".select_shipping_option").offset().top-(2*top_off)
                }, 1000);
            }
        );
    }


    function load_payments(){
        $('#taborder, #tabdaddress').removeClass('active in');
        $('#tabpayment').addClass('active in');
        $('#ctaborder, #ctabdadd').removeClass('active');
        $('#ctabpayoption').addClass('active');
        $('#ctabpayoption a').attr("data-toggle","tab");

        $('#order_place_btn').removeClass('disabled');
        $('#order_place_btn').show();
        var okay = 'yes';
        var sel = 'no';
        // $('.delivery_address').find('.required').each(function(){
        //     if($(this).is('select') || $(this).is('input')){
        //         //alert($(this).val());
        //         if($(this).val() == ''){
        //             okay = 'no';
        //             if($(this).is('select')){
        //                 $(this).closest('.form-group').find('.selectpicker').focus();
        //             } else {
        //                 if(sel == 'no'){
        //                     $(this).focus();
        //                 }
        //             }
        //             //alert(okay);
        //             //$(this).css('background','red');
        //         }
        //     }
        // });
        if(okay == 'yes'){
            var top = Number(200);
            $('.payments-options').html('<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>');
            $('.payments-options').load('<?php echo base_url(); ?>home/cart_checkout/payments_options',
                function(){
                    var top_off = $('.header').height();
                    $('html, body').animate({
                        scrollTop: $(".payments-options").offset().top-(2*top_off)
                    }, 1000);
                }
            );
            $(".firstname").css('background','#fff');
            $(".lastname").css('background','#fff');
            $(".address1").css('background','#fff');
            $(".zip").css('background','#fff');
            $(".phone").css('background','#fff');
            var userinput = $("input[name=email]").val();
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
            if(!pattern.test(userinput))
            {
                $(".email").css('background','red');
            }else{
                $('#taborder, #tabdaddress').removeClass('active in');
                $('#tabpayment').addClass('active in');
                $('#ctaborder, #ctabdadd').removeClass('active');
                $('#ctabpayoption').addClass('active');
                $('#ctabpayoption a').attr("data-toggle","tab");
            }

        } else {
            var top_off = $('.header').height();
            $('html, body').animate({
                scrollTop: $(".delivery_address").offset().top-(2*top_off)
            }, 1000);
            var firstname=$("input[name=firstname]").val();
            var lastname=$("input[name=lastname]").val();
            var address1=$("input[name=address1]").val();
            var zip=$("input[name=zip]").val();
            var email=$("input[name=email]").val();
            var phone=$("input[name=phone]").val();
            if(firstname==""){
                $(".firstname").addClass('error').attr('placeholder','Please Enter Firstname');
            }else{
                $(".firstname").removeClass('error');
            }
            if(lastname==""){
                $(".lastname").addClass('error').attr('placeholder','Please Enter Lastname');
            }else{
                $(".lastname").css('background','#fff').removeClass('error');
            }
            if(address1==""){
                $(".address1").addClass('error').attr('placeholder','Please Enter Address Line1');
            }else{
                $(".address1").css('background','#fff').removeClass('error');
            }
            if(zip==""){
                $(".zip").addClass('error').attr('placeholder','Please Enter Zipcode');
            }else{
                $(".zip").css('background','#fff').removeClass('error');
            }
            if(email==""){
                $(".email").addClass('error').attr('placeholder','Please Enter Valid email');
            }else{
                $(".email").css('background','#fff').removeClass('error');
            }
            if(phone==""){
                $(".phone").addClass('error').attr('placeholder','Please Enter Phoneno');
            }else{
                $(".phone").css('background','#fff').removeClass('error');
            }

        }
    }
    function radio_check(id){
        $( "#visa" ).prop( "checked", false );
        $( "#mastercardd" ).prop( "checked", false );
        $( "#mastercard" ).prop( "checked", false );
        $( "#"+id ).prop( "checked", true );
    }
    function radio_check_rates(no, total){
        var i;
        for (i = 0; i <total; i++) {
            $( "#rate"+i ).prop( "checked", false );
        }
        $( "#rate"+no ).prop( "checked", true );

    }
    // Change state
    $("#substate").click(function(){
        var state = $('select[name="cstate"]').val();
        var userid = $('input[name="userid"]').val();
        $.ajax({
            type: "POST",
            url: "https://ryants.com/store/home/changestate",
            data: "state=" + state +"&userid="+userid,
            success: function(data){
                location.reload();
            }
        });
    });

</script>

<script>
    function send_delivery_address()
    {
        var recipient_name = $('#recipient_name').val();
        var recipient_street = $('#recipient_street').val();
        var recipient_city = $('#recipient_city').val();
        var recipient_state = $('#recipient_state').val();
        var recipient_zip = $('#recipient_zip').val();
        var recipient_phone = $('#recipient_phone').val();
        var recipient_email = $('#recipient_email').val();
        var product_id = $('#product_id').val();
        var type = "pp";
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
                   // alert(data);
                   select_shipping_option(data);

            },
              error: function(ts){
                alert(ts.responseText);
                  console.log(ts.responseText);
            }
        });
         return false;

  }
</script>

<script>
    function send_rate_id(rate_id, shippment_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>home/shipping_rate",
            data: {
                rate_id:rate_id,
                shippment_id:shippment_id,
            },
            success: function(data) {
                console.log(data);
                load_orders(data);
            },
            error: function(ts){
                alert(ts.responseText);
                console.log(ts.responseText);
            }
        });
        return false;
    }
</script>






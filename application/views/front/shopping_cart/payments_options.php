    <?php 
        $system_title = $this->db->get_where('general_settings',array('type' => 'system_title'))->row()->value;
        $total = $this->cart->total(); 
        if ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'product_wise') { 
            $shipping = $this->crud_model->cart_total_it('shipping'); 
        } elseif ($this->crud_model->get_type_name_by_id('business_settings', '3', 'value') == 'fixed') { 
            $shipping = $this->crud_model->get_type_name_by_id('business_settings', '2', 'value'); 
        } 
        $tax = $this->crud_model->cart_total_it('tax'); 
        $grand = $total + $shipping + $tax; 
        //echo $grand; 
    ?>
    <?php
        $p_set = $this->db->get_where('business_settings',array('type'=>'paypal_set'))->row()->value; 
        $c_set = $this->db->get_where('business_settings',array('type'=>'cash_set'))->row()->value; 
        $s_set = $this->db->get_where('business_settings',array('type'=>'stripe_set'))->row()->value;
        $c2_set = $this->db->get_where('business_settings',array('type'=>'c2_set'))->row()->value; 
        $vp_set = $this->db->get_where('business_settings',array('type'=>'vp_set'))->row()->value;
        $pum_set = $this->db->get_where('business_settings',array('type'=>'pum_set'))->row()->value;
        $ssl_set = $this->db->get_where('business_settings',array('type'=>'ssl_set'))->row()->value;
        $balance = $this->wallet_model->user_balance();
    ?> 
<ul class="paymentlist">
    <?php
        if($p_set == 'ok'){ 
    ?>
    <li class="cc-selector customradiogroup">
        <input id="visa" type="radio" checked name="payment_type" value="paypal"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="visa" onclick="radio_check('visa')">
            <img src="<?php echo base_url(); ?>template/front/img/preview/payments/paypal.jpg" alt="<?php echo translate('paypal');?>" />
            <span class="paymentname"><?php echo translate('paypal');?></span>
        </label>
    </li>
    <?php
        } if($s_set == 'ok'){
    ?>
    <li class="cc-selector customradiogroup">
        <input id="mastercardd" type="radio" name="payment_type" value="stripe"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardd" id="customButtong" onclick="radio_check('mastercardd')">
            <img src="<?php echo base_url(); ?>template/front/img/preview/payments/stripe.jpg" alt="<?php echo translate('stripe');?>" />
            <span class="paymentname"><?php echo translate('stripe');?></span>
        </label>
    </li>
    <script>
        $(document).ready(function(e) {
            //<script src="https://js.stripe.com/v2/"><script>
            //https://checkout.stripe.com/checkout.js
            var handler = StripeCheckout.configure({
                key: '<?php echo $this->db->get_where('business_settings' , array('type' => 'stripe_publishable'))->row()->value; ?>',
                image: '<?php echo base_url(); ?>template/front/img/stripe.png',
                token: function(token) {
                    // Use the token to create the charge with a server-side script.
                    // You can access the token ID with `token.id`
                    $('#cart_form').append("<input type='hidden' name='stripeToken' value='" + token.id + "' />");
                    if($( "#visa" ).length){
                        $( "#visa" ).prop( "checked", false );
                    }
                    if($( "#mastercard" ).length){
                        $( "#mastercard" ).prop( "checked", false );
                    }
                    $( "#mastercardd" ).prop( "checked", true );
                    notify('<?php echo translate('your_card_details_verified!'); ?>','success','bottom','right');
                    setTimeout(function(){
                        $('#cart_form').submit();
                    }, 500);
                }
            });
    
            $('#customButtong').on('click', function(e) {
                // Open Checkout with further options
                var total = $('#grand').html(); 
                total = total.replace("<?php echo currency(); ?>", '');
                //total = parseFloat(total.replace(",", ''));
                total = total/parseFloat(<?php echo exchange(); ?>);
                total = total*100;
                handler.open({
                    name: '<?php echo $system_title; ?>',
                    description: '<?php echo translate('pay_with_stripe'); ?>',
                    amount: total
                });
                e.preventDefault();
            });
  
            // Close Checkout on page navigation
            $(window).on('popstate', function() {
                handler.close();
            });
        });
    </script>
    <?php
        } if($c2_set == 'ok'){
    ?>
    <li class="cc-selector customradiogroup">
        <input id="mastercardc2" type="radio" name="payment_type" value="c2"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardc2" onclick="radio_check('mastercardc2')">
            <img src="<?php echo base_url(); ?>template/front/img/preview/payments/c2.jpg" alt="<?php echo translate('cash_on_delivery');?>" />
            <span class="paymentname"><?php echo translate('cash_on_delivery');?></span>
        </label>
    </li>
    <?php
        }if($vp_set == 'ok'){
    ?>
    <li class="cc-selector customradiogroup">
        <input id="mastercardc3" type="radio" name="payment_type" value="vp"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardc3" onclick="radio_check('mastercardc3')">
            <img src="<?php echo base_url(); ?>template/front/img/preview/payments/vp.jpg" alt="<?php echo translate('voguepay');?>" />
            <span class="paymentname"><?php echo translate('voguepay');?></span>
        </label>
    </li>
    <?php
        }if($pum_set == 'ok'){
    ?>
    <li class="cc-selector customradiogroup">
        <input id="mastercard_pum" type="radio" name="payment_type" value="pum"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercard_pum" onclick="radio_check('mastercard_pum')">
            <img src="<?php echo base_url(); ?>template/front/img/preview/payments/pum.png" alt="<?php echo translate('payumoney');?>" />
            <span class="paymentname"><?php echo translate('payumoney');?></span>
       </label>
    </li>
    <?php
        }
        /* if($ssl_set == 'ok'){
    ?>
    <div class="cc-selector col-sm-3">
        <input id="mastercardc4" type="radio" name="payment_type" value="sslcommerz"/>
        <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; " for="mastercardc4" onclick="radio_check('mastercardc4')">
                <img src="<?php echo base_url(); ?>template/front/img/preview/payments/sslcommerz.jpg" width="100%" height="100%" style=" text-align-last:center;" alt="<?php echo translate('sslcommerz');?>" />
             
        </label>
    </div>
    <?php
        } */ if($c_set == 'ok'){
            if($this->crud_model->get_type_name_by_id('general_settings','68','value') == 'ok'){
    ?>
    <li class="cc-selector customradiogroup">
        <input id="mastercard" type="radio" name="payment_type" value="cash_on_delivery"/>
        <label class="drinkcard-cc" for="mastercard" onclick="radio_check('mastercard')">
            <img src="<?php echo base_url(); ?>template/front/img/preview/payments/cash.jpg" alt="<?php echo translate('cash_on_delivery');?>" />
            <span class="paymentname"><?php echo translate('cash_on_delivery');?></span>
        </label>
    </li>
    <?php 
            }
        }
    ?>
    <?php 
    if ($this->crud_model->get_type_name_by_id('general_settings','84','value') == 'ok') {
        if ($this->session->userdata('user_login') == 'yes') {
    ?>
    <li class="cc-selector customradiogroup">
        <input id="mastercarddd" type="radio" name="payment_type" value="wallet"/>
        <label class="drinkcard-cc" for="mastercarddd" onclick="radio_check('mastercarddd')">
            <img src="<?php echo base_url(); ?>template/front/img/preview/payments/wallet.jpg" alt="<?php echo translate('wallet');  ?> : <?php echo currency($this->wallet_model->user_balance()); ?>" />
            <span class="paymentname"><?php echo translate('wallet');?>(<?php echo currency($this->wallet_model->user_balance()); ?>)</span>
        </label>
    </li>
    <?php
        }
    }    
    ?>
   
</ul>
<div class="clearfix"></div>
<div class="nxtcbtns mat-30">
	<a class="cancelorder__btn blackbg" href="<?php echo base_url(); ?>home/cancel_order">
		<?php echo translate('cancel_order');?>
	</a>
</div>
<style>
/*.cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}
.cc-selector input:active +.drinkcard-cc {
    opacity: 1;
}

.cc-selector input:checked +.drinkcard-cc{
    -webkit-filter: none;
    -moz-filter: none;
    filter: none;
    box-shadow: 0 0 10px #777;
}
.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    -webkit-transition: all 100ms ease-in;
    -moz-transition: all 100ms ease-in;
    transition: all 100ms ease-in;
    -webkit-filter:opacity(.5);
    -moz-filter:opacity(.5);
    filter:opacity(.5);
    transition: all .6s ease-in-out;
    border-radius:5px !important;
}
.drinkcard-cc:hover{
    -webkit-filter:opacity(1);
    -moz-filter: opacity(1);
    filter:opacity(1);
    transition: all .6s ease-in-out;
}*/
</style>
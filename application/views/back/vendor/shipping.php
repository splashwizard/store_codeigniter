
<div id="content-container">
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('Shipping');?></h1>
    </div>
    <div class="tab-base">
        <div class="panel">
            <div class="panel-body">
                <div class="tab-content">

                    <!-- LIST -->
                    <div class="tab-pane fade active in" id="list_shipping" style="border:1px solid #ebebeb; border-radius:4px;">
                        <?php include 'shipping_list.php'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = '<?php echo base_url(); ?>'
    var user_type = 'vendor';
    var module = 'shipping';
    var list_cont_func = 'list_shipping';
    var dlt_cont_func = 'delete';
</script>
<script src="https://checkout.stripe.com/checkout.js"></script>







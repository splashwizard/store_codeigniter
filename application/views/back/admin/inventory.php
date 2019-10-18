<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 7/27/2019
 * Time: 1:27 PM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 7/25/2019
 * Time: 1:16 AM
 */
?>
<div id="content-container">
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('Inventory Management');?></h1>
    </div>
    <div class="tab-base">
        <div class="panel">
            <div class="panel-body">
                <div class="tab-content">

                    <!-- LIST -->
                    <div class="tab-pane fade active in" id="list_inventory_admin" style="border:1px solid #ebebeb; border-radius:4px;">
                        <?php include 'inventory_list.php'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = '<?php echo base_url(); ?>'
    var user_type = 'admin';
    var module = 'inventory';
    var list_cont_func = 'list_inventory_admin';
    var dlt_cont_func = 'delete';
</script>
<script src="https://checkout.stripe.com/checkout.js"></script>











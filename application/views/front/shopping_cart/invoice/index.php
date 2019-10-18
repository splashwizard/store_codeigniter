
    	<?php
			$sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->result_array();
			foreach($sale_details as $row){
                    $product_details = json_decode($row['product_details'], true);
                    foreach ($product_details as $row1)
                    {
                        $option = json_decode($row1['option'],true);
                        foreach ($option as $l => $op) {
                            $title =  $op['title'];
                            $value =  $op['value'];
                            $products = $this->db->get_where('product', array('product_id' => $row1['id']))->result_array();
                            foreach ($products as $items){
                                $product_info = json_decode($items['options'], true);
                                foreach ($product_info as $item_option){
                                    $option_value = $item_option['option'];
                                    $option_number = $item_option['option_number'];
                                    if($title ==$item_option['title']){
                                        foreach ($option_value as $k =>$p_value){
                                            if($value == $p_value){
                                                foreach ($option_number as $m =>$p_number){
                                                    if($k == $m ){

                                                        if($p_number>=$row1['qty']){

                                                            $remain_variation_qty = $p_number-$row1['qty'];
                                                            $option_number[$m] = "$remain_variation_qty";
                                                        }
//                                                        else
//                                                            echo 'The remained variation Item Qay is not enough!';


                                                    }
                                                }
                                                $item_option['option_number'] = $option_number;
                                                $item_option_data[] =  $item_option;
                                                $item_option_data_tmp = json_encode( $item_option_data );
                                            }
                                        }
                                    }
                                }
                            }
                        }
//                        echo $item_option_data_tmp;
                        $data['options'] = $item_option_data_tmp;
                        $this->db->where('product_id', $row1['id']);
                        $this->db->update('product', $data);
                    }
                 }

            foreach($sale_details as $row){
            $product_details = json_decode($row['product_details'], true);
            foreach ($product_details as $row1)
            {
                $option = json_decode($row1['option'],true);
                foreach ($option as $l => $op) {
                    $title =  $op['title'];
                    $value =  $op['value'];
                    $products = $this->db->get_where('product', array('product_id' => $row1['id']))->result_array();
                    foreach ($products as $items){
                        $product_info = json_decode($items['options_init'], true);
                        foreach ($product_info as $item_option){
                            $option_value = $item_option['option'];
                            $option_number = $item_option['option_number'];
                            if($title ==$item_option['title']){
                                foreach ($option_value as $k =>$p_value){
                                    if($value == $p_value){

                                        foreach ($option_number as $m =>$p_number){
                                            if($k == $m ){
                                                $remain_variation_qty = $p_number + $row1['qty'];
                                                $option_number[$m] = "$remain_variation_qty";
                                            }
                                        }
                                        $item_option['option_number'] = $option_number;
                                        $item_option_data_stock[] =  $item_option;
                                        $item_option_data_tmp_stock = json_encode( $item_option_data_stock );
                                    }
                                }
                            }
                        }
                    }
                }
//                echo $item_option_data_tmp_stock;
                $data_stock['options_init'] = $item_option_data_tmp_stock;
                $this->db->where('product_id', $row1['id']);
                $this->db->update('product', $data_stock);

            }
        }

?>
<section class="page-section invoice">

    <div class="container">

    	<?php

			$sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->result_array();

			foreach($sale_details as $row){

		?>

        <div class="row">

            <div class="col-md-10 col-md-offset-1">

                <div class="invoice_body">

                    <div class="invoice-title">

                        <div class="invoice_logo hidden-xs">

                        	<?php

								$home_top_logo = $this->db->get_where('ui_settings',array('type' => 'home_top_logo'))->row()->value;

							?>

							<img src="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $home_top_logo; ?>.png" alt="SuperShop" style="max-width: 350px; max-height: 80px;"/>

                        </div>

                        <div class="invoice_info">

                            <?php if($invoice == "guest") {?>

                            <p><b><?php echo translate('guest_id'); ?> # :</b><?php echo $row['guest_id']; ?></p>

                            <?php }?>

                            <p><b><?php echo translate('invoice'); ?> # :</b><?php echo $row['sale_code']; ?></p>

                        </div>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <address>

                                <strong>

                                    <h4>

                                        <?php echo translate('billed_to'); ?> :

                                    </h4>

                                </strong>

                                <?php

									$info = json_decode($row['shipping_address'],true);

								?>

                                <p>

                                    <b><?php echo translate('Full Name'); ?> :</b>

                                    <?php echo $info['shipping_name']; ?>

                                </p>



                                <p>

                                    <b><?php echo translate('address'); ?> :</b>

                                    <br>

                                    <?php echo $info['shipping_address']; ?> <br>



                                    <?php echo translate('zip');?> : <?php echo $info['shipping_zip']; ?> <br>

                                    <?php echo translate('phone');?> : <?php echo $info['shipping_phone']; ?> <br>

                                    <?php echo translate('e-mail');?> : <a href=""><?php echo $info['shipping_email']; ?></a>

                                </p>

                            </address>

                        </div>



                        <div class="col-md-6 col-sm-6 col-xs-6 hidden-xs text-right">

                            <address>

                                <strong>

                                    <h4>

                                        <?php echo translate('shipped_to'); ?> :

                                    </h4>

                                </strong>

                                <p>

                                    <b><?php echo translate('Full Name'); ?> :</b>

                                    <?php echo $info['shipping_name']; ?>

                                </p>



                                <p>

                                    <b><?php echo translate('address'); ?> :</b>

                                    <br>

                                    <?php echo $info['shipping_address']; ?> <br>



                                    <?php echo translate('zip');?> : <?php echo $info['shipping_zip']; ?> <br>

                                    <?php echo translate('phone');?> : <?php echo $info['shipping_phone']; ?> <br>

                                    <?php echo translate('e-mail');?> : <a href=""><?php echo $info['shipping_email']; ?></a>

                                </p>

                            </address>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-6 ">

                            <address>

                                <strong>

                                    <h4>

                                        <?php echo translate('payment_details'); ?> :

                                    </h4>

                                </strong>

                                <p>

                                    <b><?php echo translate('payment_status'); ?> :</b>

                                    <i><?php echo translate($this->crud_model->sale_payment_status($row['sale_id'])); ?></i>

                                </p>

                                <p>

                                    <b><?php echo translate('payment_method'); ?> :</b>

                                    <?php if($info['payment_type'] == 'c2'){

                                        echo 'TwoCheckout';

                                    }else{

                                        echo ucfirst(str_replace('_', ' ', $info['payment_type']));

                                    }?>

                                </p>

                            </address>

                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6  text-right">

                            <address>

                                <strong>

                                    <h4>

                                        <?php echo translate('order_date'); ?> :

                                    </h4>

                                    <p>
                                        <?php echo $row['sale_datetime']; ?>

                                    </p>

                                </strong>

                            </address>

                        </div>

                    </div>



                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h3 class="panel-title"><strong><?php echo translate('payment_invoice');?></strong></h3>

                        </div>

                        <div class="panel-body">

                            <div class="table-responsive">

                                <table class="table table-condensed">

                                    <thead>

                                        <tr>

                                            <td><strong><?php echo translate('no');?></strong></td>

                                            <td class="text-center"><strong><?php echo translate('item');?></strong></td>

                                            <td class="text-center"><strong><?php echo translate('options');?></strong></td>

                                            <td class="text-right"><strong><?php echo translate('quantity');?></strong></td>

                                            <td class="text-right"><strong><?php echo translate('unit_cost');?></strong></td>

                                            <td class="text-right"><strong><?php echo translate('total');?></strong></td>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

											$product_details = json_decode($row['product_details'], true);

											$i =0;

											$total = 0;

											foreach ($product_details as $row1) {

												$i++;

										?>

                                        <tr>

                                            <td><?php echo $i; ?></td>

                                            <td class="text-center"><?php echo $row1['name']; ?></td>

                                            <td class="text-center">

                                            <?php

                                            if ($this->db->get_where('product', array('product_id' => $row1['id']))->row()->is_bundle == 'yes') {

                                            ?>

                                            <div style="padding: 5px">

                                                <b><?php echo translate('products_:');?></b> <br>

                                                <?php

                                                    $products = $this->db->get_where('product', array('product_id' => $row1['id']))->row()->products;

                                                    $products = json_decode($products, true);

                                                    foreach ($products as $product) { ?>

                                                        <a style="font-size: 12px;">

                                                            <?php echo $this->db->get_where('product', array('product_id' => $product['product_id']))->row()->title . '<br>';?>

                                                        </a>

                                                <?php

                                                    }

                                                ?>

                                            </div>

                                            <?php

                                            }

                                            ?>

                                            <?php

												$option = json_decode($row1['option'],true);

												foreach ($option as $l => $op) {

													if($l !== 'color' && $op['value'] !== '' && $op['value'] !== NULL){

											?>

												<?php
                                                        echo $op['title'];
                                                ?> :

												<?php

													if(is_array($va = $op['value'])){

														echo $va = join(', ',$va);

													} else {

														echo $va;

													}

												?>

												<br>

											<?php

													}

												}

											?>

                                            </td>

                                            <td class="text-right"><?php echo $row1['qty']; ?></td>

                                            <td class="text-right">

												<?php echo currency($row1['price']); ?>

                                            </td>

                                            <td class="text-right">

												<?php echo currency($row1['subtotal']);

													$total += $row1['subtotal'];

												?>

                                            </td>

                                        </tr>

                                        <?php

											}

										?>

                                        <tr>

                                        	<td class="thick-line"></td>

                                            <td class="thick-line"></td>

                                            <td class="thick-line"></td>

                                            <td class="thick-line"></td>

                                            <td class="thick-line text-right">

                                            	<strong>

                                            		<?php echo translate('sub_total_amount');?> :

                                                </strong>

                                            </td>

                                            <td class="thick-line text-right">

                                            	<?php echo currency($total);?>

                                            </td>

                                        </tr>

                                        <tr>

                                        	<td class="no-line"></td>

                                            <td class="no-line"></td>

                                            <td class="no-line"></td>

                                            <td class="no-line"></td>

                                            <td class="no-line text-right">

                                            	<strong>

                                            		<?php echo translate('tax');?> :

                                                </strong>

                                            </td>

                                            <td class="no-line text-right ffff">

                                            	<?php echo $row['vat'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                        	<td class="no-line"></td>

                                            <td class="no-line"></td>

                                            <td class="no-line"></td>

                                            <td class="no-line"></td>

                                            <td class="no-line text-right">

                                            	<strong>

                                            		<?php echo translate('shipping');?> :

                                                </strong>

                                            </td>

                                            <td class="no-line text-right">

                                            	<?php echo $row['shipping'];?>

                                            </td>

                                        </tr>

                                        <tr>

                                        	<td class="no-line"></td>

                                            <td class="no-line"></td>

                                            <td class="no-line"></td>

                                            <td class="no-line"></td>

                                            <td class="no-line text-right">

                                            	<strong>

                                            		<?php echo translate('grand_total');?> :

                                                </strong>

                                            </td>

                                            <td class="no-line text-right">
                                                <?php echo $row['grand_total']; ?>
                                            	<?php //echo currency($row['grand_total']);?>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-10 col-md-offset-1 btn_print hidden-xs" style="margin-top:10px;">

            	<span class="btn btn-info pull-right" onClick="print_invoice()">

					<?php echo translate('print'); ?>

               	</span>

                <?php if($invoice != "guest") {?>

                <a class="btn btn-danger pull-right" href="<?=base_url()?>home/profile/part/order_history" style="margin-right: 5px;"><?php echo translate('back_to_profile'); ?></a>

                <?php }?>

            </div>

        </div>

        <?php

			}

		?>

    </div>

</section>

<script>

function print_invoice(){

	window.print();

}

</script>

<style type="text/css">

    @media print {

        .top-bar{

            display: none !important;

        }

        header{

            display: none !important;

        }

        footer{

            display: none !important;

        }

        .to-top{

            display: none !important;

        }

        .btn_print{

            display: none !important;

        }

        .invoice{

            padding: 0px;

        }

        .table{

            margin:0px;

        }

        address{

            margin-bottom: 0px;

			border:1px solid #fff !important;

        }

    }

</style>




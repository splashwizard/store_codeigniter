<table class="table table-bordered carter_table" style="background: #fff;">
        <thead>
            <tr>
                <th class="hidden-sm hidden-xs"><?php echo translate('image');?></th>
                <th><?php echo translate('product_details');?></th>
                <th><?php echo translate('unit_price');?></th>
                <th><?php echo translate('tax');?></th>
                <th><?php echo translate('shipping');?></th>
<!--                <th style="text-align:center;">--><?php //echo translate('quantity');?><!--</th>-->
                <th><?php echo translate('subtotal');?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tax_cost1=0;
            $shippincost1=0;
                $carted = $this->cart->contents();

                foreach ($carted as $items){

            ?>
            <tr data-rowid="<?php echo $items['rowid']; ?>" >
                <td class="image hidden-sm hidden-xs" align="center">
                    <?php
                    $color = $this->crud_model->is_added_to_cart($items['id'],'option','color');
                    if($color){
                        $colorvalue1=$this->db->query("select * from product where product_id=200 ")->row()->color;
                        $colorimage=$this->db->query("select * from product where product_id=200 ")->row()->pcimage;
                        $resultjeson = json_decode ($colorvalue1, true);
                        $keys1 = array_values($resultjeson);
                        $key2 = array_search($color, $keys1);
                        $cimage=$colorimage;
                        $mpimage=explode(',', $cimage);

                    ?>
                    <a class="media-link" href="<?php echo $this->crud_model->product_link($items['id']); ?>">

                        <img src="<?php echo base_url();?>product_color/<?php echo $mpimage[$key2]; ?>" width="60" alt=""/>
                    </a>
                    <?php }
                    else{ ?>
                      <a class="media-link" href="<?php echo $this->crud_model->product_link($items['id']); ?>">

                        <img src="<?php echo $items['image']; ?>" width="60" alt=""/>
                    </a>
                    <?php } ?>
                </td>
                <td class="description">
                    <h4 style="">
                        <a href="<?php echo $this->crud_model->product_link($items['id']); ?>">
                            <?php echo $items['name']; ?>
                        </a>
                    </h4>
                    <hr class="mr0">
                    <?php
                        $color = $this->crud_model->is_added_to_cart($items['id'],'option','color');
                        if($color){
                    ?>
                    Color: <span style="background:<?php echo $color; ?>; height:15px; width:15px;border-radius:50%; display: inline-block;"></span>
                    <hr class="mr0">
                    <?php
                        }
                    ?>

                    <?php
                        $all_o = json_decode($items['option'],true);
                        foreach ($all_o as $l => $op) {

                            if($l !== 'color' && $op['value'] !== '' && $op['value'] !== NULL){
                    ?>
                            <span style="font-size:13px;"><?php echo $op['title']; ?> <?php echo $op['name']; ?></span>
                    :
                    <?php
                                if(is_array($va = $op['value'])){
					?>
                    <span style="font-size:13px !important;"><?php echo $va = join(', ',$va); ?></span>
                    <?php
                        } else {
					?>
                    <span style="font-size:13px !important;"><?php echo $va; ?></span>
                    <?php
                        }

                    ?>
                    <hr class="mr0">

                    <?php

                            }
                        }
                    ?>
                    <?php
                    if ($this->db->get_where('product', array('product_id' => $items['id']))->row()->is_bundle == 'no') {
                    ?>
                    <a href="<?php echo $this->crud_model->product_link($items['id']); ?>" class="change_choice_btn">
                        <?php echo translate('change_choices'); ?>
                    </a>
                    <?php
                    }
                    ?>
                    <?php
                    if ($this->db->get_where('product', array('product_id' => $items['id']))->row()->is_bundle == 'yes') {
                    ?>
                    <div style="padding: 5px">
                        <?php echo translate('products_:');?> <br>
                        <?php
                            $products = $this->db->get_where('product', array('product_id' => $items['id']))->row()->products;
                            $products = json_decode($products, true);
                            foreach ($products as $product) { ?>

                                <a style="text-decoration:underline; font-size: 12px; padding-right: 5px;" href="<?php echo $this->crud_model->product_link($product['product_id']); ?>">
                                    <?php echo $this->db->get_where('product', array('product_id' => $product['product_id']))->row()->title;?>
                                </a>
                        <?php
                            }
                        ?>
                    </div>
                    <?php
                    }
                    ?>
                </td>
                <td class="quantity pric">
                    <?php
                            echo currency($items['price']);
                    ?>
                </td>
                <td class="quantity pric">

                	<?php

                    $this->db->where('object_id', $object_id);

                    $zip_code = $this->db->get('shipping')->result()[0]->zip_code;

                    if($zip_code!=''){
                        $pre_Rate = $this->db->get_where('taxes', array('ZipCode' => $zip_code ))->row()->StateRate;

                    $Rate = str_replace('%', '', $pre_Rate);

                    $sale_price         = $this->db->get_where('product',array('product_id'=>$items['id']))->row()->sale_price;

                    $tax_cost1+=($Rate/100)*$sale_price*$items['qty'];

                    echo $totaltax=currency( number_format((float)($Rate/100)*$sale_price*$items['qty'], 2, '.', ''));
                    }
                    else{
							echo $totaltax=currency( "0.00");
						}


 			?>

                </td>
 				<td class="quantity pric">
 					<?php
// 					$spro=$items['id'];
//					$queryspro = $this->db->query("select * from product where product_id=$spro");
//                	$rowspro = $queryspro->row();

//                	if($rowspro->shipping_cost){
//
//                        $shippincost=$rowspro->shipping_cost*$items['qty'];
//                        $shippincost1+=$shippincost*$items['qty'];
//                        echo currency($shippincost);
//                    }

//					else{

                        $this->db->where('object_id', $object_id);

                        $rates = $this->db->get('shipping')->result()[0]->rates;

                        $rates1 =   json_decode($rates, true);

                        foreach ($rates1 as $rate_item){

                            $amount_local = json_encode($rate_item['amount_local'], true);
                            $rate_object_id = json_encode($rate_item['object_id'], true);

                            if($rate_item['object_id'] == $rate_id){

//                              $shippincost = $rate_item['amount_local']*$items['qty']+5;
                                $shippincost = $rate_item['amount_local']*$items['qty'];

                                $shippincost1+=$shippincost*$items['qty'];
                                if($shippincost !="0"){
                                    echo currency($shippincost);
                                }else{
                                    echo $shippincost=currency("0.00");
                                }

                            }

                        }

//					}
 					?>
                    <input type="hidden" value="<?php echo $object_id;?>" name = "object_id_check">
                    <input type="number" id = "shipping_cost" value="<?php echo $shippincost;?>" style="display: none;">
                </td>
<!--                <td class="quantity product-single" style="text-align:center;">-->
<!--					--><?php
//                        if(!$this->crud_model->is_digital($items['id'])){
//                    ?>
<!--                    <span class="buttons">-->
<!--                        <div class="quantity product-quantity">-->
<!--                            <button type='button' class="btn in_xs quantity-button minus"  value='minus' >-->
<!--                                <i class="fa fa-minus"></i>-->
<!--                            </button>-->
<!--                            <input  type="number" class="form-control qty in_xs quantity-field quantity_field" data-rowid="--><?php //echo $items['rowid']; ?><!--" data-limit='no' value="--><?php //echo $items['qty']; ?><!--" id='qty1' onblur="check_ok(this);" />-->
<!--                            <button type='button' class="btn in_xs quantity-button plus"  value='plus' >-->
<!--                                <i class="fa fa-plus"></i>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </span>-->
<!--                    --><?php
//						}
//					?>
<!--                </td>-->
                <td class="total">
                    <span class="sub_total">
                        <?php
                            echo currency($items['subtotal']);
                            ?>

                    </span>
                </td>
                <td class="total">
                    <span class="close" style="color:#f00;">
                        <i class="fa fa-trash"></i>
                    </span>
                </td>
            </tr>
            <?php
                }
               // echo $items['qty'];
             	$totaltax=$tax_cost1;
                //echo $shippincost1;
            ?>
            <input type="hidden" value="<?php echo number_format((float)$totaltax, 2, '.', ''); ?>" name="taxvalue">
            <input type="hidden" value="<?php echo number_format((float)$shippincost1, 2, '.', ''); ?>" name="shippingvalue">

            <input type="hidden" value="<?php echo $object_id;?>" name = "shipment_id">



        </tbody>
    </table>
<div class="nxtcbtns">
    <span class="contunie__checkout__btn themebgcolor noborder mar-5" onclick="load_payments();">
        <?php echo translate('Continue To Checkout');?>
    </span>
    <a class="cancelorder__btn blackbg" href="<?php echo base_url(); ?>home/cancel_order">
        <?php echo translate('cancel_order');?>
    </a>
</div>
<?php
    echo form_open('', array(
    'method' =>
    'post', 'id' => 'coupon_set' ));
?>
<input type="hidden" id="coup_frm" name="code">
</form>

<script type="text/javascript">
    $( document ).ready(function() {
		$('body').on('click','.close', function(){
			var here = $(this);
			var rowid = here.closest('tr').data('rowid');
			var thetr = here.closest('tr');
			var list1 = $('#total');
			$.ajax({
				url: base_url+'home/cart/remove_one/'+rowid,
				beforeSend: function() {
					list1.html('...');
				},
				success: function(data) {
					list1.html(data).fadeIn();
					notify(cart_product_removed,'success','bottom','right');
					sound('cart_product_removed');
					reload_header_cart();
					others_count();
					thetr.hide('fast');

					if(data == 0){
						location.replace('<?php echo base_url();?>');
					}
					location.reload();
				},
				error: function(e) {
					console.log(e)
				}
			});
		});

		var subtotal = $('#subtotal').val();
		var subtotal = subtotal;
		// var subtotal;
		var shipping_cost = $('#shipping_cost').val();

		console.log('-------------subtotal',subtotal );
		console.log('-------------shopping_cost',shipping_cost );
        update_calc_cart(subtotal,shipping_cost);


    });

    $( document ).ready(function() {
       var taxvalue = $('input[name="taxvalue"]').val();
       var shippingvalue = $('input[name="shippingvalue"]').val();
       $.ajax({
           type: "POST",
           url: "https://ryants.com/demo/store/home/cart/calcs/full",
           data: "taxvalue=" + taxvalue + "&shippingvalue="+ shippingvalue,
           success: function(data){
                var splitted = data.split("-");
               //alert(splitted);
               $("#shipping").html(splitted[1]);
               $("#tax").html(splitted[2]);
               $("#grand").html(splitted[3]);
               //For insert Totla value
               $("#total1").val(splitted[0]);
               $("#shipping1").val(splitted[1]);
               $("#tax1").val(splitted[2]);
               $("#grand_total1").val(splitted[3]);
               console.log('-------------kkk',splitted[3] );
               }
       });

$(".quantity-button").click(function(){
	// location.reload();
});
});
</script>


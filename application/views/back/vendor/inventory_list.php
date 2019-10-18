<div class="panel-body" id="demo_s">
    <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" >
        <thead>
        <tr>
            <th> <div style="text-transform: initial"><?php echo translate('no');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Product ID');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Title');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Date Added');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Image');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Category');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Sub Category');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Brand');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Unit');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Tags');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Description');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Additional Details 1');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Additional Details 2');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Additional Details 3');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Selling Price');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Vendor Cost');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Discount');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Qty On Hand');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Qty Sold');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Last Sale Date');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Item Height');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('UoM');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Item Length');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('UoM');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Item Width');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('UoM');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Item Weight');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('UoM');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Shipping Price');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Shipping Height');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('UoM');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Shipping Width');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('UoM');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Shipping Weight');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('UoM');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Variation Title');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Options &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    Current Qty');?></div></th>
            <th><div style="text-transform: initial"><?php echo translate('Options &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    Sold Qty');?></div></th>
<!--            <th><div style="text-transform: initial">--><?php //echo translate('Option 3 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    Current Qty');?><!--</div></th>-->
<!--            <th><div style="text-transform: initial">--><?php //echo translate('Option 4 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    Current Qty');?><!--</div></th>-->
<!--            <th><div style="text-transform: initial">--><?php //echo translate('Option 5 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    Current Qty');?><!--</div></th>-->
<!--            <th><div style="text-transform: initial">--><?php //echo translate('Option 6 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    Current Qty');?><!--</div></th>-->
<!--            <th><div style="text-transform: initial">--><?php //echo translate('Option 7 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    Current Qty');?><!--</div></th>-->
<!--            <th><div style="text-transform: initial">--><?php //echo translate('Option 1  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    sold qty');?><!--</div></th>-->
        </tr>
        </thead>
        <tbody>

        <?php
        foreach($all_product as $i=> $row){
        ?>
        <tr>
            <td><?php echo $i+1;?></td>
            <td><?php echo $row['product_id'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo date('m/d/Y', $row['add_timestamp']); ?></td>
            <td>
                <div style="display: flex;">
                    <?php
                        for($i = 1; $i<=$row['num_of_imgs']; $i++){?>
                          <img class="img-sm img-border" src="<?php echo base_url(); ?>uploads/product_image/product_<?php echo $row['product_id']; ?>_<?php echo $i;?>_thumb.jpg" />&nbsp;&nbsp;
                        <?php }
                    ?>
                </div>
            </td>
            <td>
                <?php
                    $category_name = $this->db->get_where('category',array('category_id' => $row['category']))->row()->category_name;
                    echo $category_name;
                ?>
            </td>
            <td>
                <?php
                        $sub_category_name = $this->db->get_where('sub_category',array('sub_category_id' => $row['sub_category']))->row()->sub_category_name;
                        echo $sub_category_name;
                ?>
            </td>
            <td>
                <?php
                    $brand_name = $this->db->get_where('brand',array('brand_id' => $row['brand']))->row()->name;
                    echo $brand_name;
                ?>
            </td>
            <td><?php echo $row['unit'];?></td>
            <td><?php echo $row['tag'];?></td>
            <td><?php echo $row['description'];?></td>
            <?php $a = $this->crud_model->get_additional_fields($row['product_id']); ?>
            <td> <?php echo $a[0]['value']; ?></td>
            <td> <?php echo $a[1]['value']; ?> </td>
            <td> <?php echo $a[2]['value']; ?> </td>
            <td>$<?php echo $row['sale_price'];?></td>
            <td>$<?php echo $row['purchase_price'];?></td>
            <td><?php echo $row['discount'];if($row['discount_type'] == 'percent') echo '%'; else echo '$'?></td>
            <td><?php echo $row['current_stock'];?></td>
            <td>
                <?php

                    $sold_qty = $this->db->get_where('stock',array('product' => $row['product_id'], 'type' => 'destroy'))->result_array();
                    $sum = 0;
                    foreach ($sold_qty as $p=>$sold_qty___){
                      $sum += $sold_qty___['quantity'];

                    }
                    echo $sum;
                ?>
            </td>
            <td>
                <?php
                    $this->db->order_by('stock_id');
                    $last_sale_date = $this->db->get_where('stock',array('product' => $row['product_id'], 'type' => 'destroy'))->result_array();
                    foreach ($last_sale_date as $p=>$last_sales){
                        $sum = $last_sales['datetime'];

                    }
                    if ($sum)echo date('m/d/Y', $last_sales['datetime']);
                ?>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>$<?php echo $row['shipping_cost'];?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <?php
                $all_op = json_decode($row['options'],true);
                foreach($all_op as $i=>$row1){
                    $type = $row1['type'];
                    $name = $row1['name'];
                    $title = $row1['title'];
                    $option = $row1['option'];
                    echo $title;
                    echo '<br>';
                }
                ?>
            </td> <td>
                <?php
                $all_op = json_decode($row['options'],true);
                foreach($all_op as $i=>$row1){
                    ?>

                    <?php
                    $option = $row1['option'];
                    $option_values = $row1['option_values'];
                    $option_number = $row1['option_number'];
                    foreach ($option as $t => $op1) {
                        $final[] = array(
                            'option' => $op1,
                            'option_value' => $option_values[$t],
                            'option_number' => $option_number[$t]
                        );
                        ?><div style="    width: 230px;">
                            <?php echo $op1; ?> &nbsp;&nbsp;($<?php echo $option_values[$t];?>) &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $option_number[$t]?><?php echo '<br>'?>
                        </div><?php
                    }
                    ?>

                <?php
                }
                ?>

            </td>
            <td>
                <?php
                $sold_qty_variation_data = $row['options_init'];

                foreach (json_decode($sold_qty_variation_data, true) as $pp => $row2){

                                ?>

                                <?php
                                $option2 = $row2['option'];
                                $option_values2 = $row2['option_values'];
                                $option_number2 = $row2['option_number'];
                                foreach ($option2 as $t => $op2) {
                                    $final[] = array(
                                        'option' => $op2,
                                        'option_value' => $option_values2[$t],
                                        'option_number' => $option_number2[$t]
                                    );
                                    ?>
                                    <div style="    width: 230px;">
                                    <?php echo $op2; ?> &nbsp;&nbsp;($<?php echo $option_values2[$t];?>) &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $option_number2[$t]?><?php echo '<br>'?>
                                    </div>
                                    <?php
                                }
                                ?>

                        <?php

                }
                ?>
            </td>

        </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>


<div id='export-div' style="padding:40px;">
    <h1 id ='export-title' style="display:none;"><?php echo translate('users'); ?></h1>
    <table id="export-table" class="table" data-name='users' data-orientation='p' data-width='1500' style="display:none;">
        <colgroup>
            <col width="50">
            <col width="150">
            <col width="150">
            <col width="150">
        </colgroup>
        <thead>
        <tr>
            <th><?php echo translate('no');?></th>
            <th><?php echo translate('name');?></th>
            <th><?php echo translate('e-mail');?></th>
            <th><?php echo translate('total_purchase');?></th>
        </tr>
        </thead>
        <tbody >
        <?php
        $i = 0;
        foreach($all_users as $row){
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['username']; ?> <?php echo $row['surname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo currency('','def').$this->crud_model->total_purchase($row['user_id']); ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

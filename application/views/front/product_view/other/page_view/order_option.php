
<?php
echo form_open(base_url() .'home/product_view/'.$row['product_id'], array(
    'method' => 'post',
    'class' => 'sky-form',
));
?>

<div class="order">
    <div class="buttons">
        <?php
        $all_op = json_decode($row['options'],true);
        $all_c = json_decode($row['color'],true);

        if(!empty($all_op)){
            foreach($all_op as $i=>$row1){
                $type = $row1['type'];
                $name = $row1['name'];
                $title = $row1['title'];
                $option = $row1['option'];
                ?>
                <div class="options">
                    <h3 class="title"><?php echo $title.' :';?></h3>
                    <div class="content">
                            <label class="select">
                                <select name="<?php echo $name; ?>" class="optional selectpicker input-price" data-live-search="true" >
                                    <option value=""><?php echo translate('choose_one'); ?></option>
                                    <?php
                                    $option = $row1['option'];
                                    $option_values = $row1['option_values'];
                                    foreach ($option as $t => $op1) {
                                        $final[] = array(
                                            'option' => $op1,
                                            'option_value' => $option_values[$t]
                                        );
                                        ?>
                                        <option value="<?php echo $op1.'|'.$option_values[$t];?>" <?php if($this->crud_model->is_added_to_cart($row['product_id'], 'option', $name) == $op1){ echo 'selected'; } ?> >
                                            <?php echo $op1; ?> &nbsp;&nbsp;($<?php echo $option_values[$t];?>)
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <i></i>
                            </label>

                    </div>
                </div>
                <?php
            }
        }
        ?>
        <div class="item_count">
            <div class="quantity product-quantity">
                    <span class="btn" name='subtract' onclick='decrease_val();'>
                        <i class="fa fa-minus"></i>
                    </span>
                <input  type="number" class="form-control qty quantity-field cart_quantity" min="1" max="<?php echo $row['current_stock']; ?>" name='qty' value="<?php if($a = $this->crud_model->is_added_to_cart($row['product_id'],'qty')){echo $a;} else {echo '1';} ?>" id='qty'/>


                <span class="btn" name='add' onclick='increase_val();'>
                        <i class="fa fa-plus">
                    </i></span>
            </div>


            <?php
            $carted = $this->cart->contents();
            if($carted){



                $user_id=$this->session->userdata('user_id');

                $this->db->where('user_id', $user_id);

                $this->db->where('product_id', $row['product_id']);

                $id = $this->db->get('shipping')->result_array();

                foreach ($id as $item){
                        $item['id'];
                }

                $this->db->where('id', $item['id']);
                $object_id = $this->db->get('shipping')->row()->object_id;

                ?>
                <input type="hidden" value="<?php echo $object_id;?>" name="object_id">
            <?php


            }
            ?>

            <?php
            if($row['current_stock'] > 0){
                ?>
                <div class="stock">
                    <?php echo translate('Availability : ').$row['current_stock'].' '.$row['unit'];?>
                </div>
                <?php
            }else{
                ?>
                <div class="out_of_stock">
                    <?php echo translate('out_of_stock');?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<!-- -->



<!---->

<div class="buttons">
    <button class="shop_probtn" style="width: auto;" onclick="to_cart(<?php echo $row['product_id']; ?>,event)">
        <i class="fa fa-shopping-cart"></i>
        <?php if($this->crud_model->is_added_to_cart($row['product_id'])=="yes"){
            echo translate('added_to_cart');
        } else {
            echo translate('add_to_cart');
        }
        ?>
    </button>

<!--        <input id  = "txt_name" type="text" value="" name="object_id">-->





    <button class="buynowbtn" onclick="buy_now(<?php echo $row['product_id']; ?>, event);"><i class="fa fa-shopping-bag"></i> Buy Now</button>

    <?php
    $wish = $this->crud_model->is_wished($row['product_id']);
    ?>
    <span class="btn-icon par-20 <?php if($wish == 'yes'){ echo 'wished';} else{ echo 'wishlist';} ?>" onclick="to_wishlist(<?php echo $row['product_id']; ?>,event)">
            <i class="fa fa-heart"></i>
        <!--<span class="hidden-sm hidden-xs">
				<?php if($wish == 'yes'){
            echo translate('_added_to_wishlist');
        } else {
            echo translate('_add_to_wishlist');
        }
        ?>
            </span>-->
        </span>
    <?php
    $compare = $this->crud_model->is_compared($row['product_id']);
    ?>
    <span class="btn btn-add-to compare btn_compare"  onclick="do_compare(<?php echo $row['product_id']; ?>,event)"  style="display: none">
            <i class="fa fa-exchange"></i>
            <span class="hidden-sm hidden-xs">
				<?php if($compare == 'yes'){
                    echo translate('_compared');
                } else {
                    echo translate('_compare');
                }
                ?>
            </span>
    </span>
</div>
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@twbootstrap" style="    border-radius: 5px;    width: 75%;">-->
<!--    <img src="https://cdn.goshippo.com/assets/img/logo/shippo_ico-4915455459e2cfa209cdaa0af101b578.svg" alt="Shippo" class="s-Nav-LogoImage" data-ember-action="1119" style="width: 25px; height: 25px;">-->
<!--    Shipping order-->
<!--</button>-->
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
<div id="pnopoi"></div>


<script>
    $(document).ready(function() {
        $('#share').share({
            networks: ['facebook','googleplus','twitter','linkedin','tumblr','in1','stumbleupon','digg'],
            theme: 'square'
        });
    });
</script>
<script>
    $(document).ready(function() {
        check_checkbox();
    });
    function check_checkbox(){
        $('.checkbox input[type="checkbox"]').each(function(){
            if($(this).prop('checked') == true){
                $(this).closest('label').find('.cr-icon').addClass('add');
            }else{
                $(this).closest('label').find('.cr-icon').addClass('remove');
            }
        });
    }
    function check(now){
        if($(now).find('input[type="checkbox"]').prop('checked') == true){
            $(now).find('.cr-icon').removeClass('remove');
            $(now).find('.cr-icon').addClass('add');
        }else{
            $(now).find('.cr-icon').removeClass('add');
            $(now).find('.cr-icon').addClass('remove');
        }
    }
    function decrease_val(){
        var value=$('.quantity-field').val();
        if(value > 1){
            var value=--value;
        }
        $('.quantity-field').val(value);
    }
    function increase_val(){
        var value=$('.quantity-field').val();
        var max_val =parseInt($('.quantity-field').attr('max'));
        if(value < max_val){
            var value=++value;
        }
        $('.quantity-field').val(value);
    }

</script>

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
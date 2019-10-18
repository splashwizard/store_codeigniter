<div class="bundlepro mab-40">
            			<div class="bundproimg">
            				<a href="<?php echo $this->crud_model->product_link($product_id); ?>">
            					<img src="<?php echo $this->crud_model->file_view('product',$product_id,'','','thumb','src','multi','one'); ?>" class="img-responsive" alt=""/>
            				</a>
            			</div>
            			<div class="bundleprocontent">
            				<h4 class="bundprotitle"><a href="<?php echo $this->crud_model->product_link($product_id); ?>"><?php echo $title; ?></a></h4>
            				<!--<p class="bprocat"><a href="<?php echo $this->crud_model->product_link($product_id); ?>"><?php echo $category; ?></a></p>-->
            				 <p class="bproprice"> <?php if($this->crud_model->get_type_name_by_id('product',$product_id,'discount') > 0){ ?> 

                <?php echo currency($this->crud_model->get_product_price($product_id)); ?>  

                <del><?php echo currency($sale_price); ?></del>

            <?php } else { ?>

                <?php echo currency($sale_price); ?> 

            <?php }?></p>
            				<button class="speacial_probtn" onclick="to_cart(<?php echo $product_id; ?>,event)">Add to Bag</button>
            			</div>
            		</div>

<div class="thumbnail box-style-2 no-padding" style="display: none !important">

    <div class="media">

    	<!--<div class="cover"></div>-->

        <a href="<?php echo $this->crud_model->product_link($product_id); ?>">
        <div class="media-link image_delay" data-src="<?php echo $this->crud_model->file_view('product',$product_id,'','','thumb','src','multi','one'); ?>" style="background-image:url('<?php echo img_loading(); ?>');background-size:cover;">

            <?php

                if($this->crud_model->get_type_name_by_id('product',$product_id,'current_stock') <=0 && !$this->crud_model->is_digital($product_id)){ 

            ?>

                <div class="sticker red">

                    <?php echo translate('out_of_stock'); ?>

                </div>

            <?php

                }

            ?>

            <?php 

                $discount= $this->db->get_where('product',array('product_id'=>$product_id))->row()->discount ;           

                if($discount > 0){ 

            ?>

                <div class="sticker green">

                    <?php echo translate('discount');?> 

                    <?php 

                         $type = $this->db->get_where('product',array('product_id'=>$product_id))->row()->discount_type ; 

                         if($type =='amount'){

                              echo currency($discount); 

                              } else if($type == 'percent'){

                                   echo $discount; 

                    ?> 

                        % 

                    <?php 

                        }

                    ?>

                </div>

            <?php } ?>

       <!--     <div class="quick-view-sm hidden-xs hidden-sm">

                <span onclick="quick_view('<?php echo $this->crud_model->product_link($product_id,'quick'); ?>')">

                    <span class="icon-view left" data-toggle="tooltip" data-original-title="<?php  echo translate('quick_view'); ?>">

                        <strong><i class="fa fa-eye"></i></strong>

                    </span>

                </span>

                <span class="icon-view middle" data-toggle="tooltip" 

                    data-original-title="<?php if($this->crud_model->is_compared($product_id)=="yes"){ echo translate('compared'); } else { echo translate('compare'); } ?>"

                        onclick="do_compare(<?php echo $product_id; ?>,event)">

                    <strong><i class="fa fa-exchange"></i></strong>

                </span>

                <span class="icon-view right" data-toggle="tooltip" 

                    data-original-title="<?php if($this->crud_model->is_wished($product_id)=="yes"){ echo translate('added_to_wishlist'); } else { echo translate('add_to_wishlist'); } ?>"

                        onclick="to_wishlist(<?php echo $product_id; ?>,event)">

                    <strong><i class="fa fa-heart"></i></strong>

                </span>  

            </div>-->

        </div>
</a>

    </div>

    <div class="caption text-center">

        <h4 class="caption-title">

        	<a href="<?php echo $this->crud_model->product_link($product_id); ?>">

				<?php echo $title; ?>

            </a>

        </h4>

        <div class="price">

            <?php if($this->crud_model->get_type_name_by_id('product',$product_id,'discount') > 0){ ?> 

                <ins><?php echo currency($this->crud_model->get_product_price($product_id)); ?> </ins> 

                <del><?php echo currency($sale_price); ?></del>

            <?php } else { ?>

                <ins><?php echo currency($sale_price); ?></ins> 

            <?php }?>

        </div>
        <div class="pro_spbottom">
			<button class="shop_probtn" onclick="to_cart(<?php echo $product_id; ?>,event)">
				<span>Add to Bag</span>
				<!--<img src="<?php echo base_url(); ?>template/front/img/cart-icon.png" class="normalimgshow" width="30" />
				<img src="<?php echo base_url(); ?>template/front/img/cart-icon-white.png" class="hoverimgshow" width="30" />-->
			</button>
			<span class="btn-icon wishlist pull-right par-20" onclick="to_wishlist(<?php echo $product_id; ?>,event)">
				<i class="fa fa-heart"></i>
            </span>
		</div>
		<!--<div class="cart">

            <span class="btn btn-block btn-theme btn-icon-left" data-toggle="tooltip" 

            	data-original-title="<?php if($this->crud_model->is_added_to_cart($product_id)){ echo translate('added_to_cart'); } else { echo translate('add_to_cart'); } ?>" 

            		data-placement="left"

                 		onclick="to_cart(<?php echo $product_id; ?>,event)" style="padding: 5px">

                    		<i class="fa fa-shopping-cart"></i> 

            </span>

        </div>-->

    </div>

</div>

<!-- <style>

    /* xs */

    .quick-view-sm {

        display: none;

    }

    /* sm */

    @media (min-width: 768px) {

        .quick-view-sm {

            display: none;

        }

    }

    /* md */

    @media (min-width: 992px) {

        .quick-view-sm {

           display: block; 

        }

    }

    /* lg */

    @media (min-width: 1200px) {

        .quick-view-sm {

            display: block;

        }

    }

</style> -->


<aside class="col-md-3 sidebar" id="sidebar">

    <!-- widget shop categories -->

    <span class="btn btn-theme-transparent pull-left hidden-lg hidden-md" onClick="close_sidebar();" style="border-radius:50%; position: absolute; top:5px;">

        <i class="fa fa-times"></i>

    </span>
	<div class="widget serach-widget">
		<div class="form-group widget">
            <div class="widget-search">
                <input class="form-control" type="text" id="texted" value="<?php echo make_proper($text); ?>" placeholder="<?php echo translate('search'); ?>">
                <button class="on_click_search txt_src_btn">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
	</div>
    <div class="widget shop-categories">

        <div class="widget-content">

            <ul>   

                <li class="title-for-list">

                    <span class="arrow search_cat search_cat_click all_category_set" style="display:none;" data-cat="0" 

                        data-min="<?php echo floor($this->crud_model->get_range_lvl('product_id !=', '0', "min")); ?>" 

                           data-max="<?php echo ceil($this->crud_model->get_range_lvl('product_id !=', '0', "max")); ?>" 

                            data-brands="<?php echo $this->db->get_where('general_settings',array('type'=>'data_all_brands'))->row()->value; ?>"

                                data-vendors="<?php echo $this->db->get_where('general_settings',array('type'=>'data_all_vendors'))->row()->value; ?>"

                           >

                                    <i class="fa fa-angle-down"></i>

                    </span>

                    <a href="#" class="search_cat" data-cat="0"

                        data-min="<?php echo floor($this->crud_model->get_range_lvl('product_id !=', '0', "min")); ?>" 

                           data-max="<?php echo ceil($this->crud_model->get_range_lvl('product_id !=', '0', "max")); ?>" >

                        <?php echo translate('all_products');?>

                    </a>

                </li>                                                 

                <?php

                    $all_category = $this->db->get('category')->result_array();

                    foreach($all_category as $row)

                    {

						if($this->crud_model->if_publishable_category($row['category_id'])){

                ?>

                <li>

                    <span class="arrow search_cat search_cat_click" data-cat="<?php echo $row['category_id']; ?>" 

                        data-min="<?php echo floor($this->crud_model->get_range_lvl('category', $row['category_id'], "min")); ?>" 

                           data-max="<?php echo ceil($this->crud_model->get_range_lvl('category', $row['category_id'], "max")); ?>" 

                            data-brands="<?php echo $row['data_brands']; ?>"

                                data-vendors="<?php echo $row['data_vendors']; ?>"

                           >

                                    <i class="fa fa-angle-down"></i>

                    </span>

                    <a href="#" class="search_cat" data-cat="<?php echo $row['category_id']; ?>"

                        data-min="<?php echo floor($this->crud_model->get_range_lvl('category', $row['category_id'], "min")); ?>" 

                            data-max="<?php echo ceil($this->crud_model->get_range_lvl('category', $row['category_id'], "max")); ?>" >

                        <?php echo $row['category_name']; ?>

                    </a>

                    <ul class="children">

                        <?php

                            $sub_category = $this->db->get_where('sub_category',array('category'=>$row['category_id']))->result_array();

                            foreach($sub_category as $row1)

                            {

                        ?>
						<?php 
                          $pcount=$this->crud_model->is_publishable_count('sub_category',$row1['sub_category_id']);
                          if($pcount !='0'){
                        ?>
                        <li class="on_click_search checkbox"

                            data-min="<?php echo floor($this->crud_model->get_range_lvl('sub_category', $row1['sub_category_id'], "min")); ?>" 

                                data-max="<?php echo ceil($this->crud_model->get_range_lvl('sub_category', $row1['sub_category_id'], "max")); ?>" >

                            <label for="sub_<?php echo $row1['sub_category_id']; ?>" onClick="check(this)" >

                                <input type="checkbox" name="jsut_show" id="sub_<?php echo $row1['sub_category_id']; ?>" class="search_sub" value="<?php echo $row1['sub_category_id']; ?>">

                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>

                                <?php echo $row1['sub_category_name']; ?>

                                <span class="count">

                                   ( <?php echo $this->crud_model->is_publishable_count('sub_category',$row1['sub_category_id']); ?> )

                                </span>

                            </label>
                            

                        </li>
						<?php } ?>
                        <?php  

                            }

                        ?>

                    </ul>

                </li>

                <?php  

						}

                    }

                ?>

            </ul>

        </div>

    </div>

    <!-- /widget shop categories -->

    <!-- widget price filter -->

    <div class="widget widget-filter-price">
        <h4 class="widget-title">
            <?php echo translate('price');?>
        </h4>
        <div class="widget-content">
            <div id="slider-range"></div>
            <input type="text" id="amount" style="width:100%;text-align:center;" disabled />
        </div>
    </div>

    <!-- /widget price filter -->
    	<div class="widget widget-filter-brands search_cat">
    		<h4 class="widget-title wtitle2 pal-60 par-60">All Brands</h4>
    		<div class="form-group selectpicker-wrapper set_brand" style="display:none;"></div>
    		
    		<!--<ul class="children active">
    			<li class="checkbox csscheckbox">
    				<label for="Kenwood">
    					<input type="checkbox" checked="" name="allvendors" id="Kenwood" value="Kenwood">
    					<span class="cr"></span>
    					Kenwood
    				</label>
    			</li>
    			<li class="checkbox csscheckbox">
    				<label for="Asus">
    					<input type="checkbox" checked="" name="allvendors" id="Asus" value="Asus">
    					<span class="cr"></span>
    					Asus
    				</label>
    			</li>
    			<li class="checkbox csscheckbox">
    				<label for="HP">
    					<input type="checkbox" checked="" name="allvendors" id="HP" value="HP">
    					<span class="cr"></span>
    					HP
    				</label>
    			</li>
    			<li class="checkbox csscheckbox">
    				<label for="Apple">
    					<input type="checkbox" checked="" name="allvendors" id="Apple" value="Apple">
    					<span class="cr"></span>
    					Apple
    				</label>
    			</li>
    			<li class="checkbox csscheckbox">
    				<label for="Sony">
    					<input type="checkbox" checked="" name="allvendors" id="Sony" value="Sony">
    					<span class="cr"></span>
    					Sony
    				</label>
    			</li>
    		</ul>-->
    	</div>
    	<div class="widget widget-filter-brands search_cat">
    		<h4 class="widget-title wtitle2 pal-60 par-60">All Vendor</h4>
    		<div class="form-group selectpicker-wrapper set_vendor" style="display:none;"></div>
    		
    	</div>
		<!--<?php
        	if ($this->crud_model->get_type_name_by_id('general_settings','68','value') == 'ok') {
		?>
        <div class="form-group selectpicker-wrapper set_brand" style="display:none;"></div>
        <?php
			}
		?>
        <?php
        	if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok') {
		?>
        <div class="form-group selectpicker-wrapper set_vendor" style="display:none;"></div>
        <?php
			}
		?>-->
    <br>
</aside>



<input type="hidden" id="univ_max" value="<?php echo $this->crud_model->get_range_lvl('product_id !=', '', "max"); ?>">

<input type="hidden" id="cur_cat" value="0">

<?php include 'search_script.php'; ?>


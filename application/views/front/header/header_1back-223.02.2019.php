<!-- Header top bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <ul class="list-inline">
                <li class="dropdown flags">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                            if($set_lang = $this->session->userdata('language')){} else {
                                $set_lang = $this->db->get_where('general_settings',array('type'=>'language'))->row()->value;
                            }
                            $lid = $this->db->get_where('language_list',array('db_field'=>$set_lang))->row()->language_list_id;
                            $lnm = $this->db->get_where('language_list',array('db_field'=>$set_lang))->row()->name;
                        ?>
                        <img src="<?php echo $this->crud_model->file_view('language_list',$lid,'','','no','src','','','.jpg') ?>" width="20px;" alt=""/> <span class="hidden-xs"><?php echo $lnm; ?></span><i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="dropdown-menu">
                            <?php
                                $langs = $this->db->get_where('language_list',array('status'=>'ok'))->result_array();
                                foreach ($langs as $row)
                                {
                            ?>
                                <li <?php if($set_lang == $row['db_field']){ ?>class="active"<?php } ?> >
                                    <a class="set_langs" data-href="<?php echo base_url(); ?>home/set_language/<?php echo $row['db_field']; ?>">
                                        <img src="<?php echo $this->crud_model->file_view('language_list',$row['language_list_id'],'','','no','src','','','.jpg') ?>" width="20px;" alt=""/>
                                        <?php echo $row['name']; ?>
                                        <?php if($set_lang == $row['db_field']){ ?>
                                            <i class="fa fa-check"></i>
                                        <?php } ?>
                                    </a>
                                </li>
                            <?php
                                }
                            ?>
                    </ul>
                </li>
                <li class="dropdown flags" style="z-index: 1001;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php                                            
                            if($currency_id = $this->session->userdata('currency')){} else {
                                $currency_id = $this->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
                            }
                            $symbol = $this->db->get_where('currency_settings',array('currency_settings_id'=>$currency_id))->row()->symbol;
                            $c_name = $this->db->get_where('currency_settings',array('currency_settings_id'=>$currency_id))->row()->name;
                        ?>
                        <span class="hidden-xs"><?php echo $c_name; ?></span> (<?php echo $symbol; ?>)
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <?php
                            $currencies = $this->db->get_where('currency_settings',array('status'=>'ok'))->result_array();
                            foreach ($currencies as $row)
                            {
                        ?>
                            <li <?php if($currency_id == $row['currency_settings_id']){ ?>class="active"<?php } ?> >
                                <a class="set_langs" data-href="<?php echo base_url(); ?>home/set_currency/<?php echo $row['currency_settings_id']; ?>">
                                    <?php echo $row['name']; ?> (<?php echo $row['symbol']; ?>)
                                    <?php if($currency_id == $row['currency_settings_id']){ ?>
                                        <i class="fa fa-check"></i>
                                    <?php } ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="top-bar-right">
            ----- ----- -----
        </div>
    </div>
</div>
<!-- /Header top bar -->

<!-- HEADER -->
<header class="header header-logo-left">
    <div class="header-wrapper">
        <div class="container">
            <!-- Logo -->
            <div class="logo">
            	<?php
					$home_top_logo = $this->db->get_where('ui_settings',array('type' => 'home_top_logo'))->row()->value;
				?>
                <a href="<?php echo base_url();?>">
                	<img src="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $home_top_logo; ?>.png" alt="SuperShop"/>
             	</a>
            </div>
            <!-- /Logo -->
            <!-- Header search -->
            <div class="header-center">
            <?php
                echo form_open(base_url() . 'home/text_search/', array(
                    'method' => 'post'
                ));
            ?>
            <div class="header-search-wrapper">
                <input class="form-control" type="search" name="query" accept-charset="utf-8" placeholder="<?php echo translate('what_are_you_looking_for');?>?" />
                <div class="select-custom">
                    <select id="cat" class="cat_select hidden-xs" name="cat" data-live-search="true" name="category" data-toggle="tooltip" title="<?php echo translate('select');?>">
                        <option value="0"><?php echo translate('all_categories');?></option>
                        <?php 
                            $categories = $this->db->get('category')->result_array();
                            foreach ($categories as $row1) {
								if($this->crud_model->if_publishable_category($row1['category_id'])){
                        ?>
                        <option value="<?php echo $row1['category_id']; ?>"><?php echo $row1['category_name']; ?></option>
                        <?php 
								}
                            }
                        ?>
                    </select>
                </div><!-- End .select-custom -->
                <button class="btn shrc_btn"><i class="fa fa-search"></i></button>
            </div>
            </form>
            </div>
            <!-- /Header search -->
            <!-- Header shopping cart -->
            <div class="header-cart">
                <div class="cart-wrapper">
				<?php
                   if($this->session->userdata('user_login')!='yes'){ 
                ?>
                     <a href="<?php echo base_url(); ?>home/login_set/login" class="btn btn-login">
                    	<span><?php echo translate('login'); ?></span>
                    </a>
					<span class="ordivider">Or</span>
					<a href="<?php echo base_url(); ?>home/login_set/registration" class="btn btn-register"><span><?php echo translate('sign_up'); ?></span></a>
					
                <?php } ?>
					
					<div class="dropdown cart-dropdown">
						<a href="#" class="hcartbtn" data-toggle="dropdown"><span class="cart_num">0</span></a>
						<div class="dropdown-menu">
							<div class="dropdownmenu-wrapper">
							    <div class="dropdown-cart-products top_carted_list">
							    </div>

							    <div class="dropdown-cart-total">
							        <span>Total</span>
							        <span class="cart-total-price shopping-cart__total"></span>
							    </div>

							    <div class="dropdown-cart-action">
							        <!--<a href="#" class="btn">View Cart</a>-->
							        <a href="<?php echo base_url(); ?>home/cart_checkout" class="btn">Checkout</a>
							    </div>
							</div>
						</div>
					</div>
					
                   
                    <!-- Mobile menu toggle button -->

                    <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>

                    <!-- /Mobile menu toggle button -->

                </div>

            </div>

            <!-- Header shopping cart -->
		</div>
    </div>

    <div class="navigation-wrapper <?php if($asset_page=='home'){ echo "homenav"; } ?>">
        <div class="container">
            <!-- Navigation -->
            <?php
            	$others_list=$this->uri->segment(3);
			?>
			
			<nav class="navigation closed clearfix">
                <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
				<ul class="nav sf-menu">
					<li  <?php if($asset_page=='home'){ ?>class="active"<?php } ?>>
						<a href="<?php echo base_url(); ?>">
							<img src="<?php echo base_url(); ?>template/front/img/home-icon.png" alt="Home"/>
						</a>
					</li>
					<li class="container-megamenu" <?php if($others_list=='4'){ ?>class="active"<?php } ?>>
						<a href="<?php echo base_url(); ?>home/category/4">
							<?php echo translate('women');?>
						</a>
					</li>   
					<li <?php if($others_list=='5'){ ?>class="active"<?php } ?>>
						<a href="<?php echo base_url(); ?>home/category/5">
							<?php echo translate('men');?>
						</a>
					</li>
					<li <?php if($others_list=='16'){ ?>class="active"<?php } ?>>
						<a href="<?php echo base_url(); ?>home/category/16">
							<?php echo translate('electronics');?>
						</a>
					</li> 
					<li <?php if($others_list=='17'){ ?>class="active"<?php } ?>>
						<a href="<?php echo base_url(); ?>home/category/17">
							<?php echo translate('skin_care');?>
						</a>
					</li> 
					<li <?php if($others_list=='27'){ ?>class="active"<?php } ?>>
						<a href="<?php echo base_url(); ?>home/category/27">
							Jewellery & Accessories
						</a>
					</li>
					<li <?php if($others_list=='28'){ ?>class="active"<?php } ?>>
						<a href="<?php echo base_url(); ?>home/category/28">
							Clothing & Shoes
						</a>
					</li>
					<li <?php if($others_list=='29'){ ?>class="active"<?php } ?>>
						<a href="<?php echo base_url(); ?>home/category/29">
							Home & Living
						</a>
					</li>
				</ul>
            </nav>

            <!-- /Navigation -->

        </div>
    </div>
</header>
<!-- /HEADER -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.set_langs').on('click',function(){
            var lang_url = $(this).data('href');                                    
            $.ajax({url: lang_url, success: function(result){
                location.reload();
            }});
        });
        $('.top-bar-right').load('<?php echo base_url(); ?>home/top_bar_right');
    });
</script>

<style>

    .dropdown-menu .active a{

        color: #fff !important;

    }

    .dropdown-menu li a{

        cursor: pointer;

    }

    .header-search select {

        display: none !important;

    }

	.cat_select button{

		right:170px !important;

	}

	@media (max-width: 768px) {

		.cat_select button{

			right:80px !important;

		}

	}

</style>

<?php

if ($this->crud_model->get_type_name_by_id('general_settings','58','value') !== 'ok') {

?>

<style>

.header.header-logo-left .header-search .header-search-select .dropdown-toggle {

    right: 40px !important;

}

</style>

<?php

}

?>
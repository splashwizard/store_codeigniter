<!-- Header top bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-left hidden-sm hidden-xs">
        	<ul class="list-inline">
        		<li>Largest Online Carft Selling Marketplace, 24x7 Support</li><br>
        	</ul>
            <ul class="list-inline" style="display: none">
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
                     <a href="<?php echo base_url(); ?>home/login_set/login" class="btn btn-login hidden-sm hidden-xs">
                    	<span><?php echo translate('login'); ?></span>
                    </a>
					<span class="ordivider hidden-sm hidden-xs">Or</span>
					<a href="<?php echo base_url(); ?>home/login_set/registration" class="btn btn-register hidden-sm hidden-xs"><span><?php echo translate('sign_up'); ?></span></a>
					
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
<!--							        <a href="#" class="btn">View Cart</a>-->
							        <a href="<?php echo base_url(); ?>home/cart_checkout" class="btn">Checkout</a>
							    </div>
							</div>
						</div>
					</div>
					<!-- Mobile menu toggle button -->
                    <!--<a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>-->
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
			<nav>
	            <div class="nav-header">
	                <button class="toggle-bar">
						<i data-feather="menu"></i>
	                </button>	
	            </div>	
	            <div class="header-cart hidden-md hidden-lg">
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
					
                </div>
            	</div>							
	            <ul class="menu">
	            	<li class="megamenu">
	                    <a href="#"><img src="<?php echo base_url(); ?>template/front/img/allcat-icon.png" width="30" alt="All Category"/> <span class="pal-10">All Categories</span></a>
	                    <div class="megamenu-content megamenu-product">
	                        <!-- Start Mega Menu Ecommerce-->
	                        <div class="nav-row">
	                            <div class="col-sm-3 col-xs-12 side-tab">
	                                <ul class="tabs">
	                                <?php
	                                $selected =json_decode($this->db->get_where('ui_settings',array('ui_settings_id' => 35))->row()->value,true);
	                                  $this->db->where_in('category_id',$selected);
                                    $categories=$this->db->get('category')->result_array();
                                    $maincat=0;
                                    foreach($categories as $row){
                                    	$class = ''; $maincat++;
				       					if ( $maincat == 1 ) $class .= ' active';
	                                ?>
	                                    <li class="tab-link <?php echo $class; ?>" data-tab="tab-<?php echo $maincat; ?>">
	                                        <a href="#"><?php echo $row['category_name']; ?></a>
	                                    </li>
	                                <?php } ?>
	                                    <!--<li class="tab-link" data-tab="tab-2">
	                                        <a href="#"><i class="fa fa-camera"></i> Camera & Accesories</a>
	                                    </li>
	                                    <li class="tab-link" data-tab="tab-3">
	                                        <a href="#"><i class="fa fa-home"></i> Home & Kitchen</a>
	                                    </li>
	                                    <li class="tab-link" data-tab="tab-4">
	                                        <a href="#"><i class="fa fa-lightbulb-o"></i> Electronics</a>
	                                    </li>-->
	                                </ul>
	                            </div>
	                            <div class="col-sm-9 col-xs-12 main-tab">
	                              <?php
	                              $selected =json_decode($this->db->get_where('ui_settings',array('ui_settings_id' => 35))->row()->value,true);
	                                  $this->db->where_in('category_id',$selected);
                                    $categories=$this->db->get('category')->result_array();
                                    $subcat=0;
                                    foreach($categories as $row){
                                    $sclass = ''; $subcat++;
				       					if ( $subcat == 1 ) $sclass .= ' active';	
                                    	if($this->crud_model->if_publishable_category($row['category_id'])){
                                       
                                    ?>
	                                <div id="tab-<?php echo $subcat; ?>" class="tab-content <?php echo $sclass; ?>">
	                                
										<div class="nav-row">
										<?php
	                                 $sub_categories = json_decode($row['data_subdets'],true);
                                        if($sub_categories!=NULL){
                                     foreach($sub_categories as $row1){
                                     ?>
											<div class="col-md-3 col-sm-4 col-xs-12">
												<h5><a href="<?php echo base_url(); ?>home/category/<?php echo $row['category_id']; ?>/<?php echo $row1['sub_id']; ?>"><?php echo $row1['sub_name'];?></a></h5>
												<ul class="list-product">
												 <?php
                                                $brands=explode(';;;;;;',$row1['brands']);
                                                    foreach($brands as $row2){
                                                        if($row2 !== ''){
                                                            $brand = explode(':::',$row2);
                                                ?>
													<li><a href="<?php echo base_url(); ?>home/category/<?php echo $row['category_id']; ?>/<?php echo $row1['sub_id']; ?>-<?php echo $brand[0]; ?>"><?php echo $brand[1];?></a></li>
													 <?php
                                                        }
                                                    }
                                                ?>
												</ul>
											</div>
											<?php } } ?>
										</div>
										
	                                </div>
								<?php } }  ?>
	                               
	                            </div>
	                        </div>
	                        <!-- End Mega Menu Ecommerce-->
	                    </div>
	                </li>
	                <li <?php if($others_list=='todays_deal'){ ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>home/others_product/todays_deal">Todays Deal</a></li>
	                <li <?php if($others_list=='featured'){ ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>home/others_product/featured">Featured Products</a></li>
	                <li <?php if($others_list=='latest'){ ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>home/others_product/latest">New Arrivals</a></li>
	                <li <?php if($others_list=='all_vendor'){ ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>home/all_vendor/">All Vendors</a></li>
	                <li <?php if($others_list=='all_brands'){ ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>home/all_brands">All Brands</a></li>
	                <!--<li><a href="<?php echo base_url(); ?>home/aboutus">About Us</a></li>
	                <li><a href="<?php echo base_url(); ?>home/contact">Contact Us</a></li>-->
	            </ul>
        	</nav>
			
			<!--<nav class="navigation closed clearfix">
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
            </nav>-->

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
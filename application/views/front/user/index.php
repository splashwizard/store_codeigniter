<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
    @media (min-width: 1200px){
        .cus_cont {
            width: 1290px;
        }
    }
</style>
<section class="page-section matb-30">
    <div class="wrap container">
        <!-- <div id="profile-content"> -->
            <div class="row profile profile_dtls">
            	<div class="col-sm-12">
	            	<div class="profileheader">
	            		<h3 class="prohtitle">Account</h3>
	            		<span class="accountmail"><?php echo $row['email'];?></span>
	            	</div>
            	</div>
                <div class="col-lg-3 col-md-6 col-sm-6 pat-30 profilesidebar">
                    <input type="hidden" id="state" value="normal" />
                    <div class="widget account-details">
						<h2 class="text-uppercase prolefttitletop mat-0 mab-30"><?php echo translate('Profile_information');?></h2>
                    	
                    	<div class="prosiderbar_widget">
                    		<h5 class="prosidewidtitle">Order</h5>
                    		<ul class="profile_sidbar_widget_list">
                    			<li><a class="pnav_order_history" href="#"><?php echo translate('order_history');?></a></li>
                    		</ul>
                    	</div>
						
						<div class="prosiderbar_widget">
                    		<h5 class="prosidewidtitle"><?php echo translate('Account');?></h5>
                    		<ul class="profile_sidbar_widget_list">
                    			<li><a class="pnav_info" href="#"><?php echo translate('profile');?></a></li>
                    			<li><a class="pnav_update_profile" href="#"><?php echo translate('edit_profile');?></a></li>
                    			<li><a class="pnav_downloads" href="#"><?php echo translate('downloads');?></a></li>
                    			<li><a class="pnav_wishlist" href="#"><?php echo translate('wishlist');?></a></li>
                    		</ul>
                    	</div>
                    	
                    	<div class="prosiderbar_widget">
                    		<h5 class="prosidewidtitle"><?php echo translate('Creadits');?></h5>
                    		<ul class="profile_sidbar_widget_list">
                    			<?php if ($this->crud_model->get_type_name_by_id('general_settings','84','value') == 'ok') {
                                ?>
                    			<li><a class="pnav_wallet" href="#"><?php echo translate('my_wallet');?></a></li>
                    			<?php } ?> 
                    			<!--<li><a class="pnav_ticket" href="#"><?php echo translate('support_ticket');?></a></li>-->
                    		</ul>
                    	</div>
                    	
                    	<div class="prosiderbar_widget">
                    		<h5 class="prosidewidtitle"><?php echo translate('Help');?></h5>
                    		<ul class="profile_sidbar_widget_list">
                    			<!--<li><a class="pnav_ticket" href="#"><?php echo translate('support_ticket');?></a></li>-->
                    			<li><a class="pnav_conversation" href="#"><?php echo translate('conversations');?></a></li>
                    		</ul>
                    		<!--ppp-->
                    		 
                    		
                    		 
                    	</div>
                    	<div class="prosiderbar_widget logoutsection">
                    		<ul class="profile_sidbar_widget_list">
                    			<li><a href="<?php echo base_url(); ?>home/logout"><?php echo translate('Logout');?></a></li>
                    		</ul>
                    	</div>
                        <!--<ul class="pleft_nav">
                            <a class="pnav_info" href="#"><li class="active"><?php echo translate('profile');?></li></a>
                            <?php if ($this->crud_model->get_type_name_by_id('general_settings','84','value') == 'ok') {
                                ?>
                            <a class="pnav_wallet" href="#"><li><?php echo translate('wallet');?></li></a>
                            <?php } ?>  
                            <a class="pnav_wishlist" href="#"><li><?php echo translate('wishlist');?></li></a>
                            <a class="pnav_downloads" href="#"><li><?php echo translate('downloads');?></li></a>
                            <?php if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){ ?>
                                <a class="pnav_uploaded_products" href="#"><li><?php echo translate('uploaded_products');?></li></a>
                                <a class="pnav_package_payment_info" href="#"><li><?php echo translate('package_payment_info');?></li></a>
                            <?php } ?>
                            <a class="pnav_update_profile" href="#"><li><?php echo translate('edit_profile');?></li>
                            <a class="pnav_ticket" href="#"><li><?php echo translate('support_ticket');?></li></a>
                            <?php if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){ ?>
                                <a class="pnav_post_product" href="#"><li><?php echo translate('post_product');?></li></a>
                            <?php } ?>
                        </ul>-->
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-6  pat-30 profiledtlssection">
                    <div id="profile_content">
                    </div>
                    <!--Main_right-->
                    <div id="profilesection_shortcut">
                    	<div class="procatgorybig">
			            	<div class="">
			            		<ul class="procatlist">
			            			<li class="col-sm-4 col-md-3 col-xs-6">
			            				<a href="#" class="pnav_order_history">
			            					<div class="profile_icon_link text-center">
			            						<div class="proicon_img">
			            							<img src="<?php echo base_url(); ?>template/front/img/order-icon.png" class="proicon" alt="Orders History" />
			            						</div>
			            						<div class="proiconlinkdtls">
			            							<h5>Order</h5>
			            							<p>Orders History</p>
			            						</div>
			            					</div>
			            				</a>
			            			</li>
			            			<li class="col-sm-4 col-md-3 col-xs-6">
			            				<a href="#" class="pnav_info">
			            					<div class="profile_icon_link text-center">
			            						<div class="proicon_img">
			            							<img src="<?php echo base_url(); ?>template/front/img/profile-icon.png" class="proicon" alt="Profile" />
			            						</div>
			            						<div class="proiconlinkdtls">
			            							<h5>Profile</h5>
			            							<p>Edit Profile</p>
			            						</div>
			            					</div>
			            				</a>
			            			</li>
			            			<li class="col-sm-4 col-md-3 col-xs-6">
			            				<a href="#" class="pnav_wallet">
			            					<div class="profile_icon_link text-center">
			            						<div class="proicon_img">
			            							<img src="<?php echo base_url(); ?>template/front/img/wallet-icon.png" class="proicon" alt="Wallet" />
			            						</div>
			            						<div class="proiconlinkdtls">
			            							<h5>Wallet</h5>
			            							<p>Your Collection</p>
			            						</div>
			            					</div>
			            				</a>
			            			</li>
			            			<li class="col-sm-4 col-md-3 col-xs-6">
			            				<a href="#" class="pnav_ticket">
			            					<div class="profile_icon_link text-center">
			            						<div class="proicon_img">
			            							<img src="<?php echo base_url(); ?>template/front/img/ticket-icon.png" class="proicon" alt="Tickit" />
			            						</div>
			            						<div class="proiconlinkdtls">
			            							<h5>Tickit</h5>
			            							<p>View Coupon</p>
			            						</div>
			            					</div>
			            				</a>
			            			</li>
			            			<li class="col-sm-4 col-md-3 col-xs-6">
			            				<a href="#">
			            					<div class="profile_icon_link text-center">
			            						<div class="proicon_img">
			            							<img src="<?php echo base_url(); ?>template/front/img/help-icon.png" class="proicon" alt="Help" />
			            						</div>
			            						<div class="proiconlinkdtls">
			            							<h5>Help</h5>
			            							<p>Support</p>
			            						</div>
			            					</div>
			            				</a>
			            			</li>
			            			<li class="col-sm-4 col-md-3 col-xs-6">
			            				<a href="#" class="pnav_downloads">
			            					<div class="profile_icon_link text-center">
			            						<div class="proicon_img">
			            							<img src="<?php echo base_url(); ?>template/front/img/download-icon.png" class="proicon" alt="Download" />
			            						</div>
			            						<div class="proiconlinkdtls">
			            							<h5>Download</h5>
			            							<p>Best Products</p>
			            						</div>
			            					</div>
			            				</a>
			            			</li>
			            		</ul>
			            	</div>
			            </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</section>

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="prodPostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=translate('confirm_your_upload')?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div><?=translate('your_remaining_product_upload_amount:_').'<b><span class="post_amount">0</span></b><br>'.translate('uploading_a_product_will_cost_you_1_upload_amount</br><b class="text-danger">After_uploading_a_product_you_can_not_edit_it_again</b>')?></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal"><?=translate('close')?></button>
                <button type="button" class="btn btn-theme btn-theme-sm post_confirm" style="text-transform: none;font-weight: 400;"><?=translate('confirm')?></button>
            </div>
        </div>
    </div>
</div>
<!-- Modal For C-C Post confirm -->


<!-- Modal For C-C Status change -->

<div class="modal fade" id="statusChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=translate('change_availability_status')?></h4>
            </div>
            <div class="modal-body">
                <div class="text-center content_body" id="content_body">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal For C-C Status change -->

<script>
    $(document).ready(function(){
        $("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/conversation");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_ticket").find("li").addClass("active");
    })
	var top = Number(200);
	var loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';
    $('.pnav_info').on('click',function(){
    	//alert('1');
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/info");
        $("#profilesection_shortcut").show();
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_info").find("li").addClass("active");
    });
    $('.pnav_wallet').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/wallet");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_wallet").find("li").addClass("active");
    });
    $('.pnav_wishlist').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/wishlist");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_wishlist").find("li").addClass("active");
    });
    $('.pnav_uploaded_products').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/uploaded_products");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_uploaded_products").find("li").addClass("active");
    });
    $('.pnav_package_payment_info').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/package_payment_info");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_package_payment_info").find("li").addClass("active");
    });
    $('.pnav_order_history').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/order_history");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_order_history").find("li").addClass("active");
    });
    $('.pnav_downloads').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/downloads");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_downloads").find("li").addClass("active");
    });
    $('.pnav_update_profile').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/update_profile");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_update_profile").find("li").addClass("active");
    });
    $('.pnav_ticket').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/ticket");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_ticket").find("li").addClass("active");
    });
    $('.pnav_conversation').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/conversation");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_ticket").find("li").addClass("active");
    });
    $('.pnav_post_product').on('click',function(){
    	$("#profilesection_shortcut").hide();
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/profile/post_product");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_post_product").find("li").addClass("active");
    });
	$(document).ready(function(){
        // $("#<?php echo $part; ?>").click();
		$(".pnav_<?php echo $part; ?>").click();
    });
</script>
<style type="text/css">
    .pagination_box a{
        cursor: pointer;
    }
    .pleft_nav li.active {
        background-color: #ebebeb!important;
    }
</style>

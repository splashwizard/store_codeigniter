<section class="page-section mab-50">
    <div class="container">
        <div class="row">
        	<div class="recommendation col-md-12">
            	<div class="row">
            		<h3 class="section-title section-title-lg text-uppercase mab-30">
                        <span class="boldfont"><?php echo translate('Latest Featured ');?> </span><span class="themecolor"><?php echo translate('Product');?></span>
                    </h3>
                    
                    <div class="featured-products-carousel lfepro">
                    	<div class="owl-carousel" id="letest-refeature-carousel">
                    		<?php
								$recommends=$this->crud_model->product_list_set('related',12,$row['product_id']);
								foreach($recommends as $rec){
							?>
							<div class="item">
							<div class="thumbnail box-style-1 no-padding">
								<div class="media">
									<a href="<?php echo $this->crud_model->product_link($rec['product_id']); ?>">
										<div class="media-link image_delay" data-src="<?php echo $this->crud_model->file_view('product',$rec['product_id'],'','','thumb','src','multi','one'); ?>" style="background-image: url('<?php echo $this->crud_model->file_view('product',$rec['product_id'],'','','thumb','src','multi','one'); ?>'); background-size: cover; background-position:center;">
										</div>
									</a>
								</div>
								
								<div class="caption text-center">
									<h4 class="caption-title" style="height: 40px;">
										<a href="<?php echo $this->crud_model->product_link($rec['product_id']); ?>"><?=$rec['title']?></a>
									</h4>
									<div class="price">
										<?php if($rec['discount'] > 0){ ?> 
                                        <ins>
                                            <?php echo currency($this->crud_model->get_product_price($rec['product_id'])); ?>
                                        </ins> 
                                        <del><?php echo currency($rec['sale_price']); ?></del>
	                                    <?php 
	                                    }
	                                    else{
	                                    ?>
	                                    <ins>
	                                        <?php echo currency($rec['sale_price']); ?>
	                                    </ins>
	                                    <?php
	                                    }
	                                    ?>
									</div>
									
								</div>
                        	</div>
							</div>
                        	<?php
								}
							?>
                    	</div>
                    </div>
                	
                    
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ryants.com/store/template/front/plugins/owl-carousel2/owl.carousel.min.js"></script>
<link href="https://ryants.com/store/template/front/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://ryants.com/store/template/front/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">

<script>
	$(document).ready(function() {
 
  $("#letest-refeature-carousel").owlCarousel({
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      nav: false,
      items : 4,
      margin: 15,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });
 
});
</script>
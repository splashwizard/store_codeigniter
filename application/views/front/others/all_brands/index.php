<!-- BREADCRUMBS -->
<!--<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h2 class="section-title section-title-lg">
                <span>
                    <?php echo translate('all_brands');?>
                </span>
            </h2>
        </div>
    </div>
</section>-->
<section class="breadcum_section">
	<div class="container">
		<div class="breadcuminner">
			<ul class="breadcrumb">
			    <li><a href="<?php echo base_url(); ?>">Home</a></li>
			    <li class="active"><?php echo translate('all_brands');?></li>
			</ul>
		</div>
	</div>
</section>
<!-- /BREADCRUMBS -->



<!-- PAGE -->

<section class="page-section allbranddtls">
    <div class="container">
        <div class="row">
            <?php
				$this->db->where('digital',NULL);
                $categories=$this->db->get('category')->result_array();
                foreach($categories as $row){
            ?>
            
            <h2 class="section-title text-uppercase matb-30 boldfont text-left">
				<a href="<?php echo base_url(); ?>home/category/<?php echo $row['category_id']; ?>">
                	<?php echo $row['category_name'];?>
                </a>
			</h2>
			<div class="all_brands">
				<ul class="all_brands_list">
				<?php 
                    $sub_categories = $this->db->get_where('sub_category', array('category'=> $row['category_id']))->result_array();
                    $result= array();
					foreach($sub_categories as $row1){
						$brands = json_decode($row1['brand'],TRUE);
						foreach($brands as $row2){
							if(!in_array($row2,$result)){
								array_push($result,$row2);
							}
						}
					}
					foreach($result as $row3){
                ?>
                	<li class="col-xs-6 col-sm-4 col-md-3">
                		<div class="brand_img">
                			<?php
								if(file_exists('uploads/brand_image/'.$this->crud_model->get_type_name_by_id('brand',$row3,'logo'))){
							?>
							<img class="image_delay" src="<?php echo img_loading(); ?>" data-src="<?php echo base_url();?>uploads/brand_image/<?php echo $this->crud_model->get_type_name_by_id('brand',$row3,'logo'); ?>" alt=""/> 
							<?php
								} else {
							?>
							<img  class="image_delay" src="<?php echo img_loading(); ?>" data-src="<?php echo base_url(); ?>uploads/brand_image/default.jpg" />
							<?php
								}
							?>
                		</div>
                		<div class="brand_name">
                			<a href="<?php echo base_url(); ?>home/category/<?php echo $row['category_id']; ?>/0-<?php echo $row3; ?>">
								<?php echo $this->crud_model->get_type_name_by_id('brand',$row3,'name');?>
                            </a>
                		</div>
                	</li>
                <?php } ?>
                </ul>
			</div>
            
            <?php }?>
        </div>
    </div>
</section>
<!-- /PAGE -->
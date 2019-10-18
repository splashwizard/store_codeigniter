<!-- PAGE -->
<section class="page-section featured-products sl-featured mat-50">
    <div class="container">
        <h2 class="section-title section-title-lg text-uppercase mab-50 boldfont">
			<?php echo translate('latest');?> <?php echo translate('featured');?> <span class="themecolor"> <?php echo translate('products');?></span>
		</h2>
        <div class="featured-products-carousel">
            <div class="owl-carousel" id="featured-products-carousel">

                <?php
					$box_style =  $this->db->get_where('ui_settings',array('ui_settings_id' => 29))->row()->value;
					$limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 20))->row()->value;
                    $featured=$this->crud_model->product_list_set('featured',$limit);
                    foreach($featured as $row){
                		echo $this->html_model->product_box($row, 'grid', $box_style);
					}
                ?>
            </div>
        </div>
    </div>
</section>

<!-- /PAGE -->

<script>

$(document).ready(function(){

	setTimeout( function(){ 

		set_featured_product_box_height();

	},1000 );

});



function set_featured_product_box_height(){

	var max_title = 0;

	$('.sl-featured .caption-title').each(function(){

        var current_height= parseInt($(this).css('height'));

		if(current_height >= max_title){

			max_title = current_height;

		}

    });

    if (max_title > 0) {

        $('.sl-featured .caption-title').css('height',max_title);

    }

}

</script>
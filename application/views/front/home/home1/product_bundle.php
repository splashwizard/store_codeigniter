<!-- PAGE -->

<section class="page-section featured-products sl-bundled mat-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title section-title-lg boldfont">New <span class="themecolor"> Arrivals<?php //echo translate('bundled_products');?></span></h2>
                
            </div>
            <div class="col-md-8 col-lg-7">
            	<div class="probundle_bigimg">
            		<a href="<?php echo base_url(); ?>home/bundled_product">
            			<img src="<?php echo base_url(); ?>template/front/img/bundlepro1.jpg" class="img-responsive" alt=""/>
            		</a>
            	</div>
            </div>
            <div class="col-md-4 col-lg-5">
            	<div class="probundlelist">
            	<?php
            	$box_style =  $this->db->get_where('ui_settings',array('ui_settings_id' => 42))->row()->value;
                        $limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 41))->row()->value;
                        $product_bundle=$this->crud_model->product_list_set('bundle',"2");
                        //$product_bundle= $this->db->get_where('product', array('is_bundle' => 'yes'))->result_array();
            	foreach($product_bundle as $row){
                            echo $this->html_model->product_box($row, 'grid', $box_style);
                        }
            	?>
            		<!--<div class="bundlepro mab-40">
            			<div class="bundproimg">
            				<a href="#">
            					<img src="<?php echo base_url(); ?>template/front/img/bundlepro2.jpg" class="img-responsive" alt=""/>
            				</a>
            			</div>
            			<div class="bundleprocontent">
            				<h4 class="bundprotitle"><a href="#">Women's Scarlett Cocktail</a></h4>
            				<p class="bprocat"><a href="#">Women's Scarlett Cocktail</a></p>
            				<p class="bproprice">$2,250,000.00</p>
            				<button class="speacial_probtn">Add to Bag</button>
            			</div>
            		</div>
            		
            		<div class="bundlepro mab-40">
            			<div class="bundproimg">
            				<a href="#">
            					<img src="<?php echo base_url(); ?>template/front/img/bundlepro3.jpg" class="img-responsive" alt=""/>
            				</a>
            			</div>
            			<div class="bundleprocontent">
            				<h4 class="bundprotitle"><a href="#">Women's Scarlett Cocktail</a></h4>
            				<p class="bprocat"><a href="#">Women's Scarlett Cocktail</a></p>
            				<p class="bproprice">$2,250,000.00</p>
            				<button class="speacial_probtn">Add to Bag</button>
            			</div>
            		</div>-->
            	</div>
            </div>
        </div>        
    </div>
</section>
<!-- /PAGE -->
<script>
$(document).ready(function(){
    $(".owl-carousel-2").owlCarousel({
        autoplay: true,
        loop: true,
        margin: 30,
        dots: false,
        nav: true,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsive: {
            0: {items: 2},
            479: {items: 2},
            768: {items: 2},
            991: {items: 4},
            1024: {items: 4}
        }
    });
    set_bundled_product_box_height();
});

function set_bundled_product_box_height(){
    var max_title = 0;
    $('.sl-bundled .caption-title').each(function(){
        var current_height= parseInt($(this).css('height'));
        if(current_height >= max_title){
            max_title = current_height;
        }
    });
    if (max_title > 0) {
        $('.sl-bundled .caption-title').css('height',max_title);
    }
}
</script>
<!-- BREADCRUMBS -->
<section class="breadcum_section">
	<div class="container">
		<div class="breadcuminner">
			<ul class="breadcrumb">
			    <li><a href="<?php echo base_url(); ?>">Home</a></li>
			    <li><a href="<?php echo base_url(); ?>/home/products">Products</a></li>
			    <li class="active"><?php echo translate($product_type);?></li>
			    
			</ul>
		</div>
	</div>
</section>
<!--<section class="page-section breadcrumbs">
    <div class="container">
        <div class="page-header">
            <h2 class="section-title section-title-lg">
                <span>
                    <?php echo translate($product_type);?>  
                    <span class="thin"> <?php echo translate('products');?></span>
                </span>
            </h2>
         </div>
    </div>
</section>-->
<!-- /BREADCRUMBS -->
<!-- PAGE WITH SIDEBAR -->

<input type="hidden" value="<?php echo $product_type; ?>" id="type" />
<section class="page-section with-sidebar">
    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <?php 
                include 'sidebar.php';
            ?>
            <!-- /SIDEBAR -->
            <!-- CONTENT -->
            <div class="col-md-9 content searchresultcontent" id="content">
            	
            	<!-- shop-sorting -->
                <div class="shop-sorting~ palr-30">

                    <div class="row">

                        <div class="col-md-10 col-sm-12 col-xs-12 sort-item">
                        	<div class="row">
                        		<div class="col-sm-7">
                        			<h2 class="prosearchingtitle mat-0"><?php echo translate($product_type);?></h2>
									<!--<h6>Showing 1–12 of 60 results</h6>-->
                        		</div>
                        		<div class="col-sm-5">
                        			<div class="form-inline text-right mat-10">
		                                <div class="form-group selectpicker-wrapper shortselect">
		                                    <select class="selectpicker input-price sorter_search form-control" data-live-search="true" data-width="100%"
		                                        data-toggle="tooltip" title="Select" onChange="delayed_search()">                                  
		                                            <option value=""><?php echo translate('sort_by'); ?></option>
		                                            <option value="price_low"><?php echo translate('price_low_to_high'); ?></option>
		                                            <option value="price_high"><?php echo translate('price_high_to_low'); ?></option>
		                                            <option value="condition_old"><?php echo translate('oldest'); ?></option>
		                                            <option value="condition_new"><?php echo translate('newest'); ?></option>
		                                            <option value="most_viewed"><?php echo translate('most_viewed'); ?></option>
		                                    </select>
		                                </div>
		                            </div>
                        		</div>
                        	</div>
							
                            
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 text-right view_select_btn">
                        	<span class="btn btn-theme-transparent pull-left hidden-lg hidden-md" onClick="open_sidebar();">
                            	<i class="fa fa-bars"></i>
                            </span>
                            <a class="proglbtn grid" onClick="set_view('grid')" href="#"><!--<img src="<?php echo base_url(); ?>template/front/img/gridview-icon.png" alt=""/>--></a>
                            <a class="proglbtn list" onClick="set_view('list')" href="#"><!--<img src="<?php echo base_url(); ?>template/front/img/listview-icon.png" alt=""/>--></a>
                        </div>
                    </div>
                </div>
                <!-- /shop-sorting -->
            	
                <!-- /shop-sorting -->
                <div id="page_content" class="palr-30">
                	
                </div>
                
            </div>
            <!-- /CONTENT -->
        </div>
    </div>
</section>
<!-- /PAGE WITH SIDEBAR -->
<script>
	function product_by_type(type){	
		var top = Number(200);
		var loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';
		$("#page_content").html(loading_set);
		$("#page_content").load("<?php echo base_url()?>home/product_by_type/"+type);
	}
	$(document).ready(function(){
		var product_type=$('#type').val();
		product_by_type(product_type);
    });
</script>
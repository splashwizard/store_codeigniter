<div class="col-md-12">
	<div class="tabs-wrapper content-tabs listing_category_box home1_category_box mat-50">
		<ul id="tabs" class="nav nav-tabs">
            <li class="active">
                <a href="#tab-s1" data-toggle="tab">
                    <span><?php echo translate('popular');?></span>
                </a>
            </li>
            <li>
                <a href="#tab-s2" data-toggle="tab">
                    <span><?php echo translate('latest');?></span>
                </a>
            </li>
            <li>
                <a href="#tab-s3" data-toggle="tab">
                    <span><?php echo translate('deals');?></span>
                </a>
            </li>
        </ul>
        
        <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-s1">
                    <div class="cat-product-list">
                        
                        <div class="row">
                        	<?php
	                           	$most_viewed=$this->crud_model->product_list_set('most_viewed',4);
	                            foreach($most_viewed as $row){
	                        ?>
                        	<div class="col-md-3 col-sm-3 col-xs-3 padding-lr-10-md">
                        		<div class="thumbnail box-style-2 no-padding">
                        			<div class="media">
										<a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
											<div class="media-link image_delay" data-src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'100','','thumb','src','multi','one');?>" style="background-image: url(<?php echo $this->crud_model->file_view('product',$row['product_id'],'100','','thumb','src','multi','one');?>); background-size: cover;">
											<!--<img class="media-object img-responsive" src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'100','','thumb','src','multi','one');?>" alt="">-->
											</div>
										</a>
									</div>
									
									<div class="caption text-center">
										<h4 class="caption-title">
								        	<a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
												<?php echo $row['title']; ?>
								            </a>
								        </h4>
								        <div class="price">
										<?php if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ ?> 
	                                        <ins><?php echo currency($this->crud_model->get_product_price($row['product_id'])); ?> </ins> 
	                                        <del><?php echo currency($row['sale_price']); ?></del>
	                                    <?php } else { ?>
	                                        <ins><?php echo currency($row['sale_price']); ?></ins> 
	                                    <?php }?>
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
    
                <div class="tab-pane fade" id="tab-s2">
                    <div class="cat-product-list">
                    	<div class="row">
                        <?php
                            $latest=$this->crud_model->product_list_set('latest',4);
                            foreach($latest as $row){
                        ?>
                        <div class="col-md-3 col-sm-3 col-xs-3 padding-lr-10-md">
                    		<div class="thumbnail box-style-2 no-padding">
                    			<div class="media">
									<a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
										<div class="media-link image_delay" data-src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'100','','thumb','src','multi','one');?>" style="background-image: url(<?php echo $this->crud_model->file_view('product',$row['product_id'],'100','','thumb','src','multi','one');?>); background-size: cover;">
										<!--<img class="media-object img-responsive" src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'100','','thumb','src','multi','one');?>" alt="">-->
										</div>
									</a>
								</div>
								
								<div class="caption text-center">
									<h4 class="caption-title">
							        	<a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
											<?php echo $row['title']; ?>
							            </a>
							        </h4>
							        <div class="price">
									<?php if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ ?> 
                                        <ins><?php echo currency($this->crud_model->get_product_price($row['product_id'])); ?> </ins> 
                                        <del><?php echo currency($row['sale_price']); ?></del>
                                    <?php } else { ?>
                                        <ins><?php echo currency($row['sale_price']); ?></ins> 
                                    <?php }?>
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
                <div class="tab-pane fade" id="tab-s3">
                    <div class="cat-product-list">
                    	<div class="row">
                        <?php
                            $todays_deal=$this->crud_model->product_list_set('deal',4);
                            foreach($todays_deal as $row){
                        ?>
                        <div class="col-md-3 col-sm-3 col-xs-3 padding-lr-10-md">
                    		<div class="thumbnail box-style-2 no-padding">
                    			<div class="media">
									<a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
										<div class="media-link image_delay" data-src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'100','','thumb','src','multi','one');?>" style="background-image: url(<?php echo $this->crud_model->file_view('product',$row['product_id'],'100','','thumb','src','multi','one');?>); background-size: cover;">
										<!--<img class="media-object img-responsive" src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'100','','thumb','src','multi','one');?>" alt="">-->
										</div>
									</a>
								</div>
								
								<div class="caption text-center">
									<h4 class="caption-title">
							        	<a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
											<?php echo $row['title']; ?>
							            </a>
							        </h4>
							        <div class="price">
									<?php if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ ?> 
                                        <ins><?php echo currency($this->crud_model->get_product_price($row['product_id'])); ?> </ins> 
                                        <del><?php echo currency($row['sale_price']); ?></del>
                                    <?php } else { ?>
                                        <ins><?php echo currency($row['sale_price']); ?></ins> 
                                    <?php }?>
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
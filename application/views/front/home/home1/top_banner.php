<!-- PAGE -->

<?php
$bannerid1=array(1,2,3);
	$this->db->where("place", "after_slider");

	$this->db->where("status", "ok");
	$this->db->where_in("banner_id",$bannerid1,FALSE);

	$banners=$this->db->get('banner')->result_array();

	$count=count($banners);

	if($count==1){

		$md=12;

		$sm=12;

		$xs=12;

	}elseif($count==2){

		$md=6;

		$sm=6;

		$xs=12;

	}elseif($count==3){

		$md=4;

		$sm=4;

		$xs=12;

	}

	elseif($count==4){

		$md=3;

		$sm=6;

		$xs=12;

	}

	

	if($count!==0){

?>

<section class="page-banner-section mat-30">

    <div class="container">

    	<div class="row">

                <?php

                foreach($banners as $row){

                ?>

                <div class="col-md-<?php echo $md; ?> col-sm-<?php echo $sm; ?> col-xs-<?php echo $xs; ?>">

                    <div class="thumbnail no-border no-padding thumbnail-banner size-1x<?php echo $count; ?>">

                        <div class="media">

                            <a class="media-link" href="<?php echo $row['link']; ?>">

                                <div class="img-bg image_delay" data-src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" style="background-image: url('<?php echo img_loading(); ?>')">
                                	<img src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" class="img-responsive" />
                                	
                                </div>

                            </a>

                        </div>

                    </div>

                </div>

                <?php

                }

                ?>


        </div>

    </div>

</section>

<?php

	}

?>
<?php
$bannerid2=array(4,27);
	$this->db->where("place", "after_slider");

	$this->db->where("status", "ok");
	$this->db->where_in("banner_id",$bannerid2,FALSE);

	$banners2=$this->db->get('banner')->result_array();

	$count=count($banners2);

	if($count==1){

		$md=12;

		$sm=12;

		$xs=12;

	}elseif($count==2){

		$md=6;

		$sm=6;

		$xs=12;

	}elseif($count==3){

		$md=4;

		$sm=4;

		$xs=12;

	}

	elseif($count==4){

		$md=3;

		$sm=6;

		$xs=6;

	}

	

	if($count!==0){

?>

<section class="page-banner-section mat-30">

    <div class="container">

    	<div class="row">
                <?php

                foreach($banners2 as $row){

                ?>

                <div class="col-md-<?php echo $md; ?> col-sm-<?php echo $sm; ?> col-xs-<?php echo $xs; ?>">

                    <div class="thumbnail no-border no-padding thumbnail-banner size-1x<?php echo $count; ?>">

                        <div class="media">

                            <a class="media-link" href="<?php echo $row['link']; ?>">

                                <div class="img-bg image_delay" data-src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" style="background-image: url('<?php echo img_loading(); ?>')">
                                	<img src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" class="img-responsive" />
                                	
                                </div>

                            </a>

                        </div>

                    </div>

                </div>

                <?php

                }

                ?>
        </div>

    </div>

</section>

<?php

	}

?>
<?php
$bannerid3=array(28,29);
	$this->db->where("place", "after_slider");

	$this->db->where("status", "ok");
	$this->db->where_in("banner_id",$bannerid3,FALSE);

	$banners3=$this->db->get('banner')->result_array();

	$count=count($banners3);

	if($count==1){

		$md=12;

		$sm=12;

		$xs=12;

	}elseif($count==2){

		$md=6;

		$sm=6;

		$xs=6;

	}elseif($count==3){

		$md=4;

		$sm=4;

		$xs=12;

	}

	elseif($count==4){

		$md=3;

		$sm=6;

		$xs=6;

	}

	

	if($count!==0){

?>

<section class="page-banner-section mat-80">
    <div class="container">
    	<div class="row">
    		<div class="col-sm-12">
    			<h2 class="section-title section-title-lg text-uppercase mab-0"><span class="boldfont">Trend</span><span class="themecolor"> Files</span></h2>
    		</div>
			
                <?php
                foreach($banners3 as $row){

                ?>

                <div class="col-md-<?php echo $md; ?> col-sm-<?php echo $sm; ?> col-xs-<?php echo $xs; ?>">

                    <div class="thumbnail no-border no-padding thumbnail-banner size-1x<?php echo $count; ?>">

                        <div class="media">

                            <a class="media-link" href="<?php echo $row['link']; ?>">

                                <div class="img-bg image_delay" data-src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" style="background-image: url('<?php echo img_loading(); ?>')">
                                	<img src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" class="img-responsive" />
                                	
                                </div>

                            </a>

                        </div>

                    </div>

                </div>

                <?php

                }
                ?>
        </div>
    </div>
</section>

<?php

	}

?>
<?php
$bannerid4=array(30,31,32);
	$this->db->where("place", "after_slider");

	$this->db->where("status", "ok");
	$this->db->where_in("banner_id",$bannerid4,FALSE);

	$banners4=$this->db->get('banner')->result_array();

	$count=count($banners4);

	if($count==1){

		$md=12;

		$sm=12;

		$xs=12;

	}elseif($count==2){

		$md=6;

		$sm=6;

		$xs=6;

	}elseif($count==3){

		$md=4;

		$sm=4;

		$xs=12;

	}

	elseif($count==4){

		$md=3;

		$sm=6;

		$xs=6;

	}

	

	if($count!==0){

?>

<section class="page-banner-section mat-30">
    <div class="container">
    	<div class="row">
            
                <?php
                foreach($banners4 as $row){

                ?>

                <div class="col-md-<?php echo $md; ?> col-sm-<?php echo $sm; ?> col-xs-<?php echo $xs; ?>">

                    <div class="thumbnail no-border no-padding thumbnail-banner size-1x<?php echo $count; ?>">

                        <div class="media">

                            <a class="media-link" href="<?php echo $row['link']; ?>">

                                <div class="img-bg image_delay" data-src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" style="background-image: url('<?php echo img_loading(); ?>')">
                                	<img src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" class="img-responsive" />
                                	
                                </div>

                            </a>

                        </div>

                    </div>

                </div>

                <?php

                }
                ?>
            
        </div>
    </div>
</section>

<?php

	}

?>
<?php
$bannerid5=array(33);
	$this->db->where("place", "after_slider");

	$this->db->where("status", "ok");
	$this->db->where_in("banner_id",$bannerid5,FALSE);

	$banners5=$this->db->get('banner')->result_array();

	$count=count($banners5);

	if($count==1){

		$md=12;

		$sm=12;

		$xs=12;

	}elseif($count==2){

		$md=6;

		$sm=6;

		$xs=6;

	}elseif($count==3){

		$md=4;

		$sm=4;

		$xs=12;

	}

	elseif($count==4){

		$md=3;

		$sm=6;

		$xs=6;

	}

	

	if($count!==0){

?>

<section class="page-banner-section mat-40">
    <div class="container">
    	<div class="row">
                <?php
                foreach($banners5 as $row){

                ?>

                <div class="col-md-<?php echo $md; ?> col-sm-<?php echo $sm; ?> col-xs-<?php echo $xs; ?>">

                    <div class="thumbnail no-border no-padding thumbnail-banner size-1x<?php echo $count; ?>">

                        <div class="media">

                            <a class="media-link" href="<?php echo $row['link']; ?>">

                                <div class="img-bg image_delay" data-src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" style="background-image: url('<?php echo img_loading(); ?>')">
                                	<img src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src','','',$row['image_ext']) ?>" class="img-responsive" />
                                	
                                </div>

                            </a>

                        </div>

                    </div>

                </div>

                <?php

                }
                ?>
        </div>
    </div>
</section>

<?php

	}

?>
<!-- /PAGE -->
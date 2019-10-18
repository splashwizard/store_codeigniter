<style>
    /* The container */
    .container_radio {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .container_radio input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container_radio:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container_radio input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container_radio input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container_radio .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>

<div id="content-container"> 

    <div id="page-title">

        <h1 class="page-header text-overflow"><?php echo translate('manage_site');?></h1>

    </div>

    <div class="tab-base">

        <div class="panel">

            <div class="tab-base tab-stacked-left">

                <ul class="nav nav-tabs">

                    <li class="active">

                        <a data-toggle="tab" href="#demo-stk-lft-tab-2"><?php echo translate('vendor_images');?></a>

                    </li>

                    <li>

                        <a data-toggle="tab" href="#demo-stk-lft-tab-4"><?php echo translate('social_media');?></a>

                    </li>

                    <li>

                        <a data-toggle="tab" href="#demo-stk-lft-tab-5"><?php echo translate('SEO');?></a>

                    </li>
                    <li>

                        <a data-toggle="tab" href="#demo-stk-lft-tab-6"><?php echo translate('Brand');?></a>

                    </li>
                    <li>

                        <a data-toggle="tab" href="#demo-stk-lft-tab-7"><?php echo translate('Shipping Service');?></a>

                    </li>

                </ul>



                <div class="tab-content bg_grey">

                    <span id="genset"></span>

                    <div id="demo-stk-lft-tab-2" class="tab-pane fade active in">

                        <div class="col-md-12">

                            <div class="panel">

                                <div class="panel-heading">

                                    <h3 class="panel-title"><?php echo translate('select_images');?></h3>

                                </div>

                            <?php

                                echo form_open(base_url() . 'vendor/vendor_images/', array(

                                    'class' => 'form-horizontal',

                                    'method' => 'post',

                                    'id' => '',

                                    'enctype' => 'multipart/form-data'

                                ));

                            ?>

                                <div class="form-group margin-top-10">

                                    <label class="col-sm-3 control-label margin-top-10" for="demo-hor-inputemail"><h5><?php echo translate('logo');?></h5> <br><i>(<?php echo translate('suggested_width');?>:<?php echo translate('height');?> - 300px:300px*)</i></label>

                                    <div class="col-sm-9">

                                        <div class="col-sm-2">

                                            <?php if(file_exists('uploads/vendor_logo_image/logo_'.$this->session->userdata('vendor_id').'.png')){?>

                                            <img class="img-responsive img-md img-border" src="<?php echo base_url(); ?>uploads/vendor_logo_image/logo_<?php echo $this->session->userdata('vendor_id'); ?>.png" id="blah" style="width:auto !important;" >

                                            <?php }else{ ?>

                                            <img class="img-responsive img-md img-border" src="<?php echo base_url(); ?>uploads/vendor_logo_image/default.jpg" id="blah" style="width:auto !important;" >

                                        <?php }?>

                                        </div>

                                        <div class="col-sm-2">

                                        <span class="pull-left btn btn-default btn-file margin-top-10">

                                            <?php echo translate('select_logo');?>

                                            <input type="file" name="logo" class="form-control" id="imgInp">

                                        </span>

                                        </div>

                                        <div class="col-sm-5"></div>

                                    </div>

                                </div><hr>

                                <div class="form-group margin-top-10">

                                    <label class="col-sm-3 control-label margin-top-10" for="demo-hor-inputemail">

                                        <h5><?php echo translate('cover_photo'); ?></h5> 

                                        <br>

                                        <i>(<?php echo translate('suggested_width');?>:<?php echo translate('height');?> - 1140px:320px*)</i>

                                    </label>

                                    <div class="col-sm-9">

                                        <div class="col-sm-12">

                                             <?php if(file_exists('uploads/vendor_banner_image/banner_'.$this->session->userdata('vendor_id').'.jpg')){?>

                                            <img class="img-responsive img-lg img-border pip" src="<?php echo base_url(); ?>uploads/vendor_banner_image/banner_<?php echo $this->session->userdata('vendor_id'); ?>.jpg" id="blahn" style="width:auto !important; height:320px;">

                                             <?php }else{ ?>

                                             <img class="img-responsive img-lg img-border" src="<?php echo base_url(); ?>uploads/vendor_banner_image/default.jpg" id="blahn" style="width:auto !important; height:320px;">

                                             <?php }?>

                                        </div>

                                        <div class="col-sm-6">

                                        <span class="pull-left btn btn-default btn-file margin-top-10">

                                            <?php echo translate('select_photo');?>
                                            

                                            <input type="file" name="banner" class="form-control" id="imgInpn">

                                        </span>
                                        </div>
                                         <?php if(file_exists('uploads/vendor_banner_image/banner_'.$this->session->userdata('vendor_id').'.jpg')){?>
										<p style="float: right;margin: 10px;cursor: pointer;" id="imgremove">Remove Image</p>
										<?php } ?>
                                        <div class="col-sm-5"></div>

                                    </div>

                                </div>

                                <br />

                                <div class="panel-footer text-right">

                                    <span class="btn btn-success btn-labeled fa fa-check submitter enterer"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>

                                        <?php echo translate('save');?>

                                    </span>

                                </div>

                            </form> 

                            </div>              

                        </div>

                    </div>

                

                    <!--UPLOAD : SOCIAL LINKS---------->

                    <div id="demo-stk-lft-tab-4" class="tab-pane fade <?php if($tab_name=="social_links") {?>active in<?php } ?>">

                        <div class="panel">

                            <div class="panel-heading">

                                <h3 class="panel-title"><?php echo translate('social_links');?></h3>

                            </div>

							<?php

                                echo form_open(base_url() . 'vendor/social_links/set/', array(

                                    'class' => 'form-horizontal',

                                    'method' => 'post',

                                    'id' => '',

                                    'enctype' => 'multipart/form-data'

                                ));

                            ?>

                                <div class="panel-body">

                                    <!--FACEBOOK---------->

                                    <div class="form-group mar-btm">

                                        <label class="col-sm-3 control-label"></label>

                                        <div class="col-sm-6">

                                            <div class="input-group mar-btm">

                                                <span class="input-group-addon fb_font">

                                                    <i class="fa fa-facebook-square fa-lg"></i>

                                                </span>

                                                <input type="text" name="facebook" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'facebook'); ?>" id="demo-hor-inputemail" class="form-control">

                                            </div>

                                        </div>

                                    </div>

                                    <!--G+---------->

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" ></label>

                                        <div class="col-sm-6">

                                            <div class="input-group mar-btm">

                                                <span class="input-group-addon g_font">

                                                    <i class="fa fa-google-plus-square fa-lg"></i>

                                                </span>

                                                <input type="text" name="google-plus" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'google_plus'); ?>" id="demo-hor-inputemail" class="form-control">

                                            </div>

                                            

                                        </div>

                                    </div>

                                    <!--TWITTER---------->

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" ></label>

                                        <div class="col-sm-6">

                                            <div class="input-group mar-btm">

                                                <span class="input-group-addon tw_font">

                                                    <i class="fa fa-twitter-square fa-lg"></i>

                                                </span>

                                                <input type="text" name="twitter" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'twitter'); ?>" id="demo-hor-inputemail" class="form-control">

                                            </div>

                                            

                                        </div>

                                    </div>

                                    <!--PINTEREST---------->

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" ></label>

                                        <div class="col-sm-6">

                                            <div class="input-group mar-btm">

                                                <span class="input-group-addon pin_font">

                                                    <i class="fa fa-pinterest fa-lg"></i>

                                                </span>

                                                <input type="text" name="pinterest" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'pinterest'); ?>" id="demo-hor-inputemail" class="form-control">

                                            </div>

                                            

                                        </div>

                                    </div>

                                    <!--SKYPE---------->

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" ></label>

                                        <div class="col-sm-6">

                                            <div class="input-group mar-btm">

                                                <span class="input-group-addon skype_font">

                                                    <i class="fa fa-skype fa-lg"></i>

                                                </span>

                                                <input type="text" name="skype" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'skype'); ?>" id="demo-hor-inputemail" class="form-control">

                                            </div>

                                            

                                        </div>

                                    </div>

                                    <!--YOUTUBE---------->

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" ></label>

                                        <div class="col-sm-6">

                                            <div class="input-group mar-btm">

                                                <span class="input-group-addon youtube_font">

                                                    <i class="fa fa-youtube fa-lg"></i>

                                                </span>

                                                <input type="text" name="youtube" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'youtube'); ?>" id="demo-hor-inputemail" class="form-control">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!--SAVE---------->

                                <div class="panel-footer text-right">

                                    <span class="btn btn-success btn-labeled fa fa-check submitter enterer"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>

                                        <?php echo translate('save');?>

                                    </span>

                                </div>

                            </form>

                        </div>

                    </div>

                    <!-- START : MANAGE SEO------>

                    <div id="demo-stk-lft-tab-5" class="tab-pane fade">

                         <div class="col-md-12">

                            <div class="panel">

                                <div class="panel-heading margin-bottom-20">

                                    <h3 class="panel-title">

                                        <?php echo translate('manage_search_engine_optimization');?>

                                    </h3>

                                </div>

                            <?php 

                                $description =  $this->db->get_where('vendor',array('vendor_id' => $this->session->userdata('vendor_id')))->row()->description;

                                $keywords =  $this->db->get_where('vendor',array('vendor_id' => $this->session->userdata('vendor_id')))->row()->keywords;

                            ?>

							<?php

                                echo form_open(base_url() . 'vendor/seo_settings/set', array(

                                    'class' => 'form-horizontal',

                                    'method' => 'post',

                                    'id' => '',

                                    'enctype' => 'multipart/form-data'

                                ));

                            ?>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">

                                        <?php echo translate('keywords'); ?>

                                    </label>

                                    <div class="col-sm-8">

                                        <div class="col-sm-">

                                            <input type="text"  data-role="tagsinput" name="keywords" value="<?php echo $keywords; ?>" class="form-control" >

                                        </div>

                                    </div>

                                </div>



                                <div class="form-group">

                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">

                                        <?php echo translate('description'); ?>

                                    </label>

                                    <div class="col-sm-8">

                                        <div class="col-sm-">

                                            <textarea name="description" class="form-control" rows='8' ><?php echo $description; ?></textarea>

                                        </div>

                                    </div>

                                </div>



                                <div class="panel-footer text-right">

                                    <span class="btn btn-success btn-labeled fa fa-check submitter enterer"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>

                                    <?php echo translate('save');?></span>

                                </div>

                            </form>               

                        </div>

                        </div> 

                    </div>
                    
                    
                    <!--Add brand-->
                    
                    <div id="demo-stk-lft-tab-6" class="tab-pane fade">

                         <div class="col-md-12">
                             
                             	<div id="page-title">
		                                <h1 class="page-header text-overflow"><?php echo translate('manage_brands_(_physical_product_)');?></h1>
	                            </div>
                                <div class="tab-base">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="">
                                                <div class="col-md-12" style="border-bottom: 1px solid #ebebeb;padding:10px;">
                                                    <button class="btn btn-primary btn-labeled fa fa-plus-circle pull-right"
                                                        onclick="ajax_modal('add','<?php echo translate('add_brand_(_physical_product_)'); ?>','<?php echo translate('successfully_added!');?>','brand_add','')">
                                                            <?php echo translate('create_brand');?>
                                                    </button>
                                                </div>
                                                <div class="tab-pane fade active in" id="list"
                                                    style="border:1px solid #ebebeb;
                                                        border-radius:4px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            						
                            <!--                        	onclick="ajax_modal('add','<?php echo translate('add_brand'); ?>','<?php echo translate('successfully_added!');?>','brand_add','')">-->
                            						    
                            <!--								<?php echo translate('create_brand');?>-->
                            								

                            					

                        </div> 

                    </div>

                    <div id="demo-stk-lft-tab-7" class="tab-pane fade">
                        <div class="col-md-12">
                            <div id="page-title">
                                <h1 class="page-header text-overflow"><?php echo translate('manage_shipping_service');?></h1>
                            </div>
                            <div class="tab-base">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="">
                                            <div class="col-md-12" style="border-bottom: 1px solid #ebebeb;padding:10px;">

                                                <label class="container_radio" onclick="set_service_default('default',<?php echo $this->session->userdata('vendor_id');?>);">default
                                                    <input type="radio" checked="checked" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container_radio" onclick="set_service_ups('ups',<?php echo $this->session->userdata('vendor_id');?>);">UPS
                                                    <input type="radio" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<div style="display:none;" id="site"></div>

<!-- for logo settings -->

<script>

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            

            reader.onload = function (e) {

                $('#wrap').hide('fast');

                $('#blah').attr('src', e.target.result);

                $('#wrap').show('fast');

            }

            

            reader.readAsDataURL(input.files[0]);

        }

    }

    

    $("#imgInp").change(function(){

        readURL(this);

    });



    function readURLn(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            

            reader.onload = function (e) {

                $('#blahn').attr('src', e.target.result);

            }

            

            reader.readAsDataURL(input.files[0]);

        }

    }

    

    $("#imgInpn").change(function(){

        readURLn(this);

    });





    var base_url = '<?php echo base_url(); ?>'

    var user_type = 'vendor';

    var module = 'site_settings';

    var list_cont_func = 'show_all';

	

	$(document).ready(function() {

		$("form").submit(function(e){

			return false;

		});


//Remove Image
$("#imgremove").click(function(){
	var r =confirm("Are you want to delete this Image?");
	if (r == true) {
  var vendorid=<?php echo $this->session->userdata('vendor_id'); ?>;
 // alert(vendorid);
  $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>vendor/removevcimage",
            data: "vendorid=" + vendorid ,
            success: function(){
                //alert('success');
                location.reload();
                }
        }); 
    }
});

	});


</script>

<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">

</script>


<script>
	var base_url = '<?php echo base_url(); ?>'
	var user_type = 'vendor';
	var module = 'brand';
	var list_cont_func = 'list';
	var dlt_cont_func = 'delete';
</script>

<script>
    function set_service_default(service_type, vendor_id) {

        var type = service_type;
        var vendor_id = vendor_id;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>home/set_service_type",
            data: {
                type:type,vendor_id:vendor_id
            },
            success: function(data) {
                console.log(data);
                // alert(type);
                // alert(vendor_id);
            },
            error: function(ts){
                // alert(ts.responseText);
                console.log(ts.responseText);
            }
        });
        return false;

    }
    function set_service_ups(service_type, vendor_id) {

        var type = service_type;
        var vendor_id = vendor_id;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>home/set_service_type",
            data: {
                type:type,vendor_id:vendor_id
            },
            success: function(data) {
                console.log(data);
                // alert('asdfasdf'+type);
            },
            error: function(ts){
                // alert(ts.responseText);
                console.log(ts.responseText);
            }
        });
        return false;

    }
</script>



 





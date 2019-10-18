<!-- PAGE -->
<!--compose-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<style>
    .alertable {
        position: fixed;
        z-index: 9999;
        top: 38vh;
        left: calc(50% - 150px);
        width: 300px;
        background: white;
        border-radius: 4px;
        padding: 20px;
        margin: 0 auto;
    }

    /* Overlay */
    .alertable-overlay {
        position: fixed;
        z-index: 9998;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, .5);
    }

    /* Message */
    .alertable-message {
        margin-bottom: 20px;
    }

    /* Prompt */
    .alertable-prompt {
        margin-bottom: 20px;
    }

    .alertable-input {
        width: 100%;
        border-radius: 4px;
        box-shadow: none;
        border: solid 1px #ccc;
        font-family: inherit;
        font-size: inherit;
        color: inherit;
        padding: 6px 12px;
        display: block;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    /* Button group */
    .alertable-buttons {
        text-align: right;
    }

    /* OK button */
    .alertable-ok {

        background-color: #5cb85c;

        border: solid 1px #5cb85c;
        font-family: inherit;
        font-size: inherit;
        color: white;
        border-radius: 4px;
        padding: 6px 12px;
        margin-left: 4px;
        cursor: pointer;
    }

    .alertable-ok:hover,
    .alertable-ok:focus,
    .alertable-ok:active {
        background-color: #589c58;
    }

    /* Cancel button */
    .alertable-cancel {
        border: solid 1px #ddd;
        background: white;
        font-family: inherit;
        font-size: inherit;
        color: #888;
        border-radius: 4px;
        padding: 6px 12px;
        margin-left: 4px;
        cursor: pointer;
    }

    .alertable-cancel:hover,
    .alertable-cancel:focus,
    .alertable-cancel:active {
        background-color: #f2f2f2;
    }
</style>

<script>
    //
    // jquery.alertable.js - Minimal alert, confirmation, and prompt alternatives.
    //
    // Developed by Cory LaViska for A Beautiful Site, LLC
    //
    // Licensed under the MIT license: http://opensource.org/licenses/MIT
    //
    jQuery&&function(e){"use strict";function t(t,u,s){var d=e.Deferred();return i=document.activeElement,i.blur(),e(l).add(r).remove(),s=e.extend({},e.alertable.defaults,s),l=e(s.modal).hide(),r=e(s.overlay).hide(),n=e(s.okButton),o=e(s.cancelButton),s.html?l.find(".alertable-message").html(u):l.find(".alertable-message").text(u),"prompt"===t?l.find(".alertable-prompt").html(s.prompt):l.find(".alertable-prompt").remove(),e(l).find(".alertable-buttons").append("alert"===t?"":o).append(n),e(s.container).append(r).append(l),s.show.call({modal:l,overlay:r}),"prompt"===t?e(l).find(".alertable-prompt :input:first").focus():e(l).find(':input[type="submit"]').focus(),e(l).on("submit.alertable",function(r){var n,o,i=[];if(r.preventDefault(),"prompt"===t)for(o=e(l).serializeArray(),n=0;n<o.length;n++)i[o[n].name]=o[n].value;else i=null;a(s),d.resolve(i)}),o.on("click.alertable",function(){a(s),d.reject()}),e(document).on("keydown.alertable",function(e){27===e.keyCode&&(e.preventDefault(),a(s),d.reject())}),e(document).on("focus.alertable","*",function(t){e(t.target).parents().is(".alertable")||(t.stopPropagation(),t.target.blur(),e(l).find(":input:first").focus())}),d.promise()}function a(t){t.hide.call({modal:l,overlay:r}),e(document).off(".alertable"),l.off(".alertable"),o.off(".alertable"),i.focus()}var l,r,n,o,i;e.alertable={alert:function(e,a){return t("alert",e,a)},confirm:function(e,a){return t("confirm",e,a)},prompt:function(e,a){return t("prompt",e,a)},defaults:{container:"body",html:!1,cancelButton:'<button class="alertable-cancel" type="button">Cancel</button>',okButton:'<button class="alertable-ok" type="submit">OK</button>',overlay:'<div class="alertable-overlay"></div>',prompt:'<input class="alertable-input" type="text" name="value">',modal:'<form class="alertable"><div class="alertable-message"></div><div class="alertable-prompt"></div><div class="alertable-buttons"></div></form>',hide:function(){e(this.modal).add(this.overlay).fadeOut(100)},show:function(){e(this.modal).add(this.overlay).fadeIn(100)}}}}(jQuery);
</script>
<style>

    p {
        font-weight: 400;
    }

    a {
        text-decoration: none;
    }

    label {
        cursor: pointer;
    }

    .modal-btn {
        position: relative;
        width: 110px;
        height: 35px;
        background-color: #2c3e50;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.3);
        border-radius: 5px;
        font-size: 21px;
        color: white;
        text-align: center;
        /* line-height: 1.75; */
        transition: box-shadow 250ms ease;
    }
    .modal-btn:hover {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .modal-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        z-index: 10;
        visibility: hidden;
        transition: background-color 250ms linear;
    }

    .modal-content_msg {
        position: absolute;
        top: 35%;
        left: 55%;
        width: 40%;
        height: auto;
        margin-top: -18%;
        margin-left: -25%;
        padding: 30px;
        background-color: white;
        border-radius: 4px;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
        transform: scale(0);
        transition: transform 250ms ease;
        visibility: hidden;
        z-index: 20;
    }
    .modal-content_msg .close {
        position: relative;
        float: right;
        font-size: 18px;
        transition: transform 500ms ease;
        z-index: 11;
    }
    .modal-content_msg .close:hover {
        color: #3498db;
        transform: rotate(540deg);
    }
    .modal-content_msg header {
        position: relative;
        display: block;
        border-bottom: 1px solid #eee;
    }
    .modal-content_msg header h2 {
        margin: 0 0 10px;
        padding: 0;
        font-size: 28px;
    }
    .modal-content_msg article {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        font-size: 16px;
        /*line-height: 1.75;*/
    }
    .modal-content_msg footer {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        width: 100%;
        margin: 0;
        padding: 10px 0 0;

    }
    .modal-content_msg footer .button {
        position: relative;
        padding: 7px 10px 7px 10px;
        border-radius: 3px;
        font-size: 14px;
        font-weight: 400;
        color: white;


        overflow: hidden;
    }
    .modal-content_msg footer .button:before {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.2);
        transition: width 250ms ease;
        z-index: 0;
    }
    .modal-content_msg footer .button:hover:before {
        width: 100%;
    }
    .modal-content_msg footer .button.success {
        margin-right: 5px;
        background-color: #2ecc71;
    }
    .modal-content_msg footer .button.danger {
        background-color: #e74c3c;
    }

    #modal {
        display: none;
    }
    #modal:checked ~ .modal-bg {
        visibility: visible;
        background-color: black;
        opacity: 0.7;
        transition: background-color 250ms linear;
    }
    #modal:checked ~ .modal-content_msg {
        visibility: visible;
        transform: scale(1);
        transition: transform 250ms ease;
        z-index: 111;
    }
    .button {
        background-color:#4CAF50; /* Green */
        border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .button_danger{
        background-color: #e74c3c;
        border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button1 {border-radius: 2px;}

</style>
<!--compose-->
<!--compose-->
    <input type="checkbox" id="modal" />
    <label for="modal" class="modal-bg"></label>
    <div class="modal-content_msg">
        <label for="modal" class="close">
            <i class="fa fa-times" aria-hidden="true"></i>
        </label>
        <header>
            <h3>
                New conversation
             </h3> With
            <input class="form-control" id="vendor_name"  type="text"  value = "<?php
                
                 $array = json_decode($row['added_by'], true);
                 
                 $seller_type = $array['type'];
                 
                 $vendor_id = $array['id'];
                 
                 if($seller_type == 'admin'){
                     
                     $this->db->where('admin_id', $vendor_id);

                     $vendor_name = $this->db->get('admin')->result()[0]->name;
                 }
                 
                 else{
                     
                     $this->db->where('vendor_id', $vendor_id);

                     $vendor_name = $this->db->get('vendor')->result()[0]->name;
                 } 
                 
                 echo $vendor_name;
                 
                ?>" >
                <hr style = "margin-top: 10px;">
        </header>
        <article class="content">
            <input class="form-control" id="sub" type="text" placeholder="Subject" style = "margin-top:-10px;">
            <textarea maxlength="5000" rows="7" class="form-control" id="send_message" style="height: 138px;    margin-top: 10px;" placeholder="Message"></textarea>
        </article>
        <footer>
            <label for="modal" class="button button_danger">Cancel</label>&nbsp;&nbsp;
            <button target="_parent" class="button button1 send_btn" style="padding: 11px 18px;">Send</button>
        </footer>
    </div>
    <!--compose-->
     
    <!---->
<?php
    $thumbs = $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','all');
    $mains = $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','all'); 
?>
<section class="page-section">
    <div class="container">
        <div class="row product-single productdtls_page" style="margin-top: 0px">
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 zoom">
                        <div class="badges">
                            <?php if($row['featured'] == 'ok'){ ?>
                            <div class="hot"><?php echo translate('featured'); ?></div>
                            <?php } ?>
                            <?php if($row['deal'] == 'ok'){ ?>
                            <div class="new"><?php echo translate("today's_deal"); ?></div>
                            <?php } ?>
                        </div>
                        <img class="img-responsive main-img zoom" id="set_image" src="" alt=""/>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 others-img">
                        <?php
                            $i=1;
                            foreach ($thumbs as $id=>$row1) {
                        ?>
                        <div class="related-product " id="main<?php echo $i; ?>">
                            <img class="img-responsive img" data-src="<?php echo $mains[$id]; ?>" src="<?php echo $row1; ?>" alt=""/>
                        </div>
                        <?php
                            $i++;
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
                <h3 class="product-title"><?php echo $row['title'];?></h3>
                <?php
                if ($this->db->get_where('product', array('product_id' => $row['product_id']))->row()->is_bundle == 'no') {
                ?>
                    <div class="product-info">
                        <p>
                            <a href="<?php echo base_url(); ?>home/category/<?php echo $row['category']; ?>">
                                <?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name');?>
                            </a>
                        </p>
                        ||
                        <p>
                            <a href="<?php echo base_url(); ?>home/category/<?php echo $row['category']; ?>/<?php echo $row['sub_category']; ?>">
                                <?php echo $this->crud_model->get_type_name_by_id('sub_category',$row['sub_category'],'sub_category_name');?>
                            </a>
                        </p>
                        ||
                        <p>
                            <a href="<?php echo base_url(); ?>home/category/<?php echo $row['category']; ?>/<?php echo $row['sub_category']; ?>-<?php echo $row['brand']; ?>">
                            <?php echo $this->crud_model->get_type_name_by_id('brand',$row['brand'],'name');?>
                            </a>
                        </p>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($this->db->get_where('product', array('product_id' => $row['product_id']))->row()->is_bundle == 'yes') {
                ?>
                <div class="product-info">
                    <?php //echo translate('products_:');?>
                    <?php
                        $products = json_decode($row['products'], true);
                        foreach ($products as $product) { ?>
                            <!-- echo $product['product_id'].'<br>'; -->
                            <P>
                            <a href="<?php echo $this->crud_model->product_link($product['product_id']); ?>">
                                <?php echo $this->db->get_where('product', array('product_id' => $product['product_id']))->row()->title . '<br>';?>
                            </a>
                            </P>
                    <?php
                        }
                    ?>
                </div>
                <?php
                }
                ?>
                <?php if ($this->db->get_where('general_settings', array('general_settings_id' => '58'))->row()->value == 'ok'and $this->db->get_where('general_settings', array('general_settings_id' => '81'))->row()->value == 'ok'){ ?>
                <!--<div class="added_by">
                    <?php echo translate('sold_by_:');?>
                    <p>
                        <?php //echo $this->crud_model->product_by($row['product_id'],'with_link');?>
                    </p>
                </div>-->
                <?php } ?>
                <div class="product-rating clearfix">
                    <div class="rating ratings_show" data-original-title="<?php echo $rating = $this->crud_model->rating($row['product_id']); ?>"   
                        data-toggle="tooltip" data-placement="left">
                        <?php
                            $r = $rating;
                            $i = 6;
                            while($i>1){
                                $i--;
                        ?>
                            <span class="star <?php if($i<=$rating){ echo 'active'; } $r++; ?>"></span>
                        <?php
                            }
                        ?>
                    </div>
                    
                    <div class="rating inp_rev list-inline" style="display:none;" data-pid='<?php echo $row['product_id']; ?>'>
                        <span class="star rate_it" id="rating_5" data-rate="5"></span>
                        <span class="star rate_it" id="rating_4" data-rate="4"></span>
                        <span class="star rate_it" id="rating_3" data-rate="3"></span>
                        <span class="star rate_it" id="rating_2" data-rate="2"></span>
                        <span class="star rate_it" id="rating_1" data-rate="1"></span>
                    </div>
                    <!--<a class="reviews ratings_show" href="#">
                        <?php echo $row['rating_num']; ?>
                        <?php echo translate('review(s)'); ?> 
                    </a> --> 
                    <?php  
                        if($this->session->userdata('user_login') == 'yes'){
                            $user_id = $this->session->userdata('user_id');
                            $user_products = $this->db->select('product_details')->from('sale')->where('buyer', $user_id)->get()->result_array();

                            foreach ($user_products as $user_prod) {
                                foreach($user_prod as $prods){
                                    $prods = json_decode($prods, true);
                                    foreach($prods as $prod){
                                        //echo $prod['id'];
                                        if($prod['id'] == $row['product_id']){
                                            //echo $prod['id'];
                                            $is_review = 'yes';
                                        }
                                    }
                                }
                            }
                            $rating_user = json_decode($row['rating_user'],true);
                            if(!in_array($user_id,$rating_user)){
                                if ($is_review == 'yes') {
                    ?>
                    <a class="add-review rev_show ratings_show" href="#">
                        | <?php echo translate('add_your_review');?>
                    </a>
                    <?php 
                                }
                            }
                        }
                    ?>
                </div>
                
                <hr class="page-divider"/>

                <?php
                $all_op = json_decode($row['options'],true);
                $all_c = json_decode($row['color'],true);
                if($all_c){
                    ?>
                    <div class="options">
                        <h3 class="title"><?php echo translate('color_:');?></h3>
                        <div class="content">
                            <ul class="list-inline colors" id="colorpsc">
                                <?php
                                $mpid=$row['product_id'];
                                $mpids = $this->db->query("SELECT pcimage,num_of_pcimgs FROM product WHERE product_id=$mpid");
                                $pcimgvalue= $mpids->row();
                                $numpic=$pcimgvalue->num_of_pcimgs;
                                $pimg=explode(',',$pcimgvalue->pcimage);
                                $n = 0;
                                foreach($all_c as $i => $p){
                                    $c = '';
                                    $n++;
                                    $picimage++;
                                    if($a = $this->crud_model->is_added_to_cart($row['product_id'],'option','color')){
                                        if($a == $p){
                                            $c = 'checked';
                                        }
                                    } else {
                                        if($n == 1){
                                            $c = 'checked';
                                        }
                                    }

                                    if($numpic !=0){
                                        ?>

                                        <li>

                                            <input type="radio" style="display:none;" id="c-<?php echo $i; ?>" value="<?php echo $p; ?>" name="color">
                                            <label style="background:<?php echo $p; ?>;" for="c-<?php echo $i; ?>" data-src="<?php echo base_url();?>product_color/<?php echo $pimg[$i]; ?>"></label>
                                        </li>
                                    <?php } ?>
                                    <?php
                                }

                                ?>
                                <script>

                                    $(document).ready(function(){
                                        $("#colorpsc li label").click(function () {
                                            var changebigimg = $(this).data("src");
                                            $("#set_image").attr("src",changebigimg);
                                        });
                                    });

                                </script>

                            </ul>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <br>
                <div style="display: flex;">
                    <div style="margin-top: 11px; margin-right: 15px;">Brand:</div>
                    <div>
                        <?php
                        $brand_name = $this->db->get_where('brand',array('brand_id' => $row['brand']))->row()->name;
                        $brand_logo = $this->db->get_where('brand',array('brand_id' => $row['brand']))->row()->logo;
                        echo $brand_name;
							if(file_exists('uploads/brand_image/'.$brand_logo)){?>
                                <img class="img-md" style="width: 50px;height:50px;border-radius:50%;" src="<?php echo base_url(); ?>uploads/brand_image/<?php echo $brand_logo; ?>" /><?php
                            } else {
                            ?>
                            <img class="img-md" style="width: 50px;height:50px;border-radius:50%;" src="<?php echo base_url(); ?>uploads/brand_image/default.jpg" />
                            <?php
                            }
                        ?>
                    </div>
                </div>


                <hr class="page-divider"/>

                <div class="product-price prodtlsprice">
                    <?php //echo translate('price_:');?>
                    <?php if($row['discount'] > 0){ ?> 
                        <ins>
                            <?php echo currency($this->crud_model->get_product_price($row['product_id'])); ?>
                            <!--<span><?php //echo ' /'.$row['unit'];?></span>-->
                        </ins> 
                        <del><?php echo currency($row['sale_price']); ?></del>
                        <span class="disscounttxt themecolor">
                        <?php 
                           
                            if($row['discount_type']=='percent'){
                                $perp= '%';
                            }
                            else{
                                 $perp= currency();
                            }
                             echo translate('(').$row['discount'].$perp.translate(')').translate('Off');
                        ?>
                        </span>
                    <?php } else { ?>
                        <ins>
                            <?php echo currency($row['sale_price']); ?>
                            <!--<span><?php //echo ' /'.$row['unit'];?></span>-->
                        </ins>
                    <?php }?>
                    <p class="additionalchargr_txt mab-0">Additional tax may apply; charged at checkout</p>
                </div>
                <hr class="page-divider"/>
                <?php include 'order_option.php'?>



                <?php 
                		 $vid=$row['product_id']; 
                		 
                		$query = $this->db->query("SELECT * FROM product WHERE product_id=$vid");
                		
                		$vrow = $query->row();
                		
                		 $vids=json_decode($vrow->added_by);
                		 $vidss=$vrow->added_by;
                		 $number=$vids->id;
                		
                		/* $length=strlen($vids);
                		//$number = substr($vids,-4,2);
						if($length=="25"){
						$number = substr($vids,-3,1);	
						}elseif($length=="27"){
						$number = substr($vids,-4,2);	
						}elseif($length=="26"){
						$number = substr($vids,-4,3);	
						}*/
						$vdetails=$this->db->query("SELECT * FROM vendor WHERE vendor_id=$number");
						$vdet=$vdetails->row();
						//echo "SELECT COUNT(*)  FROM product WHERE added_by='$vids'";
						$countproduct=$this->db->query("SELECT * FROM product WHERE added_by='$vidss'");
						 $count=$countproduct->num_rows();
						
                		
                		if($vids !='{"type":"admin","id":"1"}'){
                			 $rating = $this->crud_model->vendor_rating($number);
                			if($rating=="1.00"){
								$star="1star.png";
							}elseif($rating=="2.00"){
								$star="2star.png";
							}if($rating=="3.00"){
								$star="3star.png";
							}if($rating=="4.00"){
								$star="4star.png";
							}if($rating=="5.00"){
								$star="5star.png";
							}else{
								$star="0star.png";
							}
							//echo "SELECT SUM(rating_num) FROM product WHERE added_by='$vids'";
							
						
                		?>
                		<?php  ?>
                <div class="vendorinformation_dtls">
                	<table>
                		<tr>
                			<td class="tabletoptitle">SELLER INFORMATION</td>
                			<td><span class="vendorreviewstar"><img src="<?php echo base_url(); ?>template/front/img/<?php echo $star; ?>" alt="Home"/></span></td>
                			<td class="text-center tabletoptitle">0</td>
                			<td class="text-center tabletoptitle"><?php echo $count; ?></td>
                		</tr>
                		<tr>
                		
                			<td>Sold By: <?php echo $this->crud_model->product_by($row['product_id'],'with_link');?></td>
                			<td class="text-left">Location:  <?php echo $vdet->address1 ; ?></td>
                			<td class="text-center">Reviews</td>
                			<td class="text-center">Products</td>
                		</tr>
                	</table>
                </div>
                <?php }  ?>
            </div>
            <div class = "col-md-12 col-sm-12 col-xs-12">
                 <div  style = "  border-radius: 5px;    padding: 10px;width: 57%;    margin-top: 20px;    background-color: #ece9de;" >
                    <p style = "margin-bottom: 0px;">Have a question about the item?
                    <div>
                        <label for="modal" class="" style="    float: left;    margin-top: -22px;     margin-left: 180px; ">
                                  <div class="" style = " font-size: 13px;    margin-left: 30px;    text-transform: initial;     text-decoration-line: underline;">Send the seller a message.</div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
</section>

<!-- /PAGE -->
                
<script>
    $(".img").click(function(){
        var src = $(this).data('src');
        $("#set_image").attr("src", src);
        $(".related-product").removeClass("selected");
        $(this).closest(".related-product").addClass("selected");
    });
    $(document).ready(function() {
        $("#main1").addClass("selected");
        var src=$("#main1").find(".img").data('src');
        $("#set_image").attr("src", src);
    });
    
    $(function(){
        //setTimeout(function(){ 
            $('.zoom').zoome({hoverEf:'transparent',showZoomState:true,magnifierSize:[200,200]});
        //}, 3000);
        
    });
    
    function destroyZoome(obj){
        if(obj.parent().hasClass('zm-wrap'))
        {
            obj.unwrap().next().remove();
        }
    }
</script>
<script>
    $('body').on('click', '.rev_show', function(){
        $('.ratings_show').hide('fast');
        $('.inp_rev').show('slow');
    });
</script>
<style>
    .rate_it{
        display:none;   
    }

    .product-single .badges div{
        padding: 0 5px !important;
    }

    .product-price del {
        font-weight: 400;
        font-size: 24px;
    }
</style>

<script>

$('.send_btn').click(function(){
    
    var vendor_name = $('#vendor_name').val();
    var sub = $('#sub').val();
    var send_message = $('#send_message').val();
   
    console.log(vendor_name);
    console.log(sub);
    console.log(send_message);
      
        $.ajax({  
            type: "POST",  
            url: "<?php echo base_url(); ?>home/ticket_message_add_2",  
            data: {vendor_name:vendor_name,sub:sub, send_message:send_message },  
            success: function() {
                $.alertable.alert('Message was sent successfully!').always(function() {
                    location.reload();
                });
            },
            error: function(ts){
                alert(ts.responseText);
                console.log(ts.responseText);
            }
        });
        return false;
});
</script>

        
        
        
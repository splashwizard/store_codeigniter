<!--customer login-->
<script>
	 function DrawCaptcha()
  {
  var a = Math.ceil(Math.random() * 6)+ '';
  var b = Math.ceil(Math.random() * 6)+ '';
  var c = Math.ceil(Math.random() * 6)+ '';
  var d = Math.ceil(Math.random() * 6)+ '';
  var e = Math.ceil(Math.random() * 6)+ '';
  var f = Math.ceil(Math.random() * 6)+ '';
  var g = Math.ceil(Math.random() * 6)+ '';
  var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f ;
  document.getElementById("txtCaptcha").value = code
  }
  window.onload = DrawCaptcha;
   function removeSpaces(string){
  return string.split(' ').join('');
 }
</script>
<section class="page-section-logreg color get_into pat-30 pab-60 non-fixedbackground" style="background-image: url('<?php echo base_url(); ?>template/front/img/login-background.jpg');">
    <div class="container" >
        <div class="row margin-top-0">
            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12">
            	
            	<div class="loginpageform">
            		<div class="loginleft">
            			<div class="loglefticon text-center">
            				<img src="<?php echo base_url(); ?>template/front/img/loginuser-icon.png" alt="" title="Login User" />
            			</div>
            			<div class="logleft_content">
            				<h2 class="logtitles text-uppercase pab-20 mab-20"><strong>Get</strong><br/> your business<br/> online in 5 minutes</h2>
            				
            				<ul class="logleft_list">
            					<li><a href="<?php echo base_url(); ?>home/login_set/registration"><i class="fa fa-caret-right"></i>REGISTER YOUR ACCOUNT NOW</a></li>
            					<li><a href="<?php echo base_url(); ?>home/vendor_logup/registration"><i class="fa fa-caret-right"></i>OPEN YOUR SHOP</a></li>
            					<li><a href="#"><i class="fa fa-caret-right"></i>START SELLING. GROW YOUR SALES.</a></li>
            				</ul>
            			</div>
            		</div>
            		<div class="loginright" id="login">
            		    
            		    <?php $url_code=$_GET['u'];?>
            		    
            			<?php
		                    echo form_open(base_url() . 'home/login/do_login/'.$url_code, array(
		                        'class' => 'form-login',
		                        'method' => 'post',
		                        'id' => ''
		                    ));
		                    $fb_login_set = $this->crud_model->get_type_name_by_id('general_settings','51','value');
		                    $g_login_set = $this->crud_model->get_type_name_by_id('general_settings','52','value');
		                ?>
            			<div class="logintop">
            				<h3 class="logintoptitle mat-0 pab-15 mab-30"><span><?php echo translate('Login_For_Coustomer');?></span></h3>
            			</div>
            			<div class="logsection mab-30">
            				<div class="logsectionborder_inner">
            					<div class="logfield">
            						<input class="form-control" type="email" name="email" placeholder="<?php echo translate('Your Email Address');?>">
            					</div>
            					<div class="logfield">
            						<input class="form-control" type="password" name="password" placeholder="<?php echo translate('Enter Password');?>">
            					</div>
            					
            				</div>
            			</div>
		                <?php if($fb_login_set == 'ok' || $g_login_set == 'ok'){ ?>
		                <div class="loginsocial mab-15">
		                <h5 class="smalltitle mab-20">EASILY USING</h5>
		                 <?php if($fb_login_set == 'ok'){ ?>
		                  <?php if (@$user): ?>
		                	<a class="socialloginbtn" href="<?= $url ?>">
		                		<img src="<?php echo base_url(); ?>template/front/img/fblogin-icon.png" alt="" title="Login User" />
		                		<span><?php echo translate('Facebook');?></span>
		                	</a>
		                	<?php else: ?>
		                	<a class="socialloginbtn" href="<?= $url ?>">
		                		<img src="<?php echo base_url(); ?>template/front/img/fblogin-icon.png" alt="" title="Login User" />
		                		<span><?php echo translate('Facebook');?></span>
		                	</a>
		                	 <?php endif; ?>
		                	 <?php } if($g_login_set == 'ok'){ ?> 
		                	   <?php if (@$g_user): ?>
		                	<a class="socialloginbtn" href="<?= $g_url ?>">
		                		<img src="<?php echo base_url(); ?>template/front/img/googleloin-icon.png" alt="" title="Login User" />
		                		<span><?php echo translate('Google');?></span>
		                	</a>
		                	<?php else: ?>
		                	<a class="socialloginbtn" href="<?= $g_url ?>">
		                		<img src="<?php echo base_url(); ?>template/front/img/googleloin-icon.png" alt="" title="Login User" />
		                		<span><?php echo translate('Google');?></span>
		                	</a>
		                	<?php endif; ?>
		                	<?php } ?>
		                </div>
		                <?php } ?>
		                
		                <div class="capturesection mab-30">
            				<div class="logsectionborder_inner">
            					<div class="logfield catchafield prelative">
            						<input type="text" class="form-control dontcopy" id="txtCaptcha" style="background-image:url(images/cap.JPG); border:none; font-weight: bold; font-family:Modern" readonly="readonly" />
            						<div class="realperson-regen">
            							<span id="btnrefresh" onclick="DrawCaptcha();" class="fa fa-refresh"></span>
            						</div>
            					</div>
            					<div class="logfield">
            						<input placeholder="Please Enter the number shown above" type="text" class="form-control" required  id="txtInput" name="captchavalue"/>
            					</div>
            				</div>
            				<span id="captcherror" style="color: #ff0000"></span>
            			</div>
		                
		                
		                <div class="logbtn mat-20">
		                <input type="button" class="logbutton no-border br-5 login_btn noborder whitecolor" value="<?php echo translate('Login');?>" />
		                	<p class="newregacc">Do not have an account? <a href="<?php echo base_url(); ?>home/login_set/registration">Create Account</a></p>
		                </div>
		                
		                </form>
		                <div class="halfwidth text-left">
							<a href="#"   onClick="set_html('login','forget')" class="forgotpsw" ><?php echo translate('forgot_password');?> ?</a>
						</div>
						
            		</div>
            		<div class="forgetten_password loginright" id="forget" style="display:none">
                        <div class="row margin-top-0">
                            <div class="">
                                <?php
                                    echo form_open(base_url() . 'home/login/forget/', array(
                                        'class' => 'form-login',
                                        'method' => 'post',
                                        'id' => 'forget_form'
                                    ));
                                ?>
                                    <div class="row box_shape">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="<?php echo translate('email_address');?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                                            <span class="forgot-password pull-left" style="cursor:pointer;" onClick="set_html('forget','login')">
                                                <?php echo translate('login');?>
                                            </span>
                                            <span class="btn btn-primary btn-sm forget_btn enterer" style = "    background-color: #7cc242;    border-radius: 5px;    border-color: #7cc242;    width: 80px;    height: 34px;    font-size: 15px;">
                                                <?php echo translate('Send');?>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            	</div>
            	
                
            </div>
        </div>
    </div>
    
    
</section>

  
  
<script>


$(document).ready(function () {
    $('input.dontcopy').bind('copy paste', function (e) {
       e.preventDefault();
    });
  });
  
  
	function set_html(hide,show){
		$('#'+show).show('fast');
		$('#'+hide).hide('fast');
	}
	
	// Captcha Code
	
	
</script>
<style>
	.g-icon-bg {
		background: #ce3e26;
	}
	.g-bg {
		background: #de4c34;
		height: 37px;
		margin-left: 41px;
		width: 166px;
	}
</style>
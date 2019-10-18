<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="300">
	<title><?php echo translate('login');?> | <?php echo $this->db->get_where('general_settings',array('type' => 'system_name'))->row()->value;?></title>

	<!--STYLESHEET-->
	<!--Roboto Font [ OPTIONAL ]-->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300,500" rel="stylesheet" type="text/css">
	<!--Bootstrap Stylesheet [ REQUIRED ]-->
	<link href="<?php echo base_url(); ?>template/back/css/bootstrap.min.css" rel="stylesheet">
	<!--Activeit Stylesheet [ REQUIRED ]-->
	<link href="<?php echo base_url(); ?>template/back/css/activeit.min.css" rel="stylesheet">	
	<!--Font Awesome [ OPTIONAL ]-->
	<link href="<?php echo base_url(); ?>template/back/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!--Demo [ DEMONSTRATION ]-->
	<link href="<?php echo base_url(); ?>template/back/css/demo/activeit-demo.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/front/css/defaultstyle.css" rel="stylesheet">

	<!--SCRIPT-->
	<!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.js"></script>
	<?php $ext =  $this->db->get_where('ui_settings',array('type' => 'fav_ext'))->row()->value; $this->benchmark->mark_time();?>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>">
</head>

<body>
	<div class="loginsection"  id="container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 nopadding logleftimg_section">
					<div class="loginleftimg prelative text-center">
						<img src="<?php echo base_url(); ?>template/front/img/loginpage-bg.jpg" class="img-responsive" alt="" />
						<div class="vh1">
							<div class="vh2">
								<div class="vh3">
									<a href="<?php echo base_url(); ?>"><img src="<?php echo $this->crud_model->logo('admin_login_logo'); ?>" class="log_logo"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 nopadding logform_section prelative">
					<div class="logform_inner prelative">
					    
					    <?php
					    
					        $url_code_v=$_GET['v'];
					        
					      
					    ?>
            		    
		                        
		                        
						<div class="logfrm">
							<?php
								echo form_open(base_url() . ''.$control.'/login/', array(
									'method' => 'post',
									'id' => 'login'
								));
							?>
								<input type = "hidden" name = "url_code_v" value = "<?php echo $url_code_v;?>">
								<div class="lgfrm_left">
									<div class="lgfrmgfields mab-15">
										<div class="lgfrm_icon">
											<img src="<?php echo base_url(); ?>template/front/img/user-icon.png" class="img-responsive" alt="User Name" title="User Name" />
										</div>
										<div class="lgfrm_field">
											<label><?php echo translate('User name'); ?><span class="mendataryfield themecolor">*</span></label>
											<input type="text" name="email" class="form-control" placeholder="<?php echo translate('Type user name'); ?>">
										</div>
									</div>
									<div class="lgfrmgfields mab-15">
										<div class="lgfrm_icon">
											<img src="<?php echo base_url(); ?>template/front/img/password-icon.png" class="img-responsive" alt="Password" title="Password" />
										</div>
										<div class="lgfrm_field">
											<label><?php echo translate('Password'); ?><span class="mendataryfield themecolor">*</span></label>
											<input type="password" name="password" class="form-control" placeholder="<?php echo translate('**************'); ?>">
										</div>
									</div>
									
									<div class="lffttoer">
										<div class="halfwidth checkbocustom">
											<input type="checkbox" name="remember" id="rememberme">
											<span></span>
  											<label for="rememberme" class="text-uppercase">REMEMBER ME</label>
										</div>
										<div class="halfwidth text-right">
											<a href="#" onclick="ajax_modal('forget_form','<?php echo translate('forget_password'); ?>','<?php echo translate('email_sent_with_new_password!'); ?>','forget','')" class="forgotpsw" ><?php echo translate('forgot_password');?> ?</a>
										</div>
									</div>
								</div>
								<div class="lgfrm_right">
									<span class="snbtn" onclick="form_submit('login')">
                                    	<img src="<?php echo base_url(); ?>template/front/img/submitarrow.png" class="img-responsive" alt="Submit" title="Submit" />
                                    </span>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<style>

.loginleftimg {
	min-height: 100vh;
}
.loginleftimg > img {
	height: 100vh;
	object-fit:cover;
	width: 100%;
	
}
.logform_inner {
	min-height: 100vh;
}
.logfrm {
	padding: 30% 30% 0% 10%;
    display: table;
    width: 100%;
}
.lgfrm_left {
    display: table-cell;
    width: 80%;
    float: left;
}
.lgfrm_right {
    display: table-cell;
    width: 20%;
    float: left;
    margin: 26px 0;
    vertical-align: middle;
}
.lgfrmgfields {
    display: table;
    width: 100%;
}
.lgfrm_icon {
    display: table-cell;
    width: 40px;
    vertical-align: middle;
}
.lgfrm_icon img{
	width: 32px;
}
.lgfrm_field {
    display: table-cell;
    width: 85%;
}
.lgfrmgfields label {
	margin: 0;
    color: #9e9e9e;
    font-size: 16px;
}
.lgfrmgfields .form-control {
	padding: 0;
    border: none;
    border-bottom: 1px solid #c7c7c7;
    border-radius: 0;
    height: 26px;
    color: #000;
}
.lgfrmgfields .form-control::-webkit-input-placeholder { /* Chrome/Opera/Safari */
	color: #000;
}
.lgfrmgfields .form-control::-moz-placeholder { /* Firefox 19+ */
	color: #000;
}
.lgfrmgfields .form-control:-ms-input-placeholder { /* IE 10+ */
	color: #000;
}
.lgfrmgfields .form-control:-moz-placeholder { /* Firefox 18- */
	color: #000;
}
.snbtn {
    display: inline-block;
    width: 80px;
    height: 80px;
    background: #7cc242;
    border-radius: 50%;
    margin-left: 10px;
    cursor: pointer;
}
.checkbocustom {
	
}
.checkbocustom input[type="checkbox"]{
	display: none;
}
.checkbocustom span {
	position: relative;
    display: block;
    cursor: pointer;
}
.checkbocustom span:before {
	width: 52px;
    height: 23px;
    left: 0px;
    background: #efefef;
    border-radius: 15px;
    content: '';
    position: absolute;
    box-shadow: inset 0 5px 5px #d7d7d7;
    top: 5px;
    margin-top: -7.5px;
	box-sizing: border-box;
}
.checkbocustom span:after {
	content: '';
    position: absolute;
    top: 5px;
    margin-top: -7.5px;
    box-sizing: border-box;
    width: 23px;
    height: 23px;
    left: 0px;
    background: #fff;
    border-radius: 50%;
    transition: all 200ms ease-out;
}
.checkbocustom input[type="checkbox"]:checked + span:after {
	left: 29px;
	background: #7cc242;
}
.lffttoer {
    padding-left: 60px;
}
.halfwidth {
	width: 50%;
	float: left;
}
.checkbocustom label {
	color: #9e9e9e;
    font-size: 12px;
    cursor: pointer;
    margin-left: 60px;
}
.forgotpsw {
    color: #7cc242;
    text-transform: uppercase;
    padding: 5px 0;
    display: inline-block;
}
	</style>
	<!--jQuery [ REQUIRED ]-->
	<script src="<?php echo base_url(); ?>template/back/js/jquery-2.1.1.min.js"></script>
	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="<?php echo base_url(); ?>template/back/js/bootstrap.min.js"></script>
	<!--Activeit Admin [ RECOMMENDED ]-->
	<script src="<?php echo base_url(); ?>template/back/js/activeit.min.js"></script>
	<!--Background Image [ DEMONSTRATION ]-->
	<script src="<?php echo base_url(); ?>template/back/js/demo/bg-images.js"></script>
	<!--Bootbox Modals [ OPTIONAL ]-->
	<script src="<?php echo base_url(); ?>template/back/plugins/bootbox/bootbox.min.js"></script>
	<!--Demo script [ DEMONSTRATION ]-->
	<script src="<?php echo base_url(); ?>template/back/js/ajax_login.js"></script>
	
	<script>
        var base_url = "<?php echo base_url(); ?>";
        var cancdd = "<?php echo translate('cancelled'); ?>";
        var req = "<?php echo translate('this_field_is_required'); ?>";
		var sing = "<?php echo translate('signing_in...'); ?>";
		var nps = "<?php echo translate('new_password_sent_to_your_email'); ?>";
		var lfil = "<?php echo translate('login_failed!'); ?>";
		var wrem = "<?php echo translate('wrong_e-mail_address!_try_again'); ?>";
		var lss = "<?php echo translate('login_successful!'); ?>";
		var sucss = "<?php echo translate('SUCCESS!'); ?>";
		var rpss = "<?php echo translate('reset_password'); ?>";
        var user_type = "<?php echo $control; ?>";
        var module = "login";
		var unapproved = "<?php echo translate('account_not_approved._wait_for_approval.'); ?>";
		window.addEventListener("keydown", checkKeyPressed, false);
		function checkKeyPressed(e) {
		    if (e.keyCode == "13") {
				$('body').find(':focus').closest('form').find('.snbtn').click();
				if($('body').find('.modal-content').find(':focus').closest('form').closest('.modal-content').length > 0){
					$('body').find('.modal-content').find(':focus').closest('form').closest('.modal-content').find('.snbtn_modal').click();
				}
		    }
		}
    </script>
</body>
</html>


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



<!--<p id = 'demo'> </p>-->
<!--<input id = "pass" type="text" size="8" maxlength="8"></input>-->
<!--<input type="button" value = "validate" onclick="chkpwd()"></input>-->


<section class="page-section-logreg color get_into pat-30 pab-60 non-fixedbackground" style="background-image: url('<?php echo base_url(); ?>template/front/img/login-background.jpg');">

    <div class="container">

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
                    <div class="loginright">
                        <?php
                            echo form_open(base_url() . 'home/registration/add_info/', array(
                                'class' => 'form-login',
                                'method' => 'post',
                                'id' => 'sign_form'
                            ));
                            $fb_login_set = $this->crud_model->get_type_name_by_id('general_settings','51','value');
                            $g_login_set = $this->crud_model->get_type_name_by_id('general_settings','52','value');
                        ?>
                        <div class="logintop">
                            <h3 class="logintoptitle mat-0 pab-15 mab-30"><span><?php echo translate('Customer_Registration');?></span></h3>
                        </div>
                        
                        <div class="logsection mab-30">
                            <div class="logsectionborder_inner">
                                <div class="logfield name">
		            				<input class="form-control required" name="username" type="text" placeholder="<?php echo translate('User Name');?>" data-toggle="tooltip" title="<?php echo translate('User Name');?>">
		            			</div>
                                <div class="logfield halffield borderrirght">
                                    <input class="form-control required"   name="first_name" type="text" placeholder="<?php echo translate('first_name');?>" data-toggle="tooltip" title="<?php echo translate('first_name');?>">
                                </div>
                                <div class="logfield halffield">
                                    <input class="form-control required"  name="last_name" type="text" placeholder="<?php echo translate('last_name');?>" data-toggle="tooltip" title="<?php echo translate('last_name');?>">
                                </div>
                                <div class="logfield">
                                    <input class="form-control emails required"  id = "customer_email" name="email" type="email" placeholder="<?php echo translate('email');?>" data-toggle="tooltip" title="<?php echo translate('email');?>">
                                    <div id='email_note'></div>
                                </div>
                                <div class="logfield">
                                    <input class="form-control" id = "phone_number" name="phone" type="text" placeholder="<?php echo translate('phone');?>" data-toggle="tooltip" title="<?php echo translate('phone');?>">
                                </div>
                                
                                
                                
                                <div class="logfield halffield borderrirght">
                                    
                                    <input class="form-control pass1 required" id = "pass"   size="32" maxlength="32" type="password" name="password1" placeholder="<?php echo translate('password');?>" data-toggle="tooltip" title="<?php echo translate('password');?>">
                                </div>
                                <div class="logfield halffield">
                                    <input class="form-control pass2 required" type="password" id = "confirm_pass" name="password2" placeholder="<?php echo translate('confirm_password');?>" data-toggle="tooltip" title="<?php echo translate('confirm_password');?>">
                                </div>
                                <div id = 'demo' class="logfield" style = "text-align:center;"> </div>
                                <div class="logfield">
                                    <input class="form-control required" id = "address_1" name="address1" type="text" placeholder="<?php echo translate('address_line_1');?>" data-toggle="tooltip" title="<?php echo translate('address_line_1');?>">
                                </div>
                                <div class="logfield">
                                    <input class="form-control required" id = "address_2" name="address2" type="text" placeholder="<?php echo translate('address_line_2');?>" data-toggle="tooltip" title="<?php echo translate('address_line_2');?>">
                                </div>
                                <div class="logfield halffield borderrirght">
                                    <input class="form-control required" id = "city" type="text" name="city" placeholder="<?php echo translate('city');?>" data-toggle="tooltip" title="<?php echo translate('city');?>">
                                </div>
                                <div class="logfield halffield">
                                <select class="form-control required" id = "state" name="state">
                                    <option value=""><?php echo translate('state');?></option>  
                                    <?php 
                                    $this->db->where('action','Y');
                                    $statelist=$this->db->get('shiping_state')->result_array();
                                    foreach($statelist as $srow){
                                    ?>
                                    <option value="<?php echo $srow['sname'];?>"><?php echo $srow['sname'];?></option>
                                    <?php } ?>
                                </select>
                                     <!--<input class="form-control required" type="text" name="state" placeholder="<?php echo translate('state');?>" data-toggle="tooltip" title="<?php echo translate('state');?>">-->
                                </div>
                                <div class="logfield halffield borderrirght bbnone">
                                    <input class="form-control required" id = "country" type="text" name="country" placeholder="<?php echo translate('country');?>" data-toggle="tooltip" title="<?php echo translate('country');?>">
                                </div>
                                <div class="logfield halffield">
                                    <input class="form-control required" id = "zip" name="zip" type="text" placeholder="<?php echo translate('zip');?>" data-toggle="tooltip" title="<?php echo translate('zip');?>">
                                </div>
                                
                            </div>
                        </div>
                        
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
                        <div class="logbtn mat-0">
                            <p class="newregacc mab-10">
                            <input  name="terms_check" id="tccheckbox" type="checkbox" value="ok" >
                            <label for="tccheckbox">I Agree With</label>
                            <a href="<?php echo base_url();?>home/legal/terms_conditions" target="_blank">
                                <?php echo translate('terms_&_conditions');?>
                            </a></p>
                            <!--<input type="submit" class="logbutton no-border br-5 " value="<?php echo translate('Register');?>" />-->
                             <input type="button"  class="logbutton no-border br-5 login_btn noborder whitecolor"   onclick="chkpwd()"  value="<?php echo translate('Register');?>" />
                             
                             
                        </div>
                        </form>
                    </div>
                </div>
                
            </div>

        </div>

    </div>

</section>

<style>

    .get_into .terms a{

        margin:5px auto;

        font-size: 14px;

        line-height: 24px;

        font-weight: 400;

        color: #00a075;

        cursor:pointer;

        text-decoration:underline;

    }

    

    .get_into .terms input[type=checkbox] {

        margin:0px;

        width:15px;

        height:15px;

        vertical-align:middle;

    }

</style>
<script>
    $(document).ready(function () {
    $('input.dontcopy').bind('copy paste', function (e) {
      e.preventDefault();
    });
  });
</script>
 
<script type="text/javascript">
    chkpwd = function (Register){

        var str = document.getElementById('pass').value;
        if(str.length < 8)
        {
            document.getElementById("demo").innerHTML = "Password length must be 8 char";
            document.getElementById("demo").style.color = "Red";
            return('too_short');

        } else if (str.search(/[0-9]/) == -1){
            document.getElementById('demo').innerHTML = "At least 1 numeric value must be enter";
            document.getElementById('demo').style.color = "Red";
            return('no_number');
        }

        else if (str.search(/[a-z]/) == -1){
            document.getElementById('demo').innerHTML = "At least 1 small letter must be enter";
            document.getElementById('demo').style.color = "Red";
            return('no_letter');
        }

        else if (str.search(/[A-Z]/) == -1){
            document.getElementById('demo').innerHTML = "At least 1 Upper letter must be enter";
            document.getElementById('demo').style.color = "Red";
            return('no_Uletter');
        }

        else if (str.search(/[!\@\#\$\%\^\&\(\)\_\+\.\,\;\:]/) == -1){
            document.getElementById('demo').innerHTML = "At least 1 Special letter must be enter";
            document.getElementById('demo').style.color = "Red";
            return('no_Sletter');
        }

        // document.getElementById('demo').innerHTML = "Successful !";
        // document.getElementById('demo').style.color = "Green"; 
        return('ok');

    }
</script>

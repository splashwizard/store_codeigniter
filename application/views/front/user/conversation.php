<!--compose-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 
 
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

    .modal-content {
        position: absolute;
        top: 39%;
        left: 50%;
        width: 50%;
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
    .modal-content .close {
        position: relative;
        float: right;
        font-size: 18px;
        transition: transform 500ms ease;
        z-index: 11;
    }
    .modal-content .close:hover {
        color: #3498db;
        transform: rotate(540deg);
    }
    .modal-content header {
        position: relative;
        display: block;
        border-bottom: 1px solid #eee;
    }
    .modal-content header h2 {
        margin: 0 0 10px;
        padding: 0;
        font-size: 28px;
    }
    .modal-content article {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        font-size: 16px;
        /*line-height: 1.75;*/
    }
    .modal-content footer {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        width: 100%;
        margin: 0;
        padding: 10px 0 0;

    }
    .modal-content footer .button {
        position: relative;
        padding: 7px 10px 7px 10px;
        border-radius: 3px;
        font-size: 14px;
        font-weight: 400;
        color: white;


        overflow: hidden;
    }
    .modal-content footer .button:before {
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
    .modal-content footer .button:hover:before {
        width: 100%;
    }
    .modal-content footer .button.success {
        margin-right: 5px;
        background-color: #2ecc71;
    }
    .modal-content footer .button.danger {
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
    #modal:checked ~ .modal-content {
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
<div id="window">
    <!--compose-->
    <input type="checkbox" id="modal" />
    <label for="modal" class="modal-bg"></label>
    
    
    <!--new-->
    
    <div class="modal-content">
        <label for="modal" class="close">
            <i class="fa fa-times" aria-hidden="true"></i>
        </label>
         <?php
           echo form_open(base_url() . 'home/ticket_message_add_1/', array('class' => 'form-login','method' => 'post','enctype' => 'multipart/form-data'));
        ?>
            <header>
                <h3>New conversation</h3>
                <input class="form-control" name="vendor_name" type="text" placeholder="Enter vendor name"><hr style = "margin-top: 10px;">
            </header>
            <article class="content">
                <input class="form-control" name="sub" type="text" placeholder="Subject" style = "margin-top:-10px;">
                <textarea maxlength="5000" rows="7" class="form-control" name="send_message" id="comment" style="height: 138px;    margin-top: 10px;" placeholder="Message"></textarea>
            </article>
            <footer>
                <label for="modal" class="button button_danger">Cancel</label>
                <button target="_parent" class="button button1" style="padding: 10px;">Send</button>
            </footer>
        </form>
    </div>
 
    
    <!--compose-->

    <div class="information-title">
        <?php echo translate('Conversation');?>
        <label for="modal" class="modal-btn" style="    float: right;    margin-top: -22px;    margin-right: 15px;">
            <i class="fa fa-edit"  style = "    margin-left: -66px;margin-top: 9px;"></i>
            <div class="" style = "    margin-top: -24px;    font-size: 13px;    margin-left: 30px;    text-transform: initial;">Compose</div>
        </label>
    </div>
    <div class="details-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="tabs-wrapper content-tabs" style = "margin:10px;">
                    <div>
                        <ul class="nav nav-tabs" style="float: left;">
                            <li class="active">
                                <a href="#tab1" data-toggle="tab">
                                    <?php echo translate('Inbox ');?>
                                </a>
                            </li>

                            <li>
                                <a href="#tab2" data-toggle="tab">
                                    <?php echo translate('Sent');?>
                                </a>
                            </li>

                            <li>
                                <a href="#tab3" data-toggle="tab">
                                    <?php echo translate('All');?>
                                </a>
                            </li>
                             
                            <li>
                                <a href="#tab4" data-toggle="tab">
                                    <?php echo translate('Trash');?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <br>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                            <div class="wishlist tickets" style="margin-top: 10px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?php echo translate('Vendor name');?></th>
                                        <th><?php echo translate('Content');?></th>
                                        <th><?php echo translate('View');?></th>
                                        <th><?php echo translate('Delete');?></th>
                                    </tr>
                                    </thead>
                                    <tbody id="inbox_message">
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" id="inbox" value="0" />
                            <div class="pagination_box_inbox"></div>

                            <script>
                                function inbox_msg(page){
                                    if(page == 'no'){
                                        page = $('#inbox').val();
                                    } else {
                                        $('#inbox').val(page);
                                    }
                                    var alerta = $('#inbox_message');
                                    alerta.load('<?php echo base_url();?>home/user_inbox_message/'+page,
                                        function(){
                                        }
                                    );
                                }
                                $(document).ready(function() {
                                    inbox_msg('0');
                                });
                            </script>
                        </div>

                        <div class="tab-pane fade" id="tab2">
                            <div class="wishlist tickets" style="margin-top: 10px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?php echo translate('Vendor name');?></th>
                                        <th><?php echo translate('Content');?></th>
                                        <th><?php echo translate('View');?></th>
                                        <th><?php echo translate('Delete');?></th>
                                    </tr>
                                    </thead>
                                    <tbody id="sent_message">
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" id="sent" value="0" />
                            <div class="pagination_box_sent"></div>

                            <script>
                                function sent_msg(page){
                                    if(page == 'no'){
                                        page = $('#sent').val();
                                    } else {
                                        $('#sent').val(page);
                                    }
                                    var alerta = $('#sent_message');
                                    alerta.load('<?php echo base_url();?>home/user_sent_message/'+page,
                                        function(){
                                        }
                                    );
                                }
                                $(document).ready(function() {
                                    sent_msg('0');
                                });
                            </script>
                        </div>


                        <div class="tab-pane fade" id="tab3">
                            <div class="wishlist tickets" style="margin-top: 10px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?php echo translate('Vendor name');?></th>
                                        <th><?php echo translate('Content');?></th>
                                        <th><?php echo translate('View');?></th>
                                        <th><?php echo translate('Delete');?></th>
                                    </tr>
                                    </thead>
                                    <tbody id="all_message">
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" id="all" value="0" />
                            <div class="pagination_box_all"></div>

                            <script>
                                function all_msg(page){
                                    if(page == 'no'){
                                        page = $('#all').val();
                                    } else {
                                        $('#all').val(page);
                                    }
                                    var alerta = $('#all_message');
                                    alerta.load('<?php echo base_url();?>home/user_all_message/'+page,
                                        function(){
                                        }
                                    );
                                }
                                $(document).ready(function() {
                                    all_msg('0');
                                });
                            </script>
                        </div>
                         
                        <div class="tab-pane fade" id="tab4">
                            <div class="wishlist tickets" style="margin-top: 10px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?php echo translate('Vendor name');?></th>
                                        <th><?php echo translate('Content');?></th>
                                        <th><?php echo translate('Restore');?></th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody id="deleted_message">
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" id="delete" value="0" />
                            <div class="pagination_box_delete"></div>

                            <script>
                                function delete_msg(page){
                                    if(page == 'no'){
                                        page = $('#delete').val();
                                    } else {
                                        $('#delete').val(page);
                                    }
                                    var alerta = $('#deleted_message');
                                    alerta.load('<?php echo base_url();?>home/user_delete_message/'+page,
                                        function(){
                                        }
                                    );
                                }
                                $(document).ready(function() {
                                    delete_msg('0');
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script>
    $('body').on('click','.message_view',function(){
        var id = $(this).data('id');
        $("#window").load("<?php echo base_url()?>home/profile/message_view/"+id);
    });
</script>

 
 

 
<!--compose-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src="<?php echo base_url(); ?>template/front/js/bootstrap-notify.min.js"></script>
<script src="js/index.js"></script>
 
        
 
<!---->


 
 




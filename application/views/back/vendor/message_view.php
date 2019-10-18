<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
    foreach($message_data as $row)
    { 
?>    <?php 
    }
?>
    <div class="information-title">
        Detail 
         
    </div>
    
    
    
    <div id="all_messages_box_vendor">
        <div class="comments comments-scroll" id="messages_box">       </div>  
    </div>
    <hr class="page-divider">
    <div class="comments-form tickets">
        <h4 class="block-title">
            <?php echo translate('reply_message');?>
        </h4>
        <?php
    echo form_open(base_url() . 'vendor/ticket_reply_vendor/'.$row['ticket_id'], array(
        'class' => 'form-horizontal',
        'method' => 'post',
        'id' => 'ticket_reply',
        'enctype' => 'multipart/form-data'
    ));
    ?>
    <div class="form-group">
        <div class="col-sm-12">
                   <textarea  placeholder="<?php echo translate('your_message');?>" class="col-md-12 required" rows="9" data-height="200" name="reply" style="resize:both"></textarea>
        </div>
        
    </div> 
     
        <span class="btn  btn-theme-transparent vendor_reply" onclick="form_submit('ticket_reply','<?php echo translate('successfully replied!'); ?>')" >
            <i class="fa fa-comment"></i>
            <?php echo translate('reply');?>
        </span>
    </div>
    </form>
    
    
        
    
    <style>
        .comment-text {
            cursor:pointer;	
        }
    </style>
    <script>
        $(document).ready(function(){
            $('.shortened_message').on('click',function(){
                $(this).closest('.media-body').find('.shortened_message').hide();
                $(this).closest('.media-body').find('.big_message').show();
            });
            $('.big_message').on('click',function(){
                $(this).closest('.media-body').find('.shortened_message').show();
                $(this).closest('.media-body').find('.big_message').hide();
            });
            set_message_box();
            //setInterval(function(){ set_message_box(); }, 3000);
        });
        
        function set_message_box(){
            $('#all_messages_box_vendor').load('<?php echo base_url(); ?>vendor/profile/message_box/<?php echo $row['ticket_id']?>');
        }
    </script>   
    
   <script>
    $('.vendor_reply').on('click',function(){
                setTimeout(function(){location.reload();}, 2000);
            });
    
 
</script>
 
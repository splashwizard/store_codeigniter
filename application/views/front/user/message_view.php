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

<!--<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
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

<?php 
    foreach($message_data as $row)
    { 
?>    <?php 
    }
?>
    <div class="information-title">
        Detail
    </div>
    <div id="all_messages_box">
        <div class="comments comments-scroll" id="messages_box">       </div>  
    </div>
    <hr class="page-divider">

    <div class="comments-form tickets">
        <h4 class="block-title">
            <?php echo translate('reply_message');?>
        </h4>
            <div class="form-group">
                <textarea placeholder="<?php echo translate('your_message');?>" class="form-control" title="comments-form-comments" name="reply" rows="6" id = "reply_message_user"></textarea>
            </div>
            <div class="form-group">   
            <input type = "hidden"  value = "<?php echo $row['ticket_id'];?>" id = "reply_ticket_id">
                <button class="btn  btn-theme-transparent btn-icon-left submit_button enterer alert"><?php echo translate('reply');?></button>
            </div>
        <div id="ticket_setf" class="message_view" data-id="<?php echo $row['ticket_id']?>"></div> 
    </div>     
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
            $('#all_messages_box').load('<?php echo base_url(); ?>home/profile/message_box/<?php echo $row['ticket_id']?>');
        }
 
    </script>

    <script>

$('.alert').click(function(){
     
    var reply_ticket_id = $('#reply_ticket_id').val();
    
    var reply_message_user = $('#reply_message_user').val();
   
    console.log(reply_ticket_id);
    
    console.log(reply_message_user);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>home/ticket_reply/"+reply_ticket_id,
            data: {reply_ticket_id:reply_ticket_id,reply_message_user:reply_message_user},
            success: function() {
                $.alertable.alert('Message was sent successfully!').always(function() {
                    location.reload();
                });
            },
            error: function(ts){
                alert(ts.responseText);
                console.log(ts.responseText);
                Lobibox.notify('failed', {
                    position: 'bottom right',
                    msg: 'Your message was not sent successfully!'
                });
            }
        });
        return false;
});
</script>

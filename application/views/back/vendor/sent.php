<?php 
	$i = 0;
	foreach ($query as $row1) {
		$i++;
?>         
	<tr>
	    <td class = "description" style = "background-color:white; border: solid 1px #e0e0e0;    padding-top: 8px;    padding-bottom: 8px;">
	        <?php echo $row1['from_where'];?>
	    </td>
	    <td class="description" style = "white-space: nowrap;  overflow: hidden;  text-overflow: ellipsis;  max-width: 225px; background-color:white;border: solid 1px #e0e0e0;    padding-top: 8px;    padding-bottom: 8px;">
			<?php echo $row1['subject'];?><br>
			<?php echo $row1['message'];?>
			
			<?php
				$num = $this->crud_model->ticket_unread_messages_vendor($row1['ticket_id'],'admin');
				if($num > 0){
			?>
				<span class="btn btn-info btn-xs" style="margin-left:10px">
					<?php 
						echo translate('new_message').' '.'('.' ';
						echo $num .' '.')'; 
					?>
				</span>
			<?php }?>
		</td>
		 
		<td class="add"  style = "background-color:white;border: solid 1px #e0e0e0;    padding-top: 8px;    padding-bottom: 8px;">
			<a class="btn btn-theme btn-theme-xs btn-icon-left message_view_vendor" data-id="<?php echo $row1['ticket_id']?>" href="#">
				<i class="fa fa-envelope"></i>
				<?php echo translate('view_message');?>
			</a>
		</td>
		<td class="add" style = "background-color:white;border: solid 1px #e0e0e0;    padding-top: 8px;    padding-bottom: 8px;">
		    	<?php
                    echo form_open(base_url() . 'vendor/delete/', array('class' => 'form-login','method' => 'post','enctype' => 'multipart/form-data'));
                    ?>
                    <input type = "hidden" name = "trash_id" value = "<?php echo $row1['ticket_id']?>" >
                     <button class="btn btn-theme btn-theme-xs btn-icon-left message_view_trash"  style = "    background-color: red;    border-color: red;    margin-top: 15px;" >
        				<i class="fa fa-envelope"></i>
        				<?php echo translate('delete');?>
        			</button>
            </form>
		</td>
	</tr>
										 
<?php 
	}
?>

<tr class="text-center" style="" >
	<td id="pagenation_set_links" style = "    background-color: white;" ><?php echo $this->ajax_pagination->create_links(); ?></td>
</tr>
<!--/end pagination-->


<script>
	$(document).ready(function(){ 
		product_listing_defaults();
		$('.pagination_box_sent_vendor').html($('#pagenation_set_links').html());
	});
</script>
<style type="text/css">
    .pagination_box a{
        cursor: pointer;
    }
    .pleft_nav li.active {
        background-color: #ebebeb!important;
    }
</style>
 

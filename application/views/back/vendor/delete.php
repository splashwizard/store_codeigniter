<?php 
	$i = 0;
	foreach ($query as $row1) {
		$i++;
?>         
	<tr >
	    <td class = "add description" style = "background-color:white;border: solid 1px #e0e0e0;    padding-top: 8px;    padding-bottom: 8px;">
	        <?php echo $row1['from_where'];?>
	    </td>
	    <td class="add description" style = "background-color:white;border: solid 1px #e0e0e0;    padding-top: 8px;    padding-bottom: 8px;">
			<?php echo $row1['subject'];?><br>
			<?php echo $row1['message'];?>
		</td>
		 
		<td class="add" style = "background-color:white;border: solid 1px #e0e0e0;    padding-top: 8px;    padding-bottom: 8px;">
		 <?php
                    echo form_open(base_url() . 'vendor/restore/', array('class' => 'form-login','method' => 'post','enctype' => 'multipart/form-data'));
                    ?>
                    <input type = "hidden" name = "trash_id" value = "<?php echo $row1['ticket_id']?>" >
                     <button class="btn btn-theme btn-theme-xs btn-icon-left message_view_restore"  style = "    background-color: green;    border-color: green;" >
        				<i class="fa fa-envelope"></i>
        				<?php echo translate('Restore');?>
        			</button>
            </form>
            
		</td>
	</tr>
										 
<?php 
	}
?>


<tr class="text-center" style="display:none;" >
	<td id="pagenation_delete_links_sent_vendor" ><?php echo $this->ajax_pagination->create_links(); ?></td>
</tr>
<!--/end pagination-->


<script>
	$(document).ready(function(){ 
		product_listing_defaults();
		$('.pagination_box_delete').html($('#pagenation_delete_links_sent').html());
	});
</script>
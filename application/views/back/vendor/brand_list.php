	<div class="panel-body" id="demo_s">
		<table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,4" data-show-toggle="true" data-show-columns="false" data-search="true" >

			<thead>
				<tr>
					<th><?php echo translate('no');?></th>
					<th><?php echo translate('logo');?></th>
					<th><?php echo translate('name');?></th>
					<th><?php echo translate('added_by');?></th>
				 
					<th class="text-right"><?php echo translate('options');?></th>
				</tr>
			</thead>
				
			<tbody >
			<?php
				$i=0;
            	foreach($all_brand as $row){
            		if($this->crud_model->is_added_by('brand',$row['brand_id'],$this->session->userdata('vendor_id'))){
            		$i++;
			?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td >
                        <?php
							if(file_exists('uploads/brand_image/'.$row['logo'])){
						?>
						<img class="img-md" src="<?php echo base_url(); ?>uploads/brand_image/<?php echo $row['logo']; ?>" />  
						<?php
							} else {
						?>
						<img class="img-md" src="<?php echo base_url(); ?>uploads/brand_image/default.jpg" />
						<?php
							}
						?> 
                    </td>
                    <td><?php echo $row['name']; ?></td>
                    
                    <td>
                    	<?php
                    		$by = json_decode($row['added_by'],true);
                    		$name = $this->crud_model->get_type_name_by_id($by['type'],$by['id'],'name'); 
                    	?>
                    	<?php echo $name; ?> (<?php echo $by['type']; ?>)
                    </td> 
                     
                    <td class="text-right">
                        <a class="btn btn-success btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" 
                            onclick="ajax_modal('edit','<?php echo translate('edit_brand'); ?>','<?php echo translate('successfully_edited!'); ?>','brand_edit','<?php echo $row['brand_id']; ?>')" 
                                data-original-title="Edit" 
                                    data-container="body"><?php echo translate('edit');?>
                        </a>
                        
                        <a onclick="delete_confirm('<?php echo $row['brand_id']; ?>','<?php echo translate('really_want_to_delete_this?'); ?>')" 
                            class="btn btn-danger btn-xs btn-labeled fa fa-trash" 
                                data-toggle="tooltip" data-original-title="Delete" 
                                    data-container="body"><?php echo translate('delete');?>
                        </a>
                        
                    </td>
                </tr>
            <?php
            		}
            	}
			?>
			</tbody>
		</table>
	</div>
    <div id="coupn"></div>
	<div id='export-div'>
		<h1 style="display:none;"><?php echo translate('coupon'); ?></h1>
		<table id="export-table" data-name='coupon' data-orientation='p' style="display:none;">
				<thead>
					<tr>
						<th><?php echo translate('no');?></th>
						<th><?php echo translate('name');?></th>
						<th><?php echo translate('coupon');?></th>
					</tr>
				</thead>
					
				<tbody >
				<?php
					$i = 0;
	            	foreach($all_coupons as $row){
	            		if($this->crud_model->is_added_by('coupon',$row['coupon_id'],$this->session->userdata('vendor_id'))){
	            		$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $this->crud_model->get_type_name_by_id('coupon',$row['coupon'],'coupon_name'); ?></td>
				</tr>
	            <?php
	            		}
	            	}
				?>
				</tbody>
		</table>
	</div>

<style>
	.highlight{
		background-color: #E7F4FA;
	}
</style>







           
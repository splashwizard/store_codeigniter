<div class="panel-body" id="demo_s">
		<table id="demo-table" class="table table-striped cctt"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,4" data-show-toggle="true" data-show-columns="false" data-search="true" >

			<thead>
				<tr>
					<th><?php echo translate('no');?></th>
					<th><?php echo translate('logo');?></th>
					<th><?php echo translate('name');?></th>
					<th class="text-right"><?php echo translate('options');?></th>
				</tr>
			</thead>
				
			<tbody >
			<?php
				$i=0;
            	foreach($all_brands as $row){
            		$i++;
			?>
                <tr class='cctt-collapsed'>
                    <td><?php echo $i; ?></td>
                    <td class='cctt-control'>
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
                    <td>
                        <?php echo $row['name']; ?><br>

                    </td>
                     
                    <td class="text-right">
                        
                        <a class="btn btn-success btn-xs btn-labeled fa fa-check" data-toggle="tooltip" 
                           onclick="ajax_modal('approval','<?php echo translate('brand_approval'); ?>','<?php echo translate('successfully_saved!'); ?>','brand_approval','<?php echo $row['brand_id']; ?>')" 
                                data-original-title="View" data-container="body">
                                    <?php echo translate('approval');?> 
                        </a>
 

                        <a class="btn btn-success btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" 
                            onclick="ajax_modal('edit','<?php echo translate('edit_brand_(_physical_product_)'); ?>','<?php echo translate('successfully_edited!'); ?>','brand_edit','<?php echo $row['brand_id']; ?>')" 
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
                foreach($all_products as $row1){
                    if($row['brand_id']==$row1['brand']){
                        ?>
                        <tr class="display">
                            <td></td>
                            <td></td>
                            <td>
                                <span style="background-color: #0ebdff;padding: 6px;color:white;border-radius: 10px">
                                    <?php
                                    echo $row1['title'];
                                    ?>
                                </span>
                            </td>
                            <td></td>
                        </tr>
                        <?php
                    }?>
                    <?php
                }
                ?>

            <?php
            	}
			?>
			</tbody>
		</table>
	</div>
<!--    --><?php
//        print_r($all_products);
//    ?>
	<div id='export-div'>
		<h1 style="display:none;"><?php echo translate('brand'); ?></h1>
		<table id="export-table" data-name='brand' data-orientation='p' style="display:none;">
				<thead>
					<tr>
						<th><?php echo translate('no');?></th>
						<th><?php echo translate('name');?></th>
						<th><?php echo translate('category');?></th>
					</tr>
				</thead>
					
				<tbody >
				<?php
					$i = 0;
	            	foreach($all_brands as $row){
	            		$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name'); ?></td>
				</tr>
	            <?php
	            	}
				?>
				</tbody>
		</table>
	</div>

<style>
	.highlight{
		background-color: #E7F4FA;
	}
    .display{
        display: none;
    }
</style>
<script>
    $(function() {
        $('.cctt').cctt({
            stop_propagation:true
        })
    })

</script>






           
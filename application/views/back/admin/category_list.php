<div class="panel-body" id="demo_s">
		<table id="demo-table" class="table table-striped cctt"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,2" data-show-toggle="true" data-show-columns="false" data-search="true" >

			<thead>
				<tr>
					<th style="width:4%"><?php echo translate('no');?></th>
                    <th style="text-align: center"></th>
					<th><?php echo translate('name');?></th>
                    <th><?php echo translate('banner');?></th>
                    <th><?php echo translate('brand');?></th>
					<th class="text-right"><?php echo translate('options');?></th>
				</tr>
			</thead>
				
			<tbody>
			<?php
				$i = 0;
            	foreach($all_categories as $row){
            		$i++;
			?>
			<tr class="cctt-collapsed">
				<td><?php echo $i; ?></td>
                <td style="text-align: center" class='cctt-control'>
                    <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                </td>
                <td><?php echo $row['category_name']; ?></td>
				<td>
                    <?php
						if(file_exists('uploads/category_image/'.$row['banner'])){
					?>
					<img class="img-md" src="<?php echo base_url(); ?>uploads/category_image/<?php echo $row['banner']; ?>" height="100px" />  
					<?php
						} else {
					?>
					<img class="img-md" src="<?php echo base_url(); ?>uploads/category_image/default.jpg" height="100px" />
					<?php
						}
					?> 
               	</td>
				<td class="text-right">
					<a class="btn btn-success btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" 
                    	onclick="ajax_modal('edit','<?php echo translate('edit_category_(_physical_product_)'); ?>','<?php echo translate('successfully_edited!'); ?>','category_edit','<?php echo $row['category_id']; ?>')" 
                        	data-original-title="Edit" data-container="body">
                            	<?php echo translate('edit');?>
                    </a>
					<a onclick="delete_confirm('<?php echo $row['category_id']; ?>','<?php echo translate('really_want_to_delete_this?'); ?>')" class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip" 
                    	data-original-title="Delete" data-container="body">
                        	<?php echo translate('delete');?>
                    </a>
				</td>
			</tr>
            <?php
            foreach($all_sub_category as $row1){
                if($row1['category']==$row['category_id']){
                    ?>
                        <tr style="display: none !important">
                            <td></td>
                            <td></td>
                            <td><?php echo $row1['sub_category_name']; ?></td>
                            <td>
                                <?php
                                if(file_exists('uploads/sub_category_image/'.$row['banner'])){
                                    ?>
                                    <img class="img-md" src="<?php echo base_url(); ?>uploads/sub_category_image/<?php echo $row['banner']; ?>" height="100px" />
                                    <?php
                                } else {
                                    ?>
                                    <img class="img-md" src="<?php echo base_url(); ?>uploads/sub_category_image/default.jpg" height="100px" />
                                    <?php
                                }
                                ?>
                            </td>
                            <?php
                            $brands=json_decode($row['brand'],true);
                            ?>
                            <td>
                                <?php
                                foreach($brands as $row1){
                                    ?>
                                    <span class="label label-info" style="margin-right: 5px;">
                                        <?php echo $this->crud_model->get_type_name_by_id('brand',$row1,'name');?>
                                    </span>
                                    <?php
                                }
                                ?>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-success btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip"
                                   onclick="ajax_modal('edit1','<?php echo translate('edit_sub-category_(_physical_product_)'); ?>','<?php echo translate('successfully_edited!'); ?>','sub_category_edit','<?php echo $row1['sub_category_id']; ?>')" data-original-title="Edit" data-container="body">
                                    <?php echo translate('edit');?>
                                </a>
                                <a onclick="delete_confirm('<?php echo $row1['sub_category_id']; ?>','<?php echo translate('really_want_to_delete_this?'); ?>',1)"
                                   class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip"
                                   data-original-title="Delete" data-container="body">
                                    <?php echo translate('delete');?>
                                </a>
                            </td>
                        </tr>
                    <?php
                }
            }
                ?>

            <?php
            	}
			?>
			</tbody>
		</table>
	</div>
           
	<div id='export-div'>
		<h1 style="display:none;"><?php echo translate('category'); ?></h1>
		<table id="export-table" data-name='category' data-orientation='p' style="display:none;">
				<thead>
					<tr>
						<th><?php echo translate('no');?></th>
						<th><?php echo translate('name');?></th>
					</tr>
				</thead>
					
				<tbody >
				<?php
					$i = 0;
	            	foreach($all_categories as $row){
	            		$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['category_name']; ?></td>
				</tr>
	            <?php
	            	}
				?>
				</tbody>
		</table>
    </div>
    <script>
        $(function() {
            $('.cctt').cctt()
        })
        function ajax_modal1(type,title,noty,form_id,id){

            modal_form(title,noty,form_id);

            ajax_load(base_url+''+user_type+'/'+'sub_category'+'/'+type+'/'+id,'form','form');

        }

    </script>


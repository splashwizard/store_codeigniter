<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div id="content-container">
<div id="page-title">

		<h1 class="page-header text-overflow" ><?php echo translate('sales_tax ');?></h1>
<?php echo $this->session->flashdata('statemsg'); ?>
	<div class="tab-base">
            <div class="panel">
                <div class="panel-body">
                    <div class="tab-content">
                    <div class="col-md-12" style="border-bottom: 1px solid #ebebeb;padding: 5px;"><button class="btn btn-primary btn-labeled fa fa-plus-circle add_pro_btn pull-right" data-toggle="modal" data-target="#create">Add Sales Tax Rate</button></div>
	</div>
 <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl No.</th>
                <th>State</th>
                <th>Sales Tax</th>
                <th>Added By</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $this->db->where('action','Y');
        $state=$this->db->get('shiping_state')->result_array();
        //echo $this->db->last_query();
        $s=0;
         foreach($state as $row){
         	$s ++; 
         	
        ?>
            <tr>
                <td><?php echo $s; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['scost']; ?>%</td>
                <td>
                <?php echo $row['addedby'];  ?>
               </td>
                <td><a class="btn btn-success btn-xs btn-labeled fa fa-wrench" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>">Edit</a></td>
                <td><a class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="modal" data-target="#delete<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
<?php } ?>
           
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
    

</div>
<!--Add State-->
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add State</h4>
      </div>
      <div class="modal-body">
<form method="post" action="<?php echo base_url(); ?>admin/add_state">
	  <div class="form-group">
	    <label for="exampleInputEmail1">State Name</label>
	    <input type="text" class="form-control" name="state"  placeholder="Enter State Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Sales Tax Rate</label>
	    <input type="text" class="form-control" name="scost" placeholder="Enter Sales Tax Rate in %">
	  </div>
	  <input type="hidden" name="addedby" value="admin" />
	  <div class="modal-footer">
        <button type="button" class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer">Upload</button>
      </div>
</form>

      </div>
      
    </div>

  </div>
</div>

<!--Add State-->
<!--Edit State-->
<?php foreach($state as $edit){ ?>
<div id="edit<?php echo $edit['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add State</h4>
      </div>
      <div class="modal-body">
<form method="post" action="<?php echo base_url(); ?>admin/edit_state">
	  <div class="form-group">
	    <label for="exampleInputEmail1">State Name</label>
	    <input type="text" class="form-control" name="state" value="<?php echo $edit['sname']; ?>"  placeholder="Enter State Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Sales Tax Rate</label>
	    <input type="text" class="form-control" name="scost" value="<?php echo $edit['scost']; ?>" placeholder="Enter Sales Tax Rate in %">
	  </div>
	  <input type="hidden" name="addedby" value="admin" />
	  <input type="hidden" name="id" value="<?php echo $edit['id']; ?>" />
	  <div class="modal-footer">
        <button type="button" class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer">Upload</button>
      </div>
</form>

      </div>
      
    </div>

  </div>
</div>
<?php } ?>
<!--Edit State-->
<!--Delete State-->
<?php foreach($state as $delete){ ?>
<div id="delete<?php echo $delete['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete State</h4>
      </div>
      <div class="modal-body">
      <p>Are you sure to delete this state?</p>
<form method="post" action="<?php echo base_url(); ?>admin/del_state">
	  <input type="hidden" name="id" value="<?php echo $delete['id']; ?>" />
	  <div class="modal-footer">
        <button type="button" class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" data-dismiss="modal">NO</button>
        <button type="submit" class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer">YES</button>
      </div>
</form>

      </div>
      
    </div>

  </div>
</div>
<?php } ?>
<!--Delete State-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
$('input[name="scost"]').keyup(function(e)
                                {
 /* if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }*/
$(this).val($(this).val().replace(/[^0-9\.]/g,''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
});
</script>





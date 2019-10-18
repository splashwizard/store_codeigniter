<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div id="content-container">
<div id="page-title">

		<!--<h1 class="page-header text-overflow" ><?php echo translate('sales_tax ');?></h1>-->
	<div class="tab-base">
            <div class="panel">
                <div class="panel-body">
                <div class="col-md-8">
                <h1 class="page-header text-overflow" ><?php echo translate('select_sales_state ');?></h1>
 					<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl No.</th>
                <th>State</th>
                <th>Check</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $s=0;
         foreach($state as $row){
         	$s ++; 
         	$snames=$row['state'];
         	$vids=$this->session->userdata('vendor_id');
         	$this->db->select('*');
         	$this->db->where('sname', $snames);
         	$this->db->where('vid', $vids);
         	$state = $this->db->get('vendor_select_state');
         	$srow = $state->row();
         	
        ?>
            <tr>
                <td><?php echo $s; ?></td>
                <td><?php echo $row['state']; ?></td>
                <td>
                <?php
                if($row['state']==$srow->sname){
                ?>
                <input type="checkbox" name="sid<?php echo $row['state']; ?>" class="sid<?php echo $row['state']; ?>" value="<?php echo $srow->id; ?>" <?php echo ($row['state']==$srow->sname ? 'checked' : '');?> />
                <?php }else{ ?>
				 <input type="checkbox" name="sname<?php echo $row['state']; ?>" class="sname<?php echo $row['state']; ?>" value="<?php echo $row['state']; ?>" <?php echo ($row['state']==$srow->sname ? 'checked' : '');?> />
				<?php } ?>

               </td>
            </tr>
            <script>
                $(document).ready(function() {
                    $(".sname<?php echo $row['state']; ?>").click(function(){
                      var sname= $('input[name="sname<?php echo $row['state']; ?>"]:checked').val();
                      var vid=<?php echo $this->session->userdata('vendor_id'); ?>;
                      $.ajax({
                                type: "POST",
                                url: "https://ryants.com/store/vendor/insert_state",
                                data: "sname=" + sname +"&vid="+ vid ,
                                success: function(data){
                                    location.reload();
                                    }
                            });
                    });
                    $(".sid<?php echo $row['id']; ?>").click(function(){
                      var sid= $('input[name="sid<?php echo $row['id']; ?>"]').val();
                      //alert(sid);
                      $.ajax({
                                type: "POST",
                                url: "https://ryants.com/store/vendor/sdel_state",
                                data: "sid=" + sid  ,
                                success: function(data){
                                    location.reload();
                                    }
                            });
                    });
} );
</script>
<?php } ?>
           
        </tbody>
    </table>
				</div>
				<div class="col-md-4">
                    <h1 class="page-header text-overflow" ><?php echo translate('show_sales_state ');?></h1>
 					<table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl No.</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $vids=$this->session->userdata('vendor_id');
     	$this->db->select('*');
     	$this->db->where('vid', $vids);
     	$stateshow = $this->db->get('vendor_select_state');
     	$showrow = $stateshow->result();
     	//echo $this->db->last_query();
     	$show=0;
     	foreach($showrow as $showlist){
     		$show++;
        ?>
        <tr>
        	<td><?php echo $show; ?></td>
        	<td><?php echo $showlist->sname; ?></td>
        </tr>
		<?php } ?>
        </tbody>
    </table>
				</div>
                </div>
            </div>
        </div>
    </div>
    

</div>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
    $('#example').DataTable();
$(".sname").click(function(){
  var sname = $('input[name="sname"]:checked').val();
  //alert(sname);
});
 $('#example1').DataTable();
} );
</script>





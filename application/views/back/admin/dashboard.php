<link rel="stylesheet" href="<?php echo base_url(); ?>template/back//amcharts/style.css" type="text/css">
<script src="<?php echo base_url(); ?>template/back/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>template/back/amcharts/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>template/back/plugins/morris-js/morris.min.js"></script>
<script src="<?php echo base_url(); ?>template/back/plugins/gauge-js/gauge.min.js"></script>

<div id="content-container">	
    <div id="page-title">
    </div>
    <div id="page-content">
    	<div class="row">
    		<div class="col-sm-12">
		    	<div class="adminwidget">
		    		<div class="inner_row m-row--no-padding">
		    			<div class="col-md-4">
		    				<div class="adwidget">
		    					<div class="m-widget1__item">
									<div class="align-items-center">
										<div class="col-half">
											<h3 class="m-widget1__title">All Product</h3>
											<span class="m-widget1__desc">Total products</span>
										</div>
										<div class="col-half text-right">
											<a href="<?php echo base_url(); ?>admin/product/"><span class="m-widget1__number m--font-brand"><?php echo $this->db->get('product')->num_rows();?></span></a>
										</div>
									</div>
								</div>
								<div class="m-widget1__item">
									<div class="align-items-center">
										<div class="col-half">
											<h3 class="m-widget1__title">Products</h3>
											<span class="m-widget1__desc">Vendor Products</span>
										</div>
										<div class="col-half text-right">
										
											<a href="<?php echo base_url(); ?>admin/product/"><span class="m-widget1__number m--font-accent"><?php echo $this->db->get_where('product',array('added_by != '=>'{"type":"admin","id":"1"}'))->num_rows();?></span></a>
										</div>
									</div>
								</div>
								<div class="m-widget1__item">
									<div class="align-items-center">
										<div class="col-half">
											<h3 class="m-widget1__title">New Products</h3>
											<span class="m-widget1__desc">Last 7 days products </span>
										</div>
										<div class="col-half text-right">
										<?php  //$ctime=strtotime("-1 week"), "\n"; ?>
											<a href="<?php echo base_url(); ?>admin/product/"><span class="m-widget1__number m--font-success"><?php echo $this->db->get_where('product',array('add_timestamp  >='=>strtotime("-1 week"), "\n"))->num_rows();?></span></a>
										</div>
									</div>
								</div>
		    				</div>
		    			</div>
		    			<div class="col-md-8">
		    				<div class="adwidget chartwidget">
		    					<div class="col-sm-4">
			    					<div class="m-widget14__header m--margin-bottom-30">
										<h3 class="m-widget14__title text-center"><?php echo translate('24_hours_stock');?></h3>
										<div class="text-center">
				                            <canvas id="gauge1" height="70" class="canvas-responsive"></canvas>
				                            <p class="h4">
				                                <span class="label label-purple"><?php echo currency('','def');?></span>
				                                <span id="gauge1-txt" class="label label-purple">0</span>
				                            </p>
				                        </div>
									</div>
								</div>
		    					<div class="col-sm-4">
			    					<div class="m-widget14__header m--margin-bottom-30">
										<h3 class="m-widget14__title text-center"><?php echo translate('24_hours_sale');?></h3>
										<div class="text-center">
											<canvas id="gauge2" height="70" class="canvas-responsive"></canvas>
				                            <p class="h4 text-center">
				                                <span class="label label-success"><?php echo currency('','def');?></span>
				                                <span id="gauge2-txt" class="label label-success">0</span>
				                            </p>
										</div>
									</div>
								</div>
								
								<div class="col-sm-4">
			    					<div class="m-widget14__header m--margin-bottom-30">
										<h3 class="m-widget14__title text-center"><?php echo translate('24_hours_destroy');?></h3>
										<div class="text-center">
				                            <canvas id="gauge3" height="70" class="canvas-responsive"></canvas>
				                            <p class="h4">
				                                <span class="label label-black"><?php echo currency('','def');?></span>
				                                <span id="gauge3-txt" class="label label-black">0</span>
				                            </p>
				                        </div>
									</div>
								</div>
		    				</div>
		    			</div>
		    		</div>	
		    	</div>
		    	<div class="adminwidget">
		    		<div class="tabheader">
	    				<div class="widgetheader">
							<div class="dropdown">
								<button class="dropbtn"><i class="fa fa-ellipsis-v"></i></button>
								<div class="dropdown-content">
									<a href="#today" data-toggle="tab" id="todayvalue">Todays</a>
									<a href="#last7day" data-toggle="tab" id="day7value">Last 7 days</a>
									<a href="#monthly" data-toggle="tab" id="monthlyvalue">Monthly</a>
									<a href="#quaterly" data-toggle="tab" id="quertlyvalue">Quaterly</a>
									<a href="#cyear" data-toggle="tab" id="cyearvalue">Current Year</a>
									<a href="#pyear" data-toggle="tab" id="pyearvalue">Previous Year</a>
								</div>
							</div>
    					</div>
	    			</div>
	    			<div class="tab-content">
	    				<?php
							$date =  date('d-m-Y');
							//echo $tdate=date_timestamp_get($date);
							//echo date('m/d/Y', 1552991898);
							?>
	    				<div id="today" class="tab-pane fade in active">
	    					<div class="inner_row m-row--no-padding">
	    						<div class="col-md-4">
	    							<div class="adwidget gradientbg">
	    							<div class="m-widget1__item">
										<div class="align-items-center">
											<div class="col-half">
												<h3 class="m-widget1__title">Total Orders</h3>
												<span class="m-widget1__desc">Total Orders (Count)</span>
											</div>
											<div class="col-half text-right">
												<a href="#"><span class="m-widget1__number m--font-brand"><?php echo $this->db->get_where('sale',array('saledate = '=>$date))->num_rows();?></span></a>
											</div>
										</div>
									</div>
									<div class="m-widget1__item">
										<div class="align-items-center">
											<div class="col-half">
												<h3 class="m-widget1__title">Total Orders</h3>
												<span class="m-widget1__desc">Total Orders (Price)</span>
											</div>
											<?php 
											
											  $this->db->where('saledate',$date);
											  $tramount=$this->db->get('sale')->result_array();
											  //echo $this->db->last_query();
											  $ttotal1=0;
											  $t5=0;
											  foreach($tramount as $tamount){
											  	$ttotal1=$tamount['grand_total'];
											  	$t3=substr($ttotal1, 1);
											  	$t4=str_replace(",","",$t3);
											  	$t5+=$t4;
											  	
											  }
											  
											 ?>
											 
											<div class="col-half text-right">
												<a href="#"><span class="m-widget1__number m--font-accent">$<?php if($t5 !=''){ echo  number_format($t5,2,'.','') ; }else{ echo "0";} ?></span></a>
											</div>
										</div>
									</div>
									<div class="m-widget1__item">
										<div class="align-items-center">
											<div class="col-half">
												<h3 class="m-widget1__title">Members Profit</h3>
												<span class="m-widget1__desc">Members Profit</span>
											</div>
											<?php 
											$ctype =$this->db->get_where('business_settings',array('type= '=>'commission_amount'))->row();
										   $camount=$ctype->value;
										  $mprofid=($camount / 100) * $t5;
											?>
											<div class="col-half text-right">
												<a href="#"><span class="m-widget1__number m--font-success">$<?php echo number_format($t5-$mprofid,2,'.',''); ?></span></a>
											</div>
										</div>
									</div>
									<div class="m-widget1__item">
										<div class="align-items-center">
											<div class="col-half">
												<h3 class="m-widget1__title">Admin Profit</h3>
												<span class="m-widget1__desc">Admin Profit</span>
											</div>
											<div class="col-half text-right">
												<a href="#"><span class="m-widget1__number m--font-danger">$<?php if($mprofid !=''){ echo number_format($mprofid,2,'.',''); }else{ echo "0";} ?></span></a>
											</div>
										</div>
									</div>
	    							</div>
	    						</div>
	    						<div class="col-md-8">
	    							<div class="adwidget chartwidget">
				    					<div class="m-widget14__header m--margin-bottom-30">
											<?php
											$torder=number_format($t5,2,'.','') ;
											$tmprofit=number_format($t5-$mprofid,2,'.','');
											$tadminprofile=number_format($mprofid,2,'.','');
												$dataPoints1 = array(
													array("label"=> "Total Order", "y"=> $torder),
													array("label"=> "Members Profit", "y"=> $tmprofit),
													array("label"=> "Admin Profit", "y"=> $tadminprofile)
												);
											?>
											<div style="height:288px; overflow: hidden;">
												<div id="chartContainer" style="height: 300px; width: 100%;"></div>
											</div>
										</div>
				    				</div>
	    						</div>
	    					</div>
	    				</div>
	    				
	    				<div id="last7day" class="tab-pane fade">
	    					<div class="inner_row m-row--no-padding">
	    						<div class="col-md-4">
	    							<div class="adwidget gradientbg">
	    								<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Count)</span>
												</div>
												<?php
												$sdate=date('d-m-Y');
												$spdate=date("d-m-Y", strtotime("4 days ago"));
												//$this->db->where('sell_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
												$this->db->where('saledate  BETWEEN "'. $spdate. '" and "'. $sdate.'"');
												$spcount=$this->db->get('sale')->num_rows();
												//echo $this->db->last_query();
												//echo $spcount;
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-brand"><?php echo $spcount;?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Price)</span>
												</div>
												<?php
												 $this->db->where('saledate  BETWEEN "'. $spdate. '" and "'. $sdate.'"');
												  $samount=$this->db->get('sale')->result_array();
												  $st5=0;
												  foreach($samount as $samount){
												  	$stotal=$samount['grand_total'];
												  	$st3=substr($stotal, 1);
												  	$st4=str_replace(",","",$st3);
												  	$st5+=$st4;
												  	
												  }
												  
												?>
												
												
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-accent">$<?php if($st5 !=''){ echo  number_format($st5,2,'.','') ; }else{ echo "0";} ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Members Profit</h3>
													<span class="m-widget1__desc">Members Profit</span>
												</div>
												<?php 
												$sctype =$this->db->get_where('business_settings',array('type= '=>'commission_amount'))->row();
											   $scamount=$ctype->value;
											  $smprofid=($scamount / 100) * $st5;
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-success">$<?php echo number_format($st5-$smprofid,2,'.',''); ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Admin Profit</h3>
													<span class="m-widget1__desc">Admin Profit</span>
												</div>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-danger">$<?php if($smprofid !=''){ echo number_format($smprofid,2,'.',''); }else{ echo "0";} ?></span></a>
												</div>
											</div>
										</div>
	    							</div>
	    						</div>
	    						<div class="col-md-8">
	    							<div class="adwidget chartwidget">
				    					<div class="m-widget14__header m--margin-bottom-30">
											
											<?php
											$torder1=number_format($st5,2,'.','') ;
											$tmprofit1=number_format($st5-$smprofid,2,'.','');
											$tadminprofile1=number_format($smprofid,2,'.','');
												$dataPoints2 = array(
													array("label"=> "Total Order", "y"=> $torder1),
													array("label"=> "Members Profit", "y"=> $tmprofit1),
													array("label"=> "Admin Profit", "y"=> $tadminprofile1)
												);
											?>
											<div style=" height:288px; overflow: hidden;;">
												<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
											</div>
										</div>
				    				</div>
	    						</div>
	    					</div>
						</div>
	    				
	    				<div id="monthly" class="tab-pane fade">
	    					<div class="inner_row m-row--no-padding">
	    						<div class="col-md-4">
	    							<div class="adwidget gradientbg">
	    								<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Count)</span>
												</div>
												<?php
												$mdate=date('d-m-Y');
												$mpdate=date("d-m-Y", strtotime("30 days ago"));
												$this->db->where('saledate  BETWEEN "'. $mpdate. '" and "'. $mdate.'"');
												$mpcount=$this->db->get('sale')->num_rows();
												//echo $this->db->last_query();
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-brand"><?php echo $mpcount; ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Price)</span>
												</div>
												<?php
												 $this->db->where('saledate  BETWEEN "'. $mpdate. '" and "'. $mdate.'"');
												  $mamount=$this->db->get('sale')->result_array();
												  $mt5=0;
												  foreach($mamount as $mamount){
												  	$mtotal=$mamount['grand_total'];
												  	$mt3=substr($mtotal, 1);
												  	$mt4=str_replace(",","",$mt3);
												  	$mt5+=$mt4;
												  	
												  }
												  
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-accent">$<?php if($mt5 !=''){ echo  number_format($mt5,2,'.','') ; }else{ echo "0";} ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Members Profit</h3>
													<span class="m-widget1__desc">Members Profit</span>
												</div>
												<?php 
												$mctype =$this->db->get_where('business_settings',array('type= '=>'commission_amount'))->row();
											   $mtotal=$mctype->value;
											  $mmprofid=($mtotal / 100) * $mt5;
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-success">$<?php echo number_format($mt5-$mmprofid,2,'.',''); ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Admin Profit</h3>
													<span class="m-widget1__desc">Admin Profit</span>
												</div>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-danger">$<?php if($mmprofid !=''){ echo number_format($mmprofid,2,'.',''); }else{ echo "0";} ?></span></a>
												</div>
											</div>
										</div>
	    							</div>
	    						</div>
	    						<div class="col-md-8">
	    							<div class="adwidget chartwidget">
				    					<div class="m-widget14__header m--margin-bottom-30">
											<?php
											$torder2=number_format($mt5,2,'.','') ;
											$tmprofit2=number_format($mt5-$mmprofid,2,'.','');
											$tadminprofile2=number_format($mmprofid,2,'.','');
												$dataPoints3 = array(
													array("label"=> "Total Order", "y"=> $torder2),
													array("label"=> "Members Profit", "y"=> $tmprofit2),
													array("label"=> "Admin Profit", "y"=> $tadminprofile2)
												);
											?>
											<div style="height:288px; overflow: hidden;">
												<div id="chartContainer3" style="height: 300px; width: 100%;"></div>
											</div>
										</div>
				    				</div>
	    						</div>
	    					</div>
						</div>
						
						<div id="quaterly" class="tab-pane fade">
	    					<div class="inner_row m-row--no-padding">
	    						<div class="col-md-4">
	    							<div class="adwidget gradientbg">
	    								<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Count)</span>
												</div>
												<?php
												$qdate=date('d-m-Y');
												$qpdate=date("d-m-Y", strtotime("92 days ago"));
												$this->db->where('saledate  BETWEEN "'. $qpdate. '" and "'. $qdate.'"');
												$qpcount=$this->db->get('sale')->num_rows();
												//echo $this->db->last_query();
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-brand"><?php echo $qpcount; ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Price)</span>
												</div>
												<?php
												 $this->db->where('saledate  BETWEEN "'. $qpdate. '" and "'. $qdate.'"');
												  $qamount=$this->db->get('sale')->result_array();
												  $qt5=0;
												  foreach($qamount as $qamount){
												  	$qtotal=$qamount['grand_total'];
												  	$qt3=substr($qtotal, 1);
												  	$qt4=str_replace(",","",$qt3);
												  	$qt5+=$qt4;
												  	
												  }
												  
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-accent">$<?php if($qt5 !=''){ echo  number_format($qt5,2,'.','') ; }else{ echo "0";} ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Members Profit</h3>
													<span class="m-widget1__desc">Members Profit</span>
												</div>
												<?php 
												$qctype =$this->db->get_where('business_settings',array('type= '=>'commission_amount'))->row();
											   $qcamount=$qctype->value;
											  $qprofid=($qcamount / 100) * $qt5;
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-success">$<?php echo number_format($qt5-$qprofid,2,'.',''); ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Admin Profit</h3>
													<span class="m-widget1__desc">Admin Profit</span>
												</div>
												
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-danger">$<?php if($qprofid !=''){ echo number_format($qprofid,2,'.',''); }else{ echo "0";} ?></span></a>
												</div>
											</div>
										</div>
	    							</div>
	    						</div>
	    						<div class="col-md-8">
	    							<div class="adwidget chartwidget">
				    					<div class="m-widget14__header m--margin-bottom-30">
											<?php
											$torder4=number_format($qt5,2,'.','') ;
											$tmprofit4=number_format($qt5-$qprofid,2,'.','');
											$tadminprofile4=number_format($qprofid,2,'.','');
												$dataPoints4 = array(
													array("label"=> "Total Order", "y"=> $torder4),
													array("label"=> "Members Profit", "y"=> $tmprofit4),
													array("label"=> "Admin Profit", "y"=> $tadminprofile4)
												);
											?>
											<div style=" height:288px; overflow: hidden;;">
												<div id="chartContainer4" style="height: 300px; width: 100%;"></div>
											</div>
										</div>
				    				</div>
	    						</div>
	    					</div>
						</div>
						
						<div id="cyear" class="tab-pane fade">
	    					<div class="inner_row m-row--no-padding">
	    						<div class="col-md-4">
	    							<div class="adwidget gradientbg">
	    								<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Count)</span>
												</div>
												<?php
												$cydate=date('01-01-Y');
												$cypdate=date("31-12-Y");
												$this->db->where('saledate  BETWEEN "'. $cydate. '" and "'.$cypdate .'"');
												$cycount=$this->db->get('sale')->num_rows();
												//echo $this->db->last_query();
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-brand"><?php echo $cycount; ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Price)</span>
												</div>
												<?php
												 $this->db->where('saledate  BETWEEN "'. $cydate. '" and "'. $cypdate.'"');
												  $cyamount=$this->db->get('sale')->result_array();
												   $cyt5=0;
												   foreach($cyamount as $cyamounts){
												  	$cytotal=$cyamounts['grand_total'];
												  	$cyt3=substr($cytotal, 1);
												  	$cyt4=str_replace(",","",$cyt3);
												  	$cyt5+=$cyt4;
												  	
												  }
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-accent">$<?php if($cyt5 !=''){ echo  number_format($cyt5,2,'.','') ; }else{ echo "0";} ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Members Profit</h3>
													<span class="m-widget1__desc">Members Profit</span>
												</div>
												<?php 
												$cyctype =$this->db->get_where('business_settings',array('type= '=>'commission_amount'))->row();
											   $cycamount=$ctype->value;
											  $cyprofid=($cycamount / 100) * $cyt5;
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-success">$<?php echo number_format($cyt5-$cyprofid,2,'.',''); ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Admin Profit</h3>
													<span class="m-widget1__desc">Admin Profit</span>
												</div>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-danger">$<?php if($cyprofid !=''){ echo number_format($cyprofid,2,'.',''); }else{ echo "0";} ?></span></a>
												</div>
											</div>
										</div>
	    							</div>
	    						</div>
	    						<div class="col-md-8">
	    							<div class="adwidget chartwidget">
				    					<div class="m-widget14__header m--margin-bottom-30">
											<?php
											$torder5=number_format($cyt5,2,'.','') ;
											$tmprofit5=number_format($cyt5-$cyprofid,2,'.','');
											$tadminprofile5=number_format($cyprofid,2,'.','');
												$dataPoints5 = array(
													array("label"=> "Total Order", "y"=> $torder5),
													array("label"=> "Members Profit", "y"=> $tmprofit5),
													array("label"=> "Admin Profit", "y"=> $tadminprofile5)
												);
											?>
											<div style=" height:288px; overflow: hidden;;">
												<div id="chartContainer5" style="height: 300px; width: 100%;"></div>
											</div>
										</div>
				    				</div>
	    						</div>
	    					</div>
						</div>
	    				
	    				<div id="pyear" class="tab-pane fade">
	    					<div class="inner_row m-row--no-padding">
	    						<div class="col-md-4">
	    							<div class="adwidget gradientbg">
	    								<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Count)</span>
												</div>
												<?php
												$pyear=date("Y",strtotime("-1 year"));
												$pdate=date('01-01-'.$pyear);
												$ppdate=date('31-12-'.$pyear);
												$this->db->where('saledate  BETWEEN "'. $pdate. '" and "'. $ppdate.'"');
												$ppcount=$this->db->get('sale')->num_rows();
												//echo $this->db->last_query();
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-brand"><?php echo "0"; ?></span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Total Orders</h3>
													<span class="m-widget1__desc">Total Orders (Price)</span>
												</div>
												<?php
												 $this->db->where('saledate  BETWEEN "'. $pdate. '" and "'. $ppdate.'"');
												  $pamount=$this->db->get('sale')->result_array();
												  $pt5=0;
												  foreach($pamount as $pamounts){
												  	$ptotal=$pamounts['grand_total'];
												  	$pt3=substr($ptotal, 1);
												  	$pt4=str_replace(",","",$pt3);
												  	$pt5+=$pt4;
												  	
												  }
												  
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-accent">$ 0</span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Members Profit</h3>
													<span class="m-widget1__desc">Members Profit</span>
												</div>
												<?php 
												$pctype =$this->db->get_where('business_settings',array('type= '=>'commission_amount'))->row();
											   $pcamount=$pctype->value;
											  $pmprofid=($pcamount / 100) * $pt5;
												?>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-success">$ 0</span></a>
												</div>
											</div>
										</div>
										<div class="m-widget1__item">
											<div class="align-items-center">
												<div class="col-half">
													<h3 class="m-widget1__title">Admin Profit</h3>
													<span class="m-widget1__desc">Admin Profit</span>
												</div>
												<div class="col-half text-right">
													<a href="#"><span class="m-widget1__number m--font-danger">$ 0</span></a>
												</div>
											</div>
										</div>
	    							</div>
	    						</div>
	    						<div class="col-md-8">
	    							<div class="adwidget chartwidget">
				    					<div class="m-widget14__header m--margin-bottom-30">
											<?php
												$dataPoints6 = array(
													array("label"=> "Total Order", "y"=> 0),
													array("label"=> "Members Profit", "y"=> 0),
													array("label"=> "Admin Profit", "y"=> 0)
												);
											?>
											<div style="height:288px; overflow: hidden;">
												<div id="chartContainer6" style="height: 300px; width: 100%;"></div>
											</div>
										</div>
				    				</div>
	    						</div>
	    					</div>
						</div>
	    				
	    			</div>
		    		
		    	</div>
		    	<div class="adminwidget">
		    		<div class="inner_row m-row--no-padding">
		    			<div class="col-md-12">
			    			<div class="adwidget chartwidget">
		    					<div class="m-widget14__header m--margin-bottom-30">
									<h3 class="m-widget14__title"><?php echo translate('category_wise_monthly_grand_profit');?></h3>
									<div class="text-center">
			                            <div id="chartdiv4" style="width: 100%; height: 300px;"></div>
			                        </div>
								</div>
		    				</div>
	    				</div>
		    		</div>
		    	</div>
		    	<div class="adminwidget">
		    		<div class="inner_row m-row--no-padding">
		    			
		    			<div class="col-md-8">
		    				<div class="adwidget chartwidget">
		    					<div class="col-sm-12">
			    					<div class="m-widget14__header m--margin-bottom-30">
										<h3 class="m-widget14__title text-left"><?php echo translate('vendor_stattistics');?></h3>
										<div id="chartdiv5" style="width: 100%; height: 200px;"></div>
									</div>
								</div>
		    				</div>
		    			</div>
		    			
		    			<div class="col-md-4">
		    				<div class="adwidget">
		    					<div class="m-widget1__item">
									<div class="align-items-center">
										<div class="col-half">
											<h3 class="m-widget1__title">All Vendor</h3>
											<span class="m-widget1__desc">Total Vendors</span>
										</div>
										<div class="col-half text-right">
											<a href="<?php echo base_url(); ?>admin/vendor/"><span class="m-widget1__number m--font-brand"><?php echo $this->db->get('vendor')->num_rows();?></span></a>
										</div>
									</div>
								</div>
								<div class="m-widget1__item">
									<div class="align-items-center">
										<div class="col-half">
											<h3 class="m-widget1__title">Active Vendors</h3>
											<span class="m-widget1__desc">Active Vendors</span>
										</div>
										<div class="col-half text-right">
											<a href="<?php echo base_url(); ?>admin/vendor/"><span class="m-widget1__number m--font-accent"><?php echo $this->db->get_where('vendor',array('status = '=>'approved'))->num_rows();?></span></a>
										</div>
									</div>
								</div>
								<div class="m-widget1__item">
									<div class="align-items-center">
										<div class="col-half">
											<h3 class="m-widget1__title">Pending Vendor</h3>
											<span class="m-widget1__desc">Apporval pending vendors</span>
										</div>
										<div class="col-half text-right">
											<a href="<?php echo base_url(); ?>admin/vendor/"><span class="m-widget1__number m--font-success"><?php echo $this->db->get_where('vendor',array('status != '=>'approved'))->num_rows();?></span></a>
										</div>
									</div>
								</div>
		    				</div>
		    			</div>
		    		</div>	
		    	</div>
		    </div>
		    <!--<div class="col-md-6">
		    	<div class="adminwidget fullbackroundcolor redblue_gradientbg">
		    		<div class="adminwidget1">
		    			<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text m--font-light">
										Activity
									</h3>
								</div>
							</div>
							<div class="m-portlet__head-tools">
								<ul class="m-portlet__nav">
									<li class="">
										<a href="#" class="">
											<i class="fa fa-ellipsis-v"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
		    		</div>
		    	</div>
		    </div>-->
    	</div>
    	
        <!--<div class="row" <?php if($this->crud_model->get_type_name_by_id('general_settings','68','value') == 'ok'){}else{ ?>style="display:none;"<?php } ?> >
            <div class="col-md-4 col-lg-4">
                <div class="panel panel-bordered panel-purple">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo translate('24_hours_stock');?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <canvas id="gauge1" height="70" class="canvas-responsive"></canvas>
                            <p class="h4">
                                <span class="label label-purple"><?php echo currency('','def');?></span>
                                <span id="gauge1-txt" class="label label-purple">0</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="panel panel-bordered panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo translate('24_hours_sale');?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <canvas id="gauge2" height="70" class="canvas-responsive"></canvas>
                            <p class="h4">
                                <span class="label label-success"><?php echo currency('','def');?></span>
                                <span id="gauge2-txt" class="label label-success">0</span>
                            </p>
                        </div>
                    </div>
               </div>
            </div>
            
            <div class="col-md-4 col-lg-4">
                <div class="panel panel-bordered panel-black">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo translate('24_hours_destroy');?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <canvas id="gauge3" height="70" class="canvas-responsive"></canvas>
                            <p class="h4">
                                <span class="label label-black"><?php echo currency('','def');?></span>
                                <span id="gauge3-txt" class="label label-black">0</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <?php
		?>
        <!--<div class="row" <?php if($this->crud_model->get_type_name_by_id('general_settings','68','value') !== 'ok' && $this->crud_model->get_type_name_by_id('general_settings','69','value') == 'ok'){}else{ ?>style="display:none;"<?php } ?> >
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-bordered panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo translate('24_hours_sale');?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <canvas id="gauge4" height="70" class="canvas-responsive"></canvas>
                            <p class="h4">
                                <span class="label label-success"><?php echo currency('','def');?></span>
                                <span id="gauge4-txt" class="label label-success">0</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        
        <!--<div class="row" <?php if($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok'){}else{ ?>style="display:none;"<?php } ?> >
            <div class="col-md-4 col-lg-4">
                <div class="panel panel-bordered panel-grad2" style="height:205px;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo translate('total_vendors');?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <h1>
                                <?php echo $this->db->get('vendor')->num_rows();?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="panel panel-bordered panel-dark" style="height:205px;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo translate('pending_vendors');?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <h1>
                                <?php echo $this->db->get_where('vendor',array('status != '=>'approved'))->num_rows();?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8 col-lg-8">
                <div class="panel panel-bordered panel-grad">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo translate('vendor_stattistics');?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <div class="col-md-12 col-lg-12">
                                <div class="panel-body">
                                    <div id="chartdiv5" style="width: 100%; height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>-->
        <div class="row" <?php if($this->crud_model->get_type_name_by_id('general_settings','68','value') == 'ok'){}else{ ?>style="display:none;"<?php } ?> >
            <div class="col-md-6 col-lg-6">
                <div class="panel panel-bordered panel-purple">
                    <h3 class="panel-title" style="border-bottom:1px #9365b8 solid; !important;">
                        <?php echo translate('category_wise_monthly_stock');?>
                    </h3>
                    <div class="panel-body">
                        <div id="chartdiv" style="width: 100%; height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="panel panel-bordered panel-black">
                    <h3 class="panel-title" style="border-bottom:1px #303641 solid; !important;">
                        <?php echo translate('category_wise_monthly_destroy');?>
                    </h3>
                    <div class="panel-body">
                        <div id="chartdiv3" style="width: 100%; height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-bordered panel-success">
                    <h3 class="panel-title" style="border-bottom:1px #00a65a solid; !important;">
                        <?php echo translate('category_wise_monthly_sale');?>
                    </h3>
                    <div class="panel-body">
                        <div id="chartdiv2" style="width: 100%; height: 300px;"></div>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-6 col-lg-6">
                <div class="panel panel-bordered panel-primary">
                    <h3 class="panel-title" style="border-bottom:1px #458fd2 solid; !important;">
                        <?php echo translate('category_wise_monthly_grand_profit');?>
                    </h3>
                    <div class="panel-body">
                        <div id="chartdiv4" style="width: 100%; height: 300px;"></div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>
<?php
	$ago = time()-86400;
	$result = $this->db->get_where('stock',array('datetime >= '=>$ago,'datetime <= '=>time()))->result_array();
	$result2 = $this->db->get_where('sale',array('sale_datetime >= '=>$ago,'sale_datetime <= '=>time()))->result_array();
	$stock = 0;
	foreach($result as $row){
		if($row['type'] == 'add'){
			$stock += $row['total'];
		}
	}
	$destroy = 0;
	foreach($result as $row){
		if($row['type'] == 'destroy'){
            if($row['reason_note'] !== 'sale'){
    			$destroy += $row['total'];
            }
		}
	}
	$sale = 0;
	foreach($result2 as $row){
		$sale += $row['grand_total'];
	}
?>
<script>
	var base_url = '<?php echo base_url(); ?>';
	var stock = <?php if($stock == 0){echo .1;} else {echo $stock;} ?>;
	var stock_max = <?php echo ($stock*3.5/3+100); ?>;
	var destroy = <?php if($destroy == 0){echo .1;} else {echo $destroy;} ?>;
	var destroy_max = <?php echo ($destroy*3.5/3+100); ?>;
	var sale = <?php if($sale == 0){echo .1;} else {echo $sale;} ?>;
	var sale_max = <?php echo ($sale*3.5/3+100); ?>;
	var currency = '<?php echo currency('','def'); ?>';
	var cost_txt = '<?php echo translate('cost'); ?>(<?php echo currency('','def'); ?>)';
	var value_txt = '<?php echo translate('value'); ?>(<?php echo currency('','def'); ?>)';
	var loss_txt = '<?php echo translate('loss'); ?>(<?php echo currency('','def'); ?>)';
	var pl_txt = '<?php echo translate('profit'); ?>/<?php echo translate('loss'); ?>(<?php echo currency('','def'); ?>)';
	var sale_details = [
	<?php
		$this->db->where('delivery_status','pending');
		$sales = $this->db->get('sale')->result_array();
		foreach($sales as $row){
		$orders 	= json_decode($row['shipping_address'],true);
		$address 	= str_replace("'","",$orders['address1']).' '.str_replace("'","",$orders['address2']);
		$langlat 	= explode(',',str_replace('(','',str_replace(')','',$orders['langlat'])));
		$grand_total = $row['grand_total'];
	?>
		['<?php echo $address; ?>', <?php echo $langlat[0]; ?>, <?php echo $langlat[1]; ?>, '<?php echo currency('','def').$this->cart->format_number($grand_total); ?>'],
	<?php } ?>
	];
	var sale_details1 = [];
	var chartData1 = [ 
		<?php
			$categories = $this->db->get('category')->result_array();
			foreach($categories as $row) {
				$this->crud_model->month_total('stock', 'category', $row['category_id'], 'type', 'add'); 
		?> 
		{
			 "country": "<?php echo $row['category_name']; ?>",
			 "visits": <?php echo $this->crud_model->month_total('stock', 'category', $row['category_id'], 'type', 'add'); ?> ,
			 "color": "#9365b8"
		 }, 
		 <?php
			} 
		 ?>
	];
	var chartData2 = [
		<?php
			$categories = $this->db->get('category')->result_array();
			foreach($categories as $row) {
				$this->crud_model->month_total('sale', 'category', $row['category_id']);
		 ?>
		 {
			 "country": "<?php echo $row['category_name']; ?>",
			 "visits": <?php echo $this->crud_model->month_total('sale', 'category', $row['category_id']); ?>,
			 "color": "#00a65a"
		 }, 
		 <?php
			}
		?>
	];

	var chartData3 = [
		<?php
			$categories = $this->db->get('category')->result_array();
			foreach($categories as $row) {
				$this->crud_model->month_total('stock', 'category', $row['category_id'], 'type', 'destroy'); 
		 ?>
		 {
			 "country": "<?php echo $row['category_name']; ?>",
			 "visits": <?php echo $this->crud_model->month_total('stock', 'category', $row['category_id'], 'type', 'destroy', 'reason_note', "sale"); ?> ,
			 "color": "#303641"
		 }, 
		 <?php
			} 
		 ?>
	];
	var chartData4 = [
		<?php
			$categories = $this->db->get('category')->result_array();
			foreach($categories as $row) {
				$fin = ($this->crud_model->month_total('sale', 'category', $row['category_id'])) - ($this->crud_model->month_total('stock', 'category', $row['category_id'], 'type', 'add'));
		?>
		{
			"country": "<?php echo $row['category_name']; ?>",
			"visits": <?php echo $fin; ?> ,
			"color": "#458fd2"
		},
		<?php
		}
		?>
	];
	var chartData5 = [
		{
			"country": "Default",
			"visits": <?php echo $this->db->get_where('vendor',array('membership'=>'0'))->num_rows(); ?> ,
			"color": "#458fd2"
		},
		<?php
			$membership_type = $this->db->get('membership')->result_array();
			foreach($membership_type as $row) {
				$fin = $this->db->get_where('vendor',array('membership'=>$row['membership_id']))->num_rows();
		?>
		{
			"country": "<?php echo $row['title']; ?>",
			"visits": <?php echo $fin; ?> ,
			"color": "#458fd2"
		},
		<?php
		}
		?>
	];
</script>
<script src="<?php echo base_url(); ?>template/back/js/custom/dashboard.js"></script>
<style>
	  #actions {
		list-style: none;
		padding: 0;
	  }
	  #inline-actions {
		padding-top: 10px;
	  }
	  .item {
		margin-left: 20px;
	  }
</style>

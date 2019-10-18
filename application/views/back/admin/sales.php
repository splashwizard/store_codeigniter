<div id="content-container">

	<div id="page-title">

		<h1 class="page-header text-overflow" ><?php echo translate('manage_sale');?></h1>

	</div>

	<div class="tab-base">

		<div class="panel">

			<div class="panel-body">
			<!--Sale Report-->
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
		    	
			<!--Sale Report-->

                <!-- LIST -->


                <div class="tab-pane fade active in" id="list">

                

                </div>

			</div>

        </div>

	</div>

</div>



<script>

	var base_url = '<?php echo base_url(); ?>'

	var user_type = 'admin';

	var module = 'sales';

	var list_cont_func = 'list';

	var dlt_cont_func = 'delete';
//Date range search
//$(document).ready(function(){
  $("#daterange").click(function(){
  	  var fodate =$("input[name=fodate]").val();
  	  var todate =$("input[name=todate]").val();
  	  //alert(fodate);
  	  //alert(todate);

    //alert("The paragraph was clicked.");
     $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/daterange",
            data: "fodate=" + fodate + "&todate=" + todate,
            success: function(data){
            	$("#list").html(data);  
                //alert('success');
                }
        });
  });
//});
</script>




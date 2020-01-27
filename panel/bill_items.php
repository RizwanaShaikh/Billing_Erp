<?php
session_start();

error_reporting(E_ALL ^ E_NOTICE);  
if ($_SESSION['b_id'] == NULL)
{
    echo "<script>window.location.href='customers.php';</script>";
}
?>
<html lang="en">

	<head>
		<?php include 'header.php';?>

	</head>

	<body class="no-skin">
		<?php include 'top_nav.php'; ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php include 'side_nav.php';?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Home</a>
							</li>

							<li>
								Invoice
							</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Invoice
								
							</h1>
						</div><!-- /.page-header -->

						<form action="controller/bill.php" method="post">					
						<div class="row"> 
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<div class="row">
									<div class="container">
									<?php

										$sql = "select c.*,b.* from customer as c join bill as b on c.c_id=b.c_id where b.b_id = ".$_SESSION['b_id']." and c.status = 1;";
										
										
										$result = $con->query($sql);

											if ($result->num_rows > 0) 
											{
											    // output data of each row
									    		while($row = $result->fetch_assoc()) 
									    		{

									?>
									
										<div class="col-xs-6">
											<div class="form-group">
										    <label for="c_name">Invoice No : </label>
										    <input type="text" value="<?php echo  $row['b_invoice'];?> " class="form-control" name="c_name" disabled>
										  </div>
										  <div class="form-group">
										    <label for="c_deliv_add">Delivery Address : </label>
										    <input type="text" class="form-control" name="c_deliv_add" value="<?php echo  $row['c_deliv_add']?>" disabled>
										  </div>
										  <div class="form-group">
										    <label for="b_lr_no">LR-RR No : </label>
										    <input type="text" class="form-control" name="b_lr_no" required>
										  </div>
										  <input type="hidden" class="form-control" name="b_id" value="<?php echo  $row['b_id']?>">
										</div>
										<div class="col-xs-6">
											<div class="form-group">
										    <label for="c_name">Customer / Company Name : </label>
										    <input type="text" value="<?php echo  $row['c_name']?>" class="form-control" name="c_name" disabled>
										  </div>
										  <div class="form-group">
										    <label for="c_gst_no">GST No. : </label>
										    <input type="text" class="form-control" name="c_gst_no" value="<?php echo  $row['c_gst_no']?>" disabled>
										  </div>
										  <div class="form-group">
										    <label for="b_veh_no">Vehical No : </label>
										    <input type="text" class="form-control" name="b_veh_no" required>
										  </div>
										</div>
									
								
								<?php
										}
									}
								?>
									</div>
								</div>


								<div class="row">
									<div class="col-xs-12">
										<div class="container">
										<div class="clearfix">
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_item" style="margin-left:45% ">Add Item</button>
											
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>Description of Goods</th>
														<th>HSN/SAC</th>
														<th>Quantity</th>
														<th>Rate</th>	
														<th>Amount</th>

														
														<th></th>
													</tr>
												</thead>
								
												<tbody>


										<?php 
											$sql = "SELECT * FROM bill_items as bi join product as p on bi.p_id=p.p_id where bi.b_id = ".$_SESSION['b_id']." and bi.status = 1";
											$result = $con->query($sql);

											if ($result->num_rows > 0) 
											{
											    // output data of each row
									    		while($row = $result->fetch_assoc()) 
									    		{
										?>

													<tr >
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td >
															<p><?php echo $row['p_name']?></p>
														</td>
														<td>
															<p><?php echo $row['p_num']?></p>
														</td>
														<td>
															<p><?php echo $row['p_quantity']."  ".$row['p_qnt_type']?></p>
														</td>
														<td>
															<p><?php echo $row['p_rate']."/".$row['p_qnt_type'] ?></p>
														</td>
														
														<td >
															<p><?php echo $row['p_amount']?></p>
														</td>

														<td>

															<div class="hidden-sm hidden-xs action-buttons ">
																<form action="controller/bill.php" method="post">
																	<input type="hidden" name="bi_id" value="<?php echo $row['bi_id']?>">
																	<input type="hidden" name="p_id" value="<?php echo $row['p_id']?>">
																	<button type="submit" name="delete_bi" class="btn btn-danger"><i class="ace-icon fa fa-trash-o bigger-130"></i></button>
																</form>
																
															</div>
														</td>
													</tr>
										<?php
												}
											}

										?>

	
												</tbody>
											</table>
										</div>
										<center>

											
											<button style="margin-top: 3%" type="submit" name="final_bill" class="btn btn-primary">Print</button>

										</center>
										</div>
									</div>
								</div>
							
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
				</form>
				<div class="container">
				<form method="post" action="controller/bill.php">
					<input type="hidden" value="<?php echo $_SESSION['b_id']?>" name="b_id">
					<button type="submit" name="cancel_bill" class="btn btn-danger" style="float: right;">Cancel</button>
				</form>
				</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include 'footer.php';?>


			
	</body>
</html>
<!-- New Customer Modal -->
<div id="new_item" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Product</h4>
      </div>
      <div class="modal-body">

		<form action="controller/bill.php" method="post">
		  <div class="form-group">
		    <label for="p_id">Product Name : </label>
		    <select class="form-control" name="p_id">
		    <?php
		    	$q = "select * from product where status = 1";
		    	$r = $con->query($q);

				if ($r->num_rows > 0) 
				{
				    // output data of each row
		    		while($ro = $r->fetch_assoc()) 
		    		{

		    ?>
		    <option value="<?php echo $ro['p_id']?>"> <?php echo $ro['p_name']?> - <?php echo $ro['p_num']?> ( <?php echo $ro['p_qantity']?> ) </option>
		    <?php
		    		}
		    	}
		    ?>
		    </select>
		    
		  </div>
		  
		  <div class="form-group">
		    <label for="p_qantity">Qantity : </label>
		    <input type="text" class="form-control" name="p_qantity" required>
		  </div>
	
		  <div class="form-group">
		    <label for="p_rate">Product Rate : </label>
		    <input type="text" class="form-control" name="p_rate" required>
		  </div>
		  <input type="hidden" name="b_id" value="<?php echo $_SESSION['b_id'] ?>">
		  <button type="submit" name="new_item" class="btn btn-default">Submit</button>
		</form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



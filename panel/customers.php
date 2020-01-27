
<!DOCTYPE html>
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
								Customer
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
								Customers
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
													
								<div class="row">
									<div class="col-xs-12">
										<div class="clearfix">
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_cust">Add New</button>
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Results for "All Customers"
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
														<th>Name</th>
														<th>Address</th>
														<th>Delivery Address</th>
														<th>Mobile</th>
														<th>GST No</th>	
														<th></th>
													</tr>
												</thead>
								
												<tbody>


										<?php 
											$sql = "SELECT * FROM customer where status = 1";
											$result = $con->query($sql);

											if ($result->num_rows > 0) 
											{
											    // output data of each row
									    		while($row = $result->fetch_assoc()) 
									    		{
										?>

													<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
															<p style="display: none"><?php echo $row['c_id']?></p>
														</td>

														<td>
															<p><?php echo $row['c_name']?></p>
														</td>
														<td>
															<p><?php echo $row['c_address']?></p>
														</td>
														<td>
															<p><?php echo $row['c_deliv_add']?></p>
														</td>
														<td>
															<p><?php echo $row['c_mob']?></p>
														</td>
														<td>
															<p><?php echo $row['c_gst_no']?></p>
														</td>
														<td>

															<div class="hidden-sm hidden-xs action-buttons col-sm-4">
																	<form action="controller/bill.php" method="post">
																	<input type="hidden" name="c_id" value="<?php echo $row['c_id']?>">
																	<button type="submit" name="gen_bill" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Generate Bill"><i class="ace-icon fa fa-file-text-o bigger-130"></i></button>
																</form>
															</div>

															<div class="hidden-sm hidden-xs action-buttons col-sm-4">
																	<button type="button" class="btn btn-primary editbtn"  data-toggle="tooltip" data-placement="bottom" title="Update"><i class="ace-icon fa fa-pencil bigger-130"></i></button>
															</div>

															<div class="hidden-sm hidden-xs action-buttons ">
																<form action="controller/customers.php" method="post">
																	<input type="hidden" name="c_id" value="<?php echo $row['c_id']?>">
																	<button type="submit" name="delete_cust" class="btn btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="ace-icon fa fa-trash-o bigger-130"></i></button>
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
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->


					</div>	<!-- PAGE CONTENT ENDS -->
				</div><!-- /.page-content -->
			
			</div><!-- /.main-content -->
		</div>
		<?php include 'footer.php';?>


			
	</body>
</html>
<!-- New Customer Modal -->
<div id="new_cust" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Customer</h4>
      </div>
      <div class="modal-body">

		<form action="controller/customers.php" method="post">
		  <div class="form-group">
		    <label for="c_name">Customer / Company Name : </label>
		    <input type="text" class="form-control" name="c_name" required>
		  </div>
		  <div class="form-group">
		    <label for="c_mob">Mobile No. : </label>
		    <input type="text" class="form-control" name="c_mob" required>
		  </div>
		  <div class="form-group">
		    <label for="c_address">Address : </label>
		    <input type="text" class="form-control" name="c_address" required>
		  </div>
		  <div class="form-group">
		    <label for="c_deliv_add">Delivery Address : </label>
		    <input type="text" class="form-control" name="c_deliv_add" required>
		  </div>
		  <div class="form-group">
		    <label for="c_gst_no">GST No. : </label>
		    <input type="text" class="form-control" name="c_gst_no" required>
		  </div>
		  <button type="submit" name="new_cust" class="btn btn-default">Submit</button>
		</form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
	$(document).ready(function(){
		$('.editbtn').on('click',function() {
			$('#update_cust').modal('show');

			$tr = $(this).closest('tr');

			var data = $tr.children('td').map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#c_id').val(data[0].trim());
			$('#c_name').val(data[1].trim());
			$('#c_address').val(data[2].trim());
			$('#c_deliv_add').val(data[3].trim());
			$('#c_mob').val(data[4].trim());
			$('#c_gst_no').val(data[5].trim());

		});
	});
</script>

<!-- Update Customer Modal -->
<div id="update_cust" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true"> 
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Customer</h4>
      </div>
      <div class="modal-body">
       
		<form action="controller/customers.php" method="post">
		  <div class="form-group">
		    <label for="c_name">Customer / Company Name : </label>
		    <input type="text" class="form-control" name="c_name" id="c_name" required>
		  </div>
		  <div class="form-group">
		    <label for="c_mob">Mobile No. : </label>
		    <input type="text" class="form-control" name="c_mob" id="c_mob" required>
		  </div>
		  <div class="form-group">
		    <label for="c_address">Address : </label>
		    <input type="text" class="form-control" name="c_address" id="c_address" required>
		  </div>
		  <div class="form-group">
		    <label for="c_deliv_add">Delivery Address : </label>
		    <input type="text" class="form-control" id="c_deliv_add" name="c_deliv_add" required>
		  </div>
		  <div class="form-group">
		    <label for="c_gst_no">GST No. : </label>
		    <input type="text" class="form-control" name="c_gst_no" id="c_gst_no" required>
		  </div>
		  <input type="hidden" name="c_id" id="c_id">
		  <button type="submit" name="update_cust" class="btn btn-default">Submit</button>
		</form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


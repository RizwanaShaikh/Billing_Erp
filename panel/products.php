
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
								Products
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
								Products
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
													
								<div class="row">
									<div class="col-xs-12">
										<div class="clearfix">
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_pro">Add New</button>
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Results for "All Products"
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
														<th>Number</th>
														<th>Qantity</th>
														<th>Type</th>	
														<th style="display: none;">Id</th>
														<th></th>
													</tr>
												</thead>
								
												<tbody>


										<?php 
											$sql = "SELECT * FROM product where status = 1";
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
															<p><?php echo $row['p_qantity']?></p>
														</td>
														<td>
															<p><?php echo $row['p_qnt_type']?></p>
														</td>
														
														<td style="display: none;">
															<p><?php echo $row['p_id']?></p>
														</td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons col-sm-6">
																	<button type="button" class="btn btn-success editbtn"><i class="ace-icon fa fa-pencil bigger-130"></i></button>
																

															</div>

															<div class="hidden-sm hidden-xs action-buttons ">
																<form action="controller/products.php" method="post">
																	<input type="hidden" name="p_id" value="<?php echo $row['p_id']?>">
																	<button type="submit" name="delete_pro" class="btn btn-danger"><i class="ace-icon fa fa-trash-o bigger-130"></i></button>
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
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include 'footer.php';?>


			
	</body>
</html>
<!-- New Product Modal -->
<div id="new_pro" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Product</h4>
      </div>
      <div class="modal-body">

		<form action="controller/products.php" method="post">
		  <div class="form-group">
		    <label for="p_name">Product Name : </label>
		    <input type="text" class="form-control" name="p_name" required>
		  </div>
		  <div class="form-group">
		    <label for="p_num">Product No. : </label>
		    <input type="text" class="form-control" name="p_num" required>
		  </div>
		  <div class="form-group">
		    <label for="p_qantity">Qantity : </label>
		    <input type="text" class="form-control" name="p_qantity" required>
		  </div>
		  <div class="form-group">
		    <label for="p_qnt_type">Quantity Type : </label>
		    <input type="text" class="form-control" name="p_qnt_type" required>
		  </div>
		  <button type="submit" name="new_pro" class="btn btn-default">Submit</button>
		</form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('.editbtn').on('click',function() {
			$('#update_pro').modal('show');

			$tr = $(this).closest('tr');

			var data = $tr.children('td').map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#p_name').val(data[1].trim());
			$('#p_num').val(data[2].trim());
			$('#p_qantity').val(data[3].trim());
			$('#p_qnt_type').val(data[4].trim());
			$('#p_id').val(data[5].trim());

		});
	});
</script>

<!-- Update Product Modal -->
<div id="update_pro" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true"> 
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Product</h4>
      </div>
      <div class="modal-body">
       
		<form action="controller/products.php" method="post">
		  <div class="form-group">
		    <label for="p_name">Product Name : </label>
		    <input type="text" class="form-control" name="p_name" id="p_name" required>
		  </div>
		  <div class="form-group">
		    <label for="p_num">Product No. : </label>
		    <input type="text" class="form-control" name="p_num" id="p_num" required>
		  </div>
		  <div class="form-group">
		    <label for="p_qantity">Qantity : </label>
		    <input type="text" class="form-control" name="p_qantity" id="p_qantity" required>
		  </div>
		  <div class="form-group">
		    <label for="p_qnt_type">Quantity Type. : </label>
		    <input type="text" class="form-control" name="p_qnt_type" id="p_qnt_type" required>
		  </div>
		  <input type="hidden" name="p_id" id="p_id">
		  <button type="submit" name="update_pro" class="btn btn-default">Submit</button>
		</form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

